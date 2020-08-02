# AUTO ATTENDANCE SYSTEM USING FACE RECOGNITION
## Architecture
The following figurerepresents the architecture of the current implementation of the project.
<br>
![ARCHITECTURE](https://github.com/Sonali2824/MINI-PROJECTS/blob/master/FACE%20RECOGNITION/ARCHITECTURE.png?raw=true)
<br>
 
The architecture comprises of the following components:
1.	Admin Access:
 * Login
 * Viewing all Employee Records displays Employee Registration CSV File
 * Viewing all Present Records displays Folder with date named CSV Files
2.	Employee Registration:
 * Enter E-ID and Name
 * Take Images
 * Train Images
 * Register
3.	Attendance:
 * Captures image
 * If face recognized, Employee data is updated into Attendance CSV File
 * If the face is not recognized, unknown record is added into Attendance CSV File
 <br>
 ## Instructions to run the main.py file
 1. Clone the repository
 2. Create two folders EmployeeAttendance and TrainingImage
 3. In the main.py file change "C:\Users\USER\Desktop\MINI-PROJECTS\FACE RECOGNITION" parts of the code with respect to your respectiverelative paths
 4. Run the main.py file
 5. In the admin login component:
   * Admin logs in and enters the username and password credentials(Username: admin and Password: admin12). The admin after successful login can access the employee’s registration and attendance related files.
 6. Initially, no details can be accessed as no employee registration and attendance hasn't be taken. In order to register the employee, the employee details have to be entered, then images have to be taken and then the train button is clicked. After the notification that the images have been trained is provided, we click on the register button and the employee is successfully registered.
 <br> 
 ![EMPLOYEE_REGISTER](https://github.com/Sonali2824/MINI-PROJECTS/blob/master/FACE%20RECOGNITION/EMPLOYEE%20REGISTRATION.png?raw=true)
 <br>
7. Then the attendace component is clicked, in order to update the attendance of the employees.

