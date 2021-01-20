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
 $res = mysqli_query($conn,"insert into faculty_login
  values('$fname','$femail','$funame','$fpass')");
$tb=strtolower($funame)."_sub_module";

$query1="create table ".$tb. " (num int, name varchar(50), dept varchar(50), sub varchar(50));";


$res1= (mysqli_query($conn, $query1));
 header('Location: http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/student_faculty_login/faculty_log_in.html');
 
 

}
 if(!empty($_POST['name']) and !empty($_POST['email']) and !empty($_POST['username']) and !empty($_POST['pass']) and !empty($_POST['repeat-pass']))
 { 
 $query = mysqli_query($conn,"SELECT * FROM faculty_login WHERE name ='$fname'") ;
 	if(!$row = mysqli_fetch_array($query) ) 
 	{ $query1 = mysqli_query($conn,"SELECT * FROM faculty_login WHERE username ='$funame'") ;
 if(!$row = mysqli_fetch_array($query1) ) {
 	if($fpass==$frpass)
 	{
 		newUser(); 
 	}
 	else{
 		
 	echo '<script>window.alert("Kindly enter same passwords!");</script>';
 	header('Refresh:1; url="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/faculty_sign_up/faculty_sign_up.html"'); 

 	}
 }
 else{
 	
 	
 	echo '<script>window.alert("Username already exists! Kinldy use another username!");</script>';
 	header('Refresh:1; url="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/faculty_sign_up/faculty_sign_up.html"'); 
 }
 	} 
 	else 
 	{  
        
 		echo '<script>window.alert("You are already a registered user!");</script>';
 		header('Refresh:1; url="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/faculty_sign_up/faculty_sign_up.html"'); 

} 
} 
else
{
	echo '<script>window.alert("Kindly fill all fields!");</script>';
	header('Refresh:1; url="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/faculty_sign_up/faculty_sign_up.html"'); 
}

 
 




   $conn -> close();
    
?>

