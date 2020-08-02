import tkinter
import cv2
import csv
import os
import numpy as np
from PIL import Image,ImageTk
import pandas as pd
import datetime
import time

aa=''
def allemp():
    os.startfile('C:\\Users\\USER\Desktop\\MINI PROJECTS\\FACE RECOGNITION\\EmployeeDetails\\EmployeeDetails.csv')
def preemp():
    os.startfile('C:\\Users\\USER\\Desktop\\MINI PROJECTS\\FACE RECOGNITION\\EmployeeAttendance')
    
def filling_attendance():
    global faces
    now = time.time()
    future = now + 20
    if time.time() < future:
        recognizer = cv2.face.LBPHFaceRecognizer_create() #cv2.createLBPHFaceRecognizer() 
        try:
            recognizer.read("TrainingImageLabel\Trainner.yml")
        except:
            e = 'Model not found,Please train model'
            Notifica.configure(text=e, bg="red", fg="black", width=33, font=('times', 15, 'bold'))
            Notifica.place(x=20, y=250)
        harcascadePath = "haarcascade_frontalface_default.xml"
        faceCascade = cv2.CascadeClassifier(harcascadePath)
        df = pd.read_csv("EmployeeDetails\EmployeeDetails.csv")
        
        cam = cv2.VideoCapture(0)
        font = cv2.FONT_HERSHEY_SIMPLEX
        col_names = ['Enrollment', 'Name', 'Date', 'Time']
        attendance = pd.DataFrame(columns=col_names)
        face_detected=0
        while face_detected==0:
            ret, im = cam.read()
            gray = cv2.cvtColor(im, cv2.COLOR_BGR2GRAY)
            faces = faceCascade.detectMultiScale(gray, 1.2, 5)
            for (x, y, w, h) in faces:
                global Id
                Id, conf = recognizer.predict(gray[y:y + h, x:x + w])
                
                if (conf <100):
                    
                    global aa
                    
                    
                            
                    ts = time.time()
                    date = datetime.datetime.fromtimestamp(ts).strftime('%Y-%m-%d')
                    timeStamp = datetime.datetime.fromtimestamp(ts).strftime('%H:%M:%S')
                    aa = df.loc[df['Enrollment'] == Id]['Name'].values
                    
                    global tt
                    tt = str(Id) + "-" + aa
                    En = '15624031' + str(Id)
                    attendance.loc[len(attendance)] = [Id, aa, date, timeStamp]
                    cv2.rectangle(im, (x, y), (x + w, y + h), (0, 260, 0), 7)
                    cv2.putText(im, str(tt), (x + h, y), font, 1, (255, 255, 0,), 4)
                    cv2.putText(im, str(conf), (x + h, y), font, 1, (255, 255, 0,), 4)
                    face_detected=1
                else:
                    Id = 'Unknown'
                    tt = str(Id)
                    cv2.rectangle(im, (x, y), (x + w, y + h), (0, 25, 255), 7)
                    cv2.putText(im, str(tt), (x + h, y), font, 1, (0, 25, 255), 4)
            if time.time() > future:
                break
            attendance = attendance.drop_duplicates(['Enrollment'], keep='first')
            cv2.imshow('Filling attedance..', im)
            key = cv2.waitKey(30) & 0xff
            if key == 27:
                break
        ts = time.time()
        date = datetime.datetime.fromtimestamp(ts).strftime('%Y-%m-%d')
        timeStamp = datetime.datetime.fromtimestamp(ts).strftime('%H:%M:%S')
        Hour, Minute, Second = timeStamp.split(":")
        fileName = "EmployeeDetails/" +  "_" + date +  ".csv"
        attendance = attendance.drop_duplicates(['Enrollment'], keep='first')
        
        attendance.to_csv(fileName, index=False)
        '''##Create table for Attendance

        date_for_DB = datetime.datetime.fromtimestamp(ts).strftime('%Y_%m_%d')
        DB_Table_name = str(date_for_DB)
        import pymysql.connections
        ###Connect to the database
        try:
            global cursor
            connection = pymysql.connect(host='localhost', user='root', password='', db='Face_reco_fill')
            cursor = connection.cursor()
        except Exception as e:
            print(e)
        sql = "CREATE TABLE " + DB_Table_name + """

        (ID INT NOT NULL AUTO_INCREMENT,

        ENROLLMENT varchar(100) NOT NULL,

        NAME VARCHAR(50) NOT NULL,

        DATE VARCHAR(20) NOT NULL,

        TIME VARCHAR(20) NOT NULL,

        PRIMARY KEY (ID)

        );
        """
        insert_data =  "INSERT INTO " + DB_Table_name + " (ID,ENROLLMENT,NAME,DATE,TIME) VALUES (0, %s, %s, %s,%s)"
        VALUES = (str(Id), str(aa), str(date), str(timeStamp))
        try:
            cursor.execute(sql)  ##for create a table
            cursor.execute(insert_data, VALUES)##For insert data into table
        except Exception as ex:
            print(ex)'''
        
        cam.release()
        cv2.destroyAllWindows()
        import csv
        import tkinter
        root = tkinter.Tk()
        root.geometry('500x250')
        root.title("Attendance")
        root.configure(background='snow')
        
        VALUES1 = (str(Id), str(aa), str(date), str(timeStamp))
        cs = 'C:/Users/User/Desktop/MINI PROJECTS/FACE RECOGNITION/' + fileName
        with open(cs,newline="") as file:
            reader = csv.reader(file)
            r = 0
            for col in reader:
                c = 0
                for row in col:
                    label = tkinter.Label(root, width=8, height=1, fg="black", font=('times', 15, ' bold '),bg="lawn green", text=row, relief=tkinter.RIDGE)
                    label.grid(row=r, column=c)
                    c += 1
                r += 1
        with open(("C:/Users/User/Desktop/MINI PROJECTS/FACE RECOGNITION/EmployeeAttendance/" +  "_" + date +'_att'+  ".csv"), 'a+') as csvFile:
                    writer = csv.writer(csvFile, delimiter=',')
                    writer.writerow(VALUES1)
                    csvFile.close()
              
        Notifica = tkinter.Label(root, text="Attendance filled Successfully", bg="Green", fg="white", width=33,height=2, font=('times', 15, 'bold'))
        
        M = 'Attendance filled Successfully'

        Notifica.configure(text=M, bg="Green", fg="white", width=33, font=('times', 15, 'bold'))

        Notifica.place(x=20, y=150)
        root.mainloop()
        
    
            
                
def del_errsc2():
    errsc2.destroy()

def err_screen1():
    global errsc2
    errsc2 = tkinter.Tk()
    errsc2.geometry('330x100')
    errsc2.title('Warning!!')
    errsc2.configure(background='SkyBlue1')
    Label(errsc2, text='Please enter Name & Id!!!', fg='black', bg='turquoise4',font=('times', 16, ' bold ')).pack()
    Button(errsc2, text='OK', command=del_errsc2, fg="black", bg="turquoise4", width=9, height=1, font=('times', 15, ' bold ')).place(x=50, y=50)

def testVal(inStr, acttyp):
    if acttyp == '1':
        if not inStr.isdigit():
            return False
    return True

def del_sc1():

    sc1.destroy()

def del_window5():

    window5.destroy()
    
def err_screen():

    global sc1

    sc1 = tkinter.Tk()

    sc1.geometry('300x100')

    

    sc1.title('Warning!!')

    sc1.configure(background='SkyBlue1')

    tkinter.Label(sc1,text='Id & Name required!!!',fg='black',bg='turquoise4',font=('times', 16, ' bold ')).pack()

    tkinter.Button(sc1,text='OK',command=del_sc1,fg="black"  ,bg="turquoise4"  ,width=15  ,height=1,font=('times', 15, ' bold ')).place(x=50,y= 50)

def window_for_admin():
    window2=tkinter.Toplevel(window1)
    window2.title('window for admin')
    window2.geometry('750x500')
    window2.configure(background='SkyBlue1')
    l=tkinter.Label(window2,text="ADMIN LOGIN",fg='black',bg='turquoise4',width=15,height=2,font=('times',15,'bold'))
    l.pack()
    l.place(x=250,y=20)
    
    def log_in():
        username = un_entr.get()
        password = pw_entr.get()
        if username == 'admin' :
            if password == 'admin12':
                window2.destroy()
                import csv
                import tkinter

                window6=tkinter.Tk()
                window6.geometry('750x500')
                window6.configure(background='SkyBlue1')
                l=tkinter.Label(window6,text="ADMIN ACCESS",fg='black',bg='turquoise4',width=15,height=2,font=('times',15,'bold'))
                l.pack()
                l.place(x=300,y=20)
                b1=tkinter.Button(window6, text="ALL EMPLOYEE RECORDS", command=allemp,fg='black',bg='turquoise4',width=25,height=1,font=('times',15,'bold')).place(x=250,y=150)
                b2=tkinter.Button(window6, text="PRESENT RECORDS", command=preemp,fg='black',bg='turquoise4',width=20,height=1,font=('times',15,'bold')).place(x=280,y=250)
                
            else:
                valid = 'Incorrect ID or Password'
                Nt.configure(text=valid, bg="turquoise4", fg="black", width=38, font=('times', 15, 'bold'))
                Nt.place(x=150, y=430)

        else:
            valid ='Incorrect ID or Password'
            Nt.configure(text=valid, bg="turquoise4", fg="black", width=38, font=('times', 15, 'bold'))
            Nt.place(x=150, y=430)


    Nt = tkinter.Label(window2, text="Attendance filled Successfully", bg="turquoise4", fg="white", width=40,height=2, font=('times', 19, 'bold'))    
    un = tkinter.Label(window2, text="USERNAME", width=15, height=2, fg="black", bg="turquoise4",font=('times', 15, ' bold '))
    un.place(x=30, y=150)
    pw = tkinter.Label(window2, text="PASSWORD", width=15, height=2, fg="black", bg="turquoise4",font=('times', 15, ' bold '))
    pw.place(x=30, y=250)


    def c00():
        un_entr.delete(first=0, last=22)


    un_entr = tkinter.Entry(window2, width=15, bg="turquoise4", fg="black", font=('times', 23, ' bold '))
    un_entr.place(x=300, y=150)



    def c11():
        pw_entr.delete(first=0, last=22)

    pw_entr = tkinter.Entry(window2, width=15,show="*", bg="turquoise4", fg="black", font=('times', 23, ' bold '))
    pw_entr.place(x=300, y=250)
    c0 = tkinter.Button(window2, text="Clear", command=c00, fg="black", bg="turquoise4", width=10, height=1, font=('times', 15, ' bold '))
    c0.place(x=600, y=150)
    c1 = tkinter.Button(window2, text="Clear", command=c11, fg="black", bg="turquoise4", width=10, height=1, font=('times', 15, ' bold '))
    c1.place(x=600, y=250)
    Login = tkinter.Button(window2, text="LogIn", fg="black", bg="turquoise4", width=20,height=2,command=log_in, font=('times', 15, ' bold '))
    Login.place(x=250, y=350)

    window2.mainloop()


'''def window_for_registration():
    window3=tkinter.Toplevel(window1)


    
def window_for_attendence():
    global window4
    window4=tkinter.Toplevel(window1)'''
    
def window_for_registration_of_employee():
    global window5
    
    window5=tkinter.Toplevel(window1)
    window5.title('window for employee')
    window5.geometry('750x500')
    window5.configure(background='SkyBlue1')
    l=tkinter.Label(window5,text="EMPLOYEE REGISTRATION",fg='black',bg='turquoise4',width=25,height=2,font=('times',15,'bold'))
    l.pack()
    l.place(x=250,y=20)
    l1=tkinter.Label(window5,text="FULL NAME",fg='black',bg='turquoise4',width=15,height=2,font=('times',15,'bold'))
    l1.pack()
    l1.place(x=20,y=250)
    l2=tkinter.Label(window5,text="E-ID",fg='black',bg='turquoise4',width=15,height=2,font=('times',15,'bold'))
    l2.pack()
    l2.place(x=20,y=150)
    t2=tkinter.Entry(window5,width=15,font=('times',23,'bold'))
    t2['validatecommand'] = (t2.register(testVal),'%P','%d')
    t2.place(x=400,y=250)
    t1=tkinter.Entry(window5,width=15,font=('times',23,'bold'))
    t1['validatecommand'] = (t1.register(testVal),'%P','%d')
    t1.place(x=400,y=150)
    Notification = tkinter.Label(window5, text="DONE!", bg="turquoise4", fg="black", width=15,height=2, font=('times', 17, 'bold'))

    
    def getImagesAndLabels(path):
        imagePaths = [os.path.join(path, f) for f in os.listdir(path)]
        faceSamples = []
        Ids = []
        for imagePath in imagePaths:
            
            pilImage = Image.open(imagePath).convert('L')
            imageNp = np.array(pilImage, 'uint8')
            
            Id = int(os.path.split(imagePath)[-1].split(".")[1])
            
            faces = detector.detectMultiScale(imageNp)
            
            for (x, y, w, h) in faces:
                faceSamples.append(imageNp[y:y + h, x:x + w])
                Ids.append(Id)
        return faceSamples, Ids
    def take_img():
        la = t1.get()
        lb = t2.get()
        if la == '':
            err_screen()
        elif lb == '':
            err_screen()
        else:
            try:
                cam = cv2.VideoCapture(0)
                detector = cv2.CascadeClassifier('haarcascade_frontalface_default.xml')
                
                Id = t1.get()
                Name = t2.get()
                sampleNum = 0
                while (True):
                    ret, img = cam.read()
                    gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
                    faces = detector.detectMultiScale(gray, 1.3, 5)
                    for (x, y, w, h) in faces:
                        cv2.rectangle(img, (x, y), (x + w, y + h), (255, 0, 0), 2)
                        sampleNum = sampleNum + 1
                        cv2.imwrite("TrainingImage/ " + Name + "." + Id + '.' + str(sampleNum) + ".jpg",gray[y:y + h, x:x + w])
                        cv2.imshow('Frame', img)
                    if cv2.waitKey(1) & 0xFF == ord('q'):
                        break
                    elif sampleNum > 20:
                        break
                cam.release()
                cv2.destroyAllWindows()
                ts = time.time()
                Date = datetime.datetime.fromtimestamp(ts).strftime('%Y-%m-%d')
                Time = datetime.datetime.fromtimestamp(ts).strftime('%H:%M:%S')
                row = [Id, Name, Date, Time]
                with open('EmployeeDetails\EmployeeDetails.csv', 'a+') as csvFile:
                    writer = csv.writer(csvFile, delimiter=',')
                    writer.writerow(row)
                    csvFile.close()
                res = "Images Saved for Enrollment : " + Id + " Name : " + Name
                Notification.configure(text=res, bg="turquoise4", width=50, font=('times', 18, 'bold'))
                Notification.place(x=20, y=450)
            except FileExistsError as F:
                f = 'Employee Data already exists'
                Notification.configure(text=f, bg="turquoise4", width=21)
                Notification.place(x=450, y=400)
    takeImg = tkinter.Button(window5, text="TAKE IMAGES",command=take_img,fg="black"  ,bg="turquoise4"  ,width=15  ,height=2,font=('times', 15, ' bold '))
    takeImg.place(x=20, y=350)

    def trainimg():
        recognizer = cv2.face.LBPHFaceRecognizer_create() #cv2.createLBPHFaceRecognizer()
        global detector
        
        detector = cv2.CascadeClassifier("haarcascade_frontalface_default.xml")
        
        
        try:
            
            
            faces, Id = getImagesAndLabels("TrainingImage")
            
        except Exception as e:
            l='please make "TrainingImage" folder & put Images'
            Notification.configure(text=l, bg="turquoise4", width=50, font=('times', 18, 'bold'))
            Notification.place(x=350, y=400)
            
        recognizer.train(faces, np.array(Id))
        try:
            recognizer.write("C:\\Users\\User\\Desktop\\MINI PROJECTS\\FACE RECOGNITION\\TrainingImageLabel\\Trainner.yml")
        except Exception as e:
            q='Please make "TrainingImageLabel" folder'
            Notification.configure(text=q, bg="turquoise4", width=50, font=('times', 18, 'bold'))
            Notification.place(x=350, y=400)

        res = "Model Trained"  
        Notification.configure(text=res, bg="turquoise4", width=50, font=('times', 18, 'bold'))
        Notification.place(x=20, y=450)

    trainImg = tkinter.Button(window5, text="TRAIN IMAGES",fg="black",command=trainimg ,bg="turquoise4"  ,width=15,height=2,font=('times', 15, ' bold '))
    trainImg.place(x=270, y=350)
    
    register= tkinter.Button(window5,text='REGISTER',command=del_window5,fg="black"  ,bg="turquoise4"  ,width=15  ,height=2,font=('times', 15, ' bold '))
    register.place(x=530, y=350)


window1=tkinter.Tk()
window1.title("FACE RECOGNITION")
window1.geometry('750x500')
window1.configure(background='SkyBlue1')
l=tkinter.Label(window1,text="DUOCODE",fg='black',bg='turquoise4',width=15,height=2,font=('times',15,'bold'))
l.pack()
l.place(x=300,y=20)
b1=tkinter.Button(window1, text="ADMIN LOGIN", command=window_for_admin,fg='black',bg='turquoise4',width=15,height=1,font=('times',15,'bold')).place(x=300,y=150)
b2=tkinter.Button(window1, text="ATTENDANCE", command=filling_attendance,fg='black',bg='turquoise4',width=15,height=1,font=('times',15,'bold')).place(x=300,y=250)
b3=tkinter.Button(window1, text="EMPLOYEE REGISTRATION", command=window_for_registration_of_employee,fg='black',bg='turquoise4',width=25,height=1,font=('times',15,'bold')).place(x=250,y=200)


window1.mainloop()
