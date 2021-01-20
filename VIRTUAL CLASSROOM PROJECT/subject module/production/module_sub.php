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
 
 
 $name=$_POST["name"];
 $link=$_POST['link'];
 $info=$_POST['info'];
 
function newModule(){
	$dbhost = "localhost";  
 $dbuser = "root";
 $dbpass = "";
 $db = $_SESSION["username"]."_".$_SESSION["sub"]."_dB";
 $conn = new mysqli($dbhost,$dbuser, $dbpass,$db) or die();
 
 
 $name=$_POST["name"];
 $link=$_POST['link'];
 $info=$_POST['info'];

 $tb=$_SESSION["username"]."_".$_SESSION["sub"]."_mod";
$query="insert into ".$tb. " values('$name','$link','$info');";
$res= (mysqli_query($conn, $query));
 
header('Refresh:1; url="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/subject%20module/production/index1.php"'); 
 
 

}
 if(!empty($_POST['name']) and !empty($_POST['link'])  )
 { 
 	
 		newModule(); 
 	}
 	
 
 	
else
{
	echo '<script>window.alert("Kindly fill the module name and link fields!");</script>';
	header('Refresh:1; url="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/subject%20module/production/index1.php"');  
}

 
 




   $conn -> close();
    
?>

