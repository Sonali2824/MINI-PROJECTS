<?php      
    $dbhost = "localhost";  
 $dbuser = "root";
 $dbpass = "";
 $db = "virtualclassroom";
 $conn = new mysqli($dbhost,$dbuser, $dbpass,$db) or die(); 
session_start();
 

    $username = $_POST['username'];  
    $password = $_POST['pass'];  
      
        
      
        $sql = "select * from faculty_login where username = '$username' and password = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            $_SESSION['username'] = $username;
            echo '<script>window.alert("Login Successful!");</script>';
            
           header('Location: http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/dashboard/dashboard.php'); 
        }  
        else{  
            echo '<script>window.alert("Login Unsuccessful! Invalid Username or password!");</script>';
            header('Refresh:2; url=http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/student_faculty_login/faculty_log_in.html');  
        }    
        
        
?>  