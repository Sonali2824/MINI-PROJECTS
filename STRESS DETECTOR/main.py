
import dlib
import sys
import cv2
import time
import numpy as np
from scipy.spatial import distance as dist
from threading import Thread
import playsound
import queue
from scipy.spatial import distance as dist
from imutils.video import VideoStream
from imutils import face_utils
import imutils
import matplotlib.pyplot as plt
from keras.preprocessing.image import img_to_array
from keras.models import load_model


n=""
eid=""
def center(win):
    """
    centers a tkinter window
    :param win: the root or Toplevel window to center
    """
    win.update_idletasks()
    width = win.winfo_width()
    frm_width = win.winfo_rootx() - win.winfo_x()
    win_width = width + 2 * frm_width
    height = win.winfo_height()
    titlebar_height = win.winfo_rooty() - win.winfo_y()
    win_height = height + titlebar_height + frm_width
    x = win.winfo_screenwidth() // 2 - win_width // 2
    y = win.winfo_screenheight() // 2 - win_height // 2
    win.geometry('{}x{}+{}+{}'.format(width, height, x, y))
    win.deiconify()


    
def message():
    import tkinter as tk
    from tkinter import messagebox
    global n,eid
    root= tk.Tk()
    root.withdraw()
    MsgBox = tk.messagebox.askquestion ('CONFIRM','You have reached your saturation point, do you wish to continue to work?',icon = 'warning')
    if MsgBox == 'no':
        root.destroy()
        return "no"
    else:
        import smtplib
        gmailaddress = "example@gmail.com"
        gmailpassword = "example12"
        mailto = "example@gmail.com"
        msg = "The employee "+n+" with employee ID "+eid+" has reached his/her saturation point but continues to work"
        #print(msg)
        mailServer = smtplib.SMTP('smtp.gmail.com' , 587)
        mailServer.ehlo()
        mailServer.starttls()
        mailServer.login(gmailaddress , gmailpassword)
        mailServer.sendmail(gmailaddress, mailto, msg)
        #print(" \n Sent!")
        mailServer.quit()
        return "yes"

        


#eyebrow


def eye_brow_distance(leye,reye):
    global points
    distq = dist.euclidean(leye,reye)
    points.append(int(distq))
    return distq

def emotion_finder(faces,frame):
    global emotion_classifier
    EMOTIONS = ["angry" ,"disgust","scared", "happy", "sad", "surprised","neutral"]
    x,y,w,h = face_utils.rect_to_bb(faces)
    frame = frame[y:y+h,x:x+w]
    roi = cv2.resize(frame,(64,64))
    roi = roi.astype("float") / 255.0
    roi = img_to_array(roi)
    roi = np.expand_dims(roi,axis=0)
    preds = emotion_classifier.predict(roi)[0]
    emotion_probability = np.max(preds)
    label = EMOTIONS[preds.argmax()]
    if label in ['scared','sad']:
        label = 'stressed'
    else:
        label = 'not stressed'
    return label
    
def normalize_values(points,disp):
    normalized_value = abs(disp - np.min(points))/abs(np.max(points) - np.min(points))
    stress_value = np.exp(-(normalized_value))
    #print(stress_value)
    if stress_value>=75:        
        return stress_value,"High Stress"
    else:
        return stress_value,"low_stress"

'''def close():
    top.destroy'''
def execute1():
    global n,eid
    #print(e1.get(),e2.get())
    n=e1.get()
    eid=e2.get()
    top.destroy()

    
# from light_variability import adjust_gamma
from tkinter import *
top = Tk()   
top.geometry("300x200")
center(top)
top.configure(background="salmon")
name = Label(top, text = "Name").place(x = 30,y = 50)    
emp_id = Label(top, text = "Employee ID").place(x = 30, y = 90)   
e1 = Entry(top)
e1.place(x = 105, y = 50)
e2 = Entry(top)
e2.place(x = 105, y = 90)

sbmitbtn = Button(top, text = "Start",activebackground = "pink", activeforeground = "blue",command=execute1).place(x = 140, y = 130)
#sbmitbtn.pack()
#close()
top.mainloop()

FACE_DOWNSAMPLE_RATIO = 1.5
RESIZE_HEIGHT = 460

thresh = 0.27
modelPath = "models/shape_predictor_70_face_landmarks.dat"


detector = dlib.get_frontal_face_detector()
predictor = dlib.shape_predictor(modelPath)

leftEyeIndex = [36, 37, 38, 39, 40, 41]
rightEyeIndex = [42, 43, 44, 45, 46, 47]

blinkCount = 0
drowsy = 0
state = 0
blinkTime = 0.15 #150ms
drowsyTime = 1.5  #1200ms
ALARM_ON = False
GAMMA = 1.5
threadStatusQ = queue.Queue()

invGamma = 1.0/GAMMA
table = np.array([((i / 255.0) ** invGamma) * 255 for i in range(0, 256)]).astype("uint8")

def gamma_correction(image):
    return cv2.LUT(image, table)

def histogram_equalization(image):
    gray = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)
    return cv2.equalizeHist(gray) 



def eye_aspect_ratio(eye):
    A = dist.euclidean(eye[1], eye[5])
    B = dist.euclidean(eye[2], eye[4])
    C = dist.euclidean(eye[0], eye[3])
    ear = (A + B) / (2.0 * C)

    return ear


def checkEyeStatus(landmarks):
    mask = np.zeros(frame.shape[:2], dtype = np.float32)
    
    hullLeftEye = []
    for i in range(0, len(leftEyeIndex)):
        hullLeftEye.append((landmarks[leftEyeIndex[i]][0], landmarks[leftEyeIndex[i]][1]))

    cv2.fillConvexPoly(mask, np.int32(hullLeftEye), 255)

    hullRightEye = []
    for i in range(0, len(rightEyeIndex)):
        hullRightEye.append((landmarks[rightEyeIndex[i]][0], landmarks[rightEyeIndex[i]][1]))


    cv2.fillConvexPoly(mask, np.int32(hullRightEye), 255)

    
    leftEAR = eye_aspect_ratio(hullLeftEye)
    rightEAR = eye_aspect_ratio(hullRightEye)

    ear = (leftEAR + rightEAR) / 2.0
    

    eyeStatus = 1          # 1 -> Open, 0 -> closed
    if (ear < thresh):
        eyeStatus = 0

    return eyeStatus  

def checkBlinkStatus(eyeStatus):
    global state, blinkCount, drowsy
    if(state >= 0 and state <= falseBlinkLimit):
        if(eyeStatus):
            state = 0

        else:
            state += 1

    elif(state >= falseBlinkLimit and state < drowsyLimit):
        if(eyeStatus):
            blinkCount += 1 
            state = 0

        else:
            state += 1


    else:
        if(eyeStatus):
            state = 0
            drowsy = 1
            blinkCount += 1

        else:
            drowsy = 1
    print("Drowsy",drowsy)

def getLandmarks(im):
    imSmall = cv2.resize(im, None, 
                            fx = 1.0/FACE_DOWNSAMPLE_RATIO, 
                            fy = 1.0/FACE_DOWNSAMPLE_RATIO, 
                            interpolation = cv2.INTER_LINEAR)

    rects = detector(imSmall, 0)
    if len(rects) == 0:
        return 0

    newRect = dlib.rectangle(int(rects[0].left() * FACE_DOWNSAMPLE_RATIO),
                            int(rects[0].top() * FACE_DOWNSAMPLE_RATIO),
                            int(rects[0].right() * FACE_DOWNSAMPLE_RATIO),
                            int(rects[0].bottom() * FACE_DOWNSAMPLE_RATIO))

    points = []
    [points.append((p.x, p.y)) for p in predictor(im, newRect).parts()]
    return points

capture = cv2.VideoCapture(0)

for i in range(10):
    ret, frame = capture.read()

totalTime = 0.0
validFrames = 0
dummyFrames = 100

print("Caliberation in Progress!")
while(validFrames < dummyFrames):
    validFrames += 1
    t = time.time()
    ret, frame = capture.read()
    height, width = frame.shape[:2]
    IMAGE_RESIZE = np.float32(height)/RESIZE_HEIGHT
    frame = cv2.resize(frame, None, 
                        fx = 1/IMAGE_RESIZE, 
                        fy = 1/IMAGE_RESIZE, 
                        interpolation = cv2.INTER_LINEAR)

    # adjusted = gamma_correction(frame)
    adjusted = histogram_equalization(frame)

    landmarks = getLandmarks(adjusted)
    timeLandmarks = time.time() - t

    if landmarks == 0:
        validFrames -= 1
        cv2.putText(frame, "Unable to detect face, Please check proper lighting", (10, 30), cv2.FONT_HERSHEY_COMPLEX, 0.5, (0, 0, 255), 1, cv2.LINE_AA)
        cv2.putText(frame, "or decrease FACE_DOWNSAMPLE_RATIO", (10, 50), cv2.FONT_HERSHEY_COMPLEX, 0.5, (0, 0, 255), 1, cv2.LINE_AA)
        cv2.imshow("Blink Detection Demo", frame)
        if cv2.waitKey(1) & 0xFF == 27:
            sys.exit()

    else:
        totalTime += timeLandmarks
        # cv2.putText(frame, "Caliberation in Progress", (200, 30), cv2.FONT_HERSHEY_COMPLEX, 0.5, (0, 0, 255), 1, cv2.LINE_AA)
        # cv2.imshow("Blink Detection Demo", frame)
        
    # if cv2.waitKey(1) & 0xFF == 27:
    #         sys.exit()

print("Caliberation Complete!")

spf = totalTime/dummyFrames
print("Current SPF (seconds per frame) is {:.2f} ms".format(spf * 1000))

drowsyLimit = drowsyTime/spf
falseBlinkLimit = blinkTime/spf
print("drowsy limit: {}, false blink limit: {}".format(drowsyLimit, falseBlinkLimit))

if __name__ == "__main__":
    vid_writer = cv2.VideoWriter('output-low-light-2.avi',cv2.VideoWriter_fourcc('M','J','P','G'), 15, (frame.shape[1],frame.shape[0]))
    detector = dlib.get_frontal_face_detector()
    predictor = dlib.shape_predictor(modelPath)
    emotion_classifier = load_model("_mini_XCEPTION.102-0.66.hdf5", compile=False)

    #cap = cv2.VideoCapture(0)
    points = []
    count=0
    
    while(1):
        try:
            t = time.time()
            ret, frame = capture.read()
            height, width = frame.shape[:2]

            (lBegin, lEnd) = face_utils.FACIAL_LANDMARKS_IDXS["right_eyebrow"]
            (rBegin, rEnd) = face_utils.FACIAL_LANDMARKS_IDXS["left_eyebrow"]
            #preprocessing the image
            gray = cv2.cvtColor(frame,cv2.COLOR_BGR2GRAY)
            detections = detector(gray,0)
            for detection in detections:
                emotion = emotion_finder(detection,gray)
                cv2.putText(frame, emotion, (10,10),cv2.FONT_HERSHEY_SIMPLEX, 0.5, (0, 255, 0), 2)
                shape = predictor(frame,detection)
                shape = face_utils.shape_to_np(shape)

                leyebrow = shape[lBegin:lEnd]
                reyebrow = shape[rBegin:rEnd]

                reyebrowhull = cv2.convexHull(reyebrow)
                leyebrowhull = cv2.convexHull(leyebrow)

                cv2.drawContours(frame, [reyebrowhull], -1, (0, 255, 0), 1)
                cv2.drawContours(frame, [leyebrowhull], -1, (0, 255, 0), 1)

                distq = eye_brow_distance(leyebrow[-1],reyebrow[0])
                stress_value,stress_label = normalize_values(points,distq)
                cv2.putText(frame,"stress level:{}".format(str(int(stress_value*100))),(20,40),cv2.FONT_HERSHEY_SIMPLEX, 0.5, (0, 255, 0), 2)
                if emotion=="stressed":
                    count+=1
                    print("Count",count)

            #cv2.imshow("Frame", frame)

            key = cv2.waitKey(1) & 0xFF


            IMAGE_RESIZE = np.float32(height)/RESIZE_HEIGHT
            frame = cv2.resize(frame, None, 
                                fx = 1/IMAGE_RESIZE, 
                                fy = 1/IMAGE_RESIZE, 
                                interpolation = cv2.INTER_LINEAR)

            # adjusted = gamma_correction(frame)
            adjusted = histogram_equalization(frame)

            landmarks = getLandmarks(adjusted)
            if landmarks == 0:
                validFrames -= 1
                cv2.putText(frame, "Unable to detect face, Please check proper lighting", (10, 30), cv2.FONT_HERSHEY_COMPLEX, 0.5, (0, 0, 255), 1, cv2.LINE_AA)
                cv2.putText(frame, "or decrease FACE_DOWNSAMPLE_RATIO", (10, 50), cv2.FONT_HERSHEY_COMPLEX, 0.5, (0, 0, 255), 1, cv2.LINE_AA)
                cv2.imshow("Blink Detection Demo", frame)
                if cv2.waitKey(1) & 0xFF == 27:
                    break
                continue

            eyeStatus = checkEyeStatus(landmarks)
            checkBlinkStatus(eyeStatus)

            for i in range(0, len(leftEyeIndex)):
                cv2.circle(frame, (landmarks[leftEyeIndex[i]][0], landmarks[leftEyeIndex[i]][1]), 1, (0, 0, 255), -1, lineType=cv2.LINE_AA)

            for i in range(0, len(rightEyeIndex)):
                cv2.circle(frame, (landmarks[rightEyeIndex[i]][0], landmarks[rightEyeIndex[i]][1]), 1, (0, 0, 255), -1, lineType=cv2.LINE_AA)

            if drowsy and count>20:
                cv2.putText(frame, "! ! ! DROWSINESS ALERT ! ! !", (70, 50), cv2.FONT_HERSHEY_COMPLEX, 1, (0, 0, 255), 2, cv2.LINE_AA)
                output=message()
                count=0
                state = 0
                drowsy = 0
                if output=="yes":
                    continue
                else:
                    import tkinter as tk
                    from tkinter import messagebox
                    root= tk.Tk()
                    root.withdraw()
                    MsgBox = tk.messagebox.showinfo('THANK YOU','We appreciate you for considering the warning!! See you again after you rejuvenate!!')
                    break
                """if not ALARM_ON:
                    ALARM_ON = True
                    threadStatusQ.put(not ALARM_ON)
                    thread = Thread(target=soundAlert, args=(sound_path, threadStatusQ,))
                    thread.setDaemon(True)
                    thread.start()"""

            else:
                #cv2.putText(frame, "Blinks : {}".format(blinkCount), (460, 80), cv2.FONT_HERSHEY_COMPLEX, 0.8, (0,0,255), 2, cv2.LINE_AA)
                # (0, 400)
                ALARM_ON = False


            cv2.imshow("Blink Detection Demo", frame)
            vid_writer.write(frame)

            k = cv2.waitKey(1) 
            if k == ord('r'):
                state = 0
                drowsy = 0
                ALARM_ON = False
                threadStatusQ.put(not ALARM_ON)

            elif k == 27:
                break

            # print("Time taken", time.time() - t)

        except Exception as e:
            print(e)

    capture.release()
    vid_writer.release()
    cv2.destroyAllWindows()

