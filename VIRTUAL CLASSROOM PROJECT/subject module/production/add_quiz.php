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
 $tb=strtolower($_SESSION["username"])."_".$_SESSION["sub"]."_quiz";
 
 $name=$_POST["name"];
 $link=$_POST['link'];
 $info=$_POST['info'];
 
function newQuiz(){
	$dbhost = "localhost";  
 $dbuser = "root";
 $dbpass = "";
 $db = $_SESSION["username"]."_".$_SESSION["sub"]."_dB";
 $conn = new mysqli($dbhost,$dbuser, $dbpass,$db) or die();
 
 
 $name=$_POST["name"];
 $link=$_POST['link'];
 $info=$_POST['info'];

 $tb=strtolower($_SESSION["username"])."_".$_SESSION["sub"]."_quiz";
 
$query="insert into ".$tb. " values('$name','$link','$info');";

$res= (mysqli_query($conn, $query));

header('Refresh:1; url="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/subject%20module/production/index3.php"'); 


}
 if(!empty($_POST['name'])  and !empty($_POST['link'])  )
 {  $query = "select * from ".$tb." where name='$name' ;";
$res= (mysqli_query($conn, $query));

 	if(!$row = mysqli_fetch_array($res) ) 
 	{
 	
 		newQuiz(); 
 	}
 	else
 	{
echo '<script>window.alert("The entered name of the quiz exists! Kindly enter another name!");</script>';
	header('Refresh:1; url="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/subject%20module/production/index3.php"'); 
 	}
 	
 
 }	
else
{
	echo '<script>window.alert("Kindly fill in all the fields!");</script>';
	header('Refresh:1; url="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/subject%20module/production/index3.php"');  
}

 
 




   $conn -> close();
    
?>

