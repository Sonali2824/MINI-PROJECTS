<?php
//include auth_session.php file on all user panel pages
include("C:\\xampp\\htdocs\\VIRTUAL CLASSROOM PROJECT\\auth_session.php");
?>
<?php
$dbhost = "localhost"; 
$dbuser = "root";
 $dbpass = "";
 $db = "virtualclassroom";
 $conn = new mysqli($dbhost,$dbuser, $dbpass,$db) or die();
 
 $sub=$_POST['name1'];
 function delSubject(){
 	$dbhost = "localhost"; 
$dbuser = "root";
 $dbpass = "";
 $db = "virtualclassroom";
 $conn = new mysqli($dbhost,$dbuser, $dbpass,$db) or die();
 #echo "connected";
 $sub=$_POST['name1'];
 #echo "$sub";
 $tb=strtolower($_SESSION['username'])."_sub_module";
 $sql="DELETE FROM ".$tb." WHERE sub='".$sub."' ;";
   
$res2 = mysqli_query($conn, $sql); 

$db1=strtolower($_SESSION["username"])."_".strtolower($sub)."_db";
$sql1="DROP  DATABASE ".$db1." ;";
#echo $sql1;
$conn1 = new mysqli($dbhost,$dbuser, $dbpass) or die();
$res3 = mysqli_query($conn1, $sql1);  

 

	

	header('Refresh:1; url="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/dashboard/dashboard.php"'); 
}

if(!empty($_POST['name1']))
{
	delSubject(); 
}
else
{
	echo '<script>window.alert("Kindly fill in the subject!");</script>';
	header('Refresh:1; url="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/dashboard/dashboard.php"'); 
}
?>