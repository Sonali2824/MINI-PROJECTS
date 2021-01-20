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
 
 
 $no=$_POST["no"];
 $fname=$_POST['name'];
 $dept=$_POST['dropdown'];
 $subject=$_POST['sub'];
function newSubject(){
	$dbhost = "localhost";  
 $dbuser = "root";
 $dbpass = "";
 $db = "virtualclassroom";
 $conn = new mysqli($dbhost,$dbuser, $dbpass,$db) or die();
 
 $no=$_POST["no"];
 $fname=$_POST['name'];
 $dept=$_POST['dropdown'];
 $subject=$_POST['sub'];
 $_SESSION["sub"]=$subject;
$tb=strtolower($_SESSION['username']);
 
 $tb=strtolower($_SESSION['username'])."_sub_module";
 $sql="insert into ".$tb." values('$no','$fname','$dept','$subject');";

 $res = mysqli_query($conn,$sql);


 $db1=$_SESSION["username"]."_".strtolower($subject)."_dB";
$query2="create database ".$db1. " ;";
$conn1 = new mysqli($dbhost,$dbuser, $dbpass) or die();
$res3= (mysqli_query($conn1, $query2));

$conn2 = new mysqli($dbhost,$dbuser, $dbpass,$db1) or die();

$tb1=$_SESSION["username"]."_".strtolower($subject)."_ann";
$query3="create table ".$tb1. " ( name varchar(50),info varchar(500));";
$res4= (mysqli_query($conn2, $query3));

$tb2=$_SESSION["username"]."_".strtolower($subject)."_mod";
$query4="create table ".$tb2. " (name varchar(50), link text(65535), info varchar(500) );";
$res5= (mysqli_query($conn2, $query4));

$tb3=$_SESSION["username"]."_".strtolower($subject)."_ass";
$query5="create table ".$tb3. " (name varchar(50), link text(65535), info varchar(500), sub_link text(65535) );";
$res6= (mysqli_query($conn2, $query5));

$tb4=$_SESSION["username"]."_".strtolower($subject)."_quiz";
$query6="create table ".$tb4. " (name varchar(50), link text(65535), info varchar(500)  );";
$res7= (mysqli_query($conn2, $query6));

$tb5=$_SESSION["username"]."_".strtolower($subject)."_exam";
$query7="create table ".$tb5. " (name varchar(50), link text(65535), info varchar(500), sub_link text(65535)  );";
$res8= (mysqli_query($conn2, $query7));

$tb6=$_SESSION["username"]."_".strtolower($subject)."_lab";
$query8="create table ".$tb6. " (name varchar(50), link text(65535), info varchar(500), sub_link text(65535)  );";
$res9= (mysqli_query($conn2, $query8));
 
header('Refresh:1; url="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/dashboard/dashboard.php"'); 
 
 

}
 if(!empty($_POST['no']) and !empty($_POST['name']) and !empty($_POST['dropdown']) and !empty($_POST['sub']) )
 { 
 	if($_POST["no"]==1 or $_POST["no"]==2 or  $_POST["no"]==3 )
 	{
 	$tb=strtolower($_SESSION['username']);
 
 $tb=strtolower($_SESSION['username'])."_sub_module";
 $sql="select * from ".$tb." where num='$no';";
 
  
        $query = mysqli_query($conn, $sql);  

 	if(!$row = mysqli_fetch_array($query) ) 
 	{ 
 		newSubject(); 
 	}
 

 	
 
 	else 
 	{  
        
 		echo '<script>window.alert("You have already created a class with the same number!");</script>';
 		header('Refresh:1; url="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/dashboard/dashboard.php"'); 

} }
else{
	echo '<script>window.alert("You can create only 3 classes!");</script>';
 		header('Refresh:1; url="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/dashboard/dashboard.php"'); 

}
} 
else
{
	echo '<script>window.alert("Kindly fill all fields!");</script>';
	header('Refresh:1; url="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/dashboard/dashboard.php"'); 
}

 
 




   $conn -> close();
    
?>

