<?php
 $dbhost = "localhost";  
 $dbuser = "root";
 $dbpass = "";
 $db = "virtualclassroom";
 $conn = new mysqli($dbhost,$dbuser, $dbpass,$db) or die();
 
 
 $fname=$_POST['name'];
 $femail=$_POST['email'];
 $funame=$_POST['username'];
$fpass=$_POST['pass'];
$frpass=$_POST['repeat-pass'];
function newUser(){
	$dbhost = "localhost";  
 $dbuser = "root";
 $dbpass = "";
 $db = "virtualclassroom";
 $conn = new mysqli($dbhost,$dbuser, $dbpass,$db) or die();
 
 
 $fname=$_POST['name'];
 $femail=$_POST['email'];
 $funame=$_POST['username'];
$fpass=$_POST['pass'];
$fname=strtoupper($fname);
 $res = mysqli_query($conn,"insert into student_login
  values('$fname','$femail','$funame','$fpass')");
 header('Location: http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/student_faculty_login/student_log_in.html');
 
 

}
 if(!empty($_POST['name']) and !empty($_POST['email']) and !empty($_POST['username']) and !empty($_POST['pass']) and !empty($_POST['repeat-pass']))
 { 
 $query = mysqli_query($conn,"SELECT * FROM student_login WHERE name ='$fname'") ;
 	if(!$row = mysqli_fetch_array($query) ) 
 	{ $query1 = mysqli_query($conn,"SELECT * FROM student_login WHERE username ='$funame'") ;
 if(!$row = mysqli_fetch_array($query1) ) {
 	if($fpass==$frpass)
 	{
 		newUser(); 
 	}
 	else{
 		
 	echo '<script>window.alert("Kindly enter same passwords!");</script>';
 	header('Refresh:1; url="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/student_sign_up/student_sign_up.html"'); 

 	}
 }
 else{
 	
 	
 	echo '<script>window.alert("Username already exists! Kinldy use another username!");</script>';
 	header('Refresh:1; url="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/student_sign_up/student_sign_up.html"'); 
 }
 	} 
 	else 
 	{  
        
 		echo '<script>window.alert("You are already a registered user!");</script>';
 		header('Refresh:1; url="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/student_sign_up/student_sign_up.html"'); 

} 
} 
else
{
	echo '<script>window.alert("Kindly fill all fields!");</script>';
	header('Refresh:1; url="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/student_sign_up/student_sign_up.html"'); 
}

 
 




   $conn -> close();
    
?>

