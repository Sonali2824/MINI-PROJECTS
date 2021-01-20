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
 
 
 
 
function newAnn(){
	$dbhost = "localhost";  
 $dbuser = "root";
 $dbpass = "";
 $db = $_SESSION["username"]."_".$_SESSION["sub"]."_dB";
 $conn = new mysqli($dbhost,$dbuser, $dbpass,$db) or die();
 
 
 $name=$_POST["name1"];
 $info=$_POST['info1'];

 $tb=strtolower($_SESSION["username"])."_".$_SESSION["sub"]."_ann";
 #echo "$tb";
$query="update ".$tb. " set info='$info' where name='$name';";
#echo "$query";
$res= (mysqli_query($conn, $query));

header('Refresh:1; url="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/subject%20module/production/index.php"'); 

 

}
 if(!empty($_POST['name1']) and !empty($_POST['info1'])  )
 { 
 	
 		newAnn(); 
 	}
 	
 
 	
else
{
	echo '<script>window.alert("Kindly fill in all the fields!");</script>';
	header('Refresh:1; url="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/subject%20module/production/index.php"');  
}

 
 




   $conn -> close();
    
?>

