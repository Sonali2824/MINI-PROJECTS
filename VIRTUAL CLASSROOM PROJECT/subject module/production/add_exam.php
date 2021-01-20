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
 $tb=strtolower($_SESSION["username"])."_".$_SESSION["sub"]."_exam";
 
 $name=$_POST["name"];
 $link=$_POST['link'];
 $slink=$_POST['sub_link'];
 $info=$_POST['info'];
 
function newAss(){
	$dbhost = "localhost";  
 $dbuser = "root";
 $dbpass = "";
 $db = $_SESSION["username"]."_".$_SESSION["sub"]."_dB";
 $conn = new mysqli($dbhost,$dbuser, $dbpass,$db) or die();
 
 
 $name=$_POST["name"];
 $link=$_POST['link'];
 $slink=$_POST['sub_link'];
 $info=$_POST['info'];

 $tb=strtolower($_SESSION["username"])."_".$_SESSION["sub"]."_exam";
 
$query="insert into ".$tb. " values('$name','$link', '$info', '$slink');";

$res= (mysqli_query($conn, $query));

header('Refresh:1; url="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/subject%20module/production/index4.php"'); 


}
 if(!empty($_POST['name']) and !empty($_POST['link']) and !empty($_POST['sub_link'])  )
 {  $query = "select * from ".$tb." where name='$name' ;";
$res= (mysqli_query($conn, $query));

 	if(!$row = mysqli_fetch_array($res) ) 
 	{
 	
 		newAss(); 
 	}
 	else
 	{
echo '<script>window.alert("The entered name of the module exists! Kindly enter another name!");</script>';
	header('Refresh:1; url="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/subject%20module/production/index4.php"'); 
 	}
 	
 
 }	
else
{
	echo '<script>window.alert("Kindly fill in all the fields!");</script>';
	header('Refresh:1; url="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/subject%20module/production/index4.php"');  
}

 
 




   $conn -> close();
    
?>

