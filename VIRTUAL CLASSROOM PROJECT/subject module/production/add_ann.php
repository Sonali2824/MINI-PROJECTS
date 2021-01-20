<?php
//include auth_session.php file on all user panel pages
include("C:\\xampp\\htdocs\\VIRTUAL CLASSROOM PROJECT\\auth_session.php");
?>
<?php
 $dbhost = "localhost";  
 $dbuser = "root";
 $dbpass = "";
 $db = $_SESSION["username"]."_".$_SESSION["sub"]."_dB";
 $conn = new mysqli($dbhost,$dbuser, $dbpass,$db) or die();
 $tb=strtolower($_SESSION["username"])."_".$_SESSION["sub"]."_ann";
 
 $name=$_POST["name"];
 
 $info=$_POST['info'];
 
function newAnn(){
	$dbhost = "localhost";  
 $dbuser = "root";
 $dbpass = "";
 $db = $_SESSION["username"]."_".$_SESSION["sub"]."_dB";
 $conn = new mysqli($dbhost,$dbuser, $dbpass,$db) or die();
 
 
 $name=$_POST["name"];
 $info=$_POST['info'];

 $tb=strtolower($_SESSION["username"])."_".$_SESSION["sub"]."_ann";
 
$query="insert into ".$tb. " values('$name','$info');";

$res= (mysqli_query($conn, $query));

header('Refresh:1; url="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/subject%20module/production/index.php"'); 


}
 if(!empty($_POST['name']) and !empty($_POST['info'])  )
 {  $query = "select * from ".$tb." where name='$name' ;";
$res= (mysqli_query($conn, $query));

 	if(!$row = mysqli_fetch_array($res) ) 
 	{
 	
 		newAnn(); 
 	}
 	else
 	{
echo '<script>window.alert("The entered title of announcement exists! Kindly enter another title!");</script>';
	header('Refresh:1; url="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/subject%20module/production/index.php"'); 
 	}
 	
 
 }	
else
{
	echo '<script>window.alert("Kindly fill in all the fields!");</script>';
	header('Refresh:1; url="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/subject%20module/production/index.php"');  
}

 
 




   $conn -> close();
    
?>

