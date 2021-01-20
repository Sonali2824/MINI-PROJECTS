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
 
 
 
 
function updAss1(){
	$dbhost = "localhost";  
 $dbuser = "root";
 $dbpass = "";
 $db = $_SESSION["username"]."_".$_SESSION["sub"]."_dB";
 $conn = new mysqli($dbhost,$dbuser, $dbpass,$db) or die();
 
 
 $name=$_POST["name1"];
$link=$_POST["link1"];
 $info=$_POST['info1'];

 $tb=strtolower($_SESSION["username"])."_".$_SESSION["sub"]."_exam";
 #echo "$tb";
$query="update ".$tb. " set link='$link', info='$info' where name='$name';";
#echo "$query";
$res= (mysqli_query($conn, $query));

header('Refresh:1; url="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/subject%20module/production/index4.php"'); 

 

}
function updAss2(){
	$dbhost = "localhost";  
 $dbuser = "root";
 $dbpass = "";
 $db = $_SESSION["username"]."_".$_SESSION["sub"]."_dB";
 $conn = new mysqli($dbhost,$dbuser, $dbpass,$db) or die();
 
 
 $name=$_POST["name1"];

 $slink=$_POST['sub_link1'];
 $info=$_POST['info1'];

 $tb=strtolower($_SESSION["username"])."_".$_SESSION["sub"]."_exam";
 #echo "$tb";
$query="update ".$tb. " set sub_link='$slink', info='$info' where name='$name';";
#echo "$query";
$res= (mysqli_query($conn, $query));

header('Refresh:1; url="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/subject%20module/production/index4.php"'); 

 

}
function updAss3(){
	$dbhost = "localhost";  
 $dbuser = "root";
 $dbpass = "";
 $db = $_SESSION["username"]."_".$_SESSION["sub"]."_dB";
 $conn = new mysqli($dbhost,$dbuser, $dbpass,$db) or die();
 
 
 $name=$_POST["name1"];

 $link=$_POST['link1'];

 $tb=strtolower($_SESSION["username"])."_".$_SESSION["sub"]."_exam";
 #echo "$tb";
$query="update ".$tb. " set link='$link' where name='$name';";
#echo "$query";
$res= (mysqli_query($conn, $query));

header('Refresh:1; url="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/subject%20module/production/index4.php"'); 

 

}
function updAss4(){
	$dbhost = "localhost";  
 $dbuser = "root";
 $dbpass = "";
 $db = $_SESSION["username"]."_".$_SESSION["sub"]."_dB";
 $conn = new mysqli($dbhost,$dbuser, $dbpass,$db) or die();
 
 
 $name=$_POST["name1"];

 $slink=$_POST['sub_link1'];

 $tb=strtolower($_SESSION["username"])."_".$_SESSION["sub"]."_exam";
 #echo "$tb";
$query="update ".$tb. " set sub_link='$slink' where name='$name';";
#echo "$query";
$res= (mysqli_query($conn, $query));

header('Refresh:1; url="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/subject%20module/production/index4.php"'); 

 

}
function updAss5(){
	$dbhost = "localhost";  
 $dbuser = "root";
 $dbpass = "";
 $db = $_SESSION["username"]."_".$_SESSION["sub"]."_dB";
 $conn = new mysqli($dbhost,$dbuser, $dbpass,$db) or die();
 
 
 $name=$_POST["name1"];

 $info=$_POST['info1'];

 $tb=strtolower($_SESSION["username"])."_".$_SESSION["sub"]."_exam";
 #echo "$tb";
$query="update ".$tb. " set info='$info' where name='$name';";
#echo "$query";
$res= (mysqli_query($conn, $query));

header('Refresh:1; url="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/subject%20module/production/index4.php"'); 

 

}
function updAss6(){
	$dbhost = "localhost";  
 $dbuser = "root";
 $dbpass = "";
 $db = $_SESSION["username"]."_".$_SESSION["sub"]."_dB";
 $conn = new mysqli($dbhost,$dbuser, $dbpass,$db) or die();
 
 
 $name=$_POST["name1"];
$link=$_POST['link1'];
$slink=$_POST['sub_link1'];
 $info=$_POST['info1'];

 $tb=strtolower($_SESSION["username"])."_".$_SESSION["sub"]."_exam";
 #echo "$tb";
$query="update ".$tb. " set link='$link', sub_link='$slink', info='$info' where name='$name';";
#echo "$query";
$res= (mysqli_query($conn, $query));

header('Refresh:1; url="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/subject%20module/production/index4.php"'); 

 

}
function updAss7(){
	$dbhost = "localhost";  
 $dbuser = "root";
 $dbpass = "";
 $db = $_SESSION["username"]."_".$_SESSION["sub"]."_dB";
 $conn = new mysqli($dbhost,$dbuser, $dbpass,$db) or die();
 
 
 $name=$_POST["name1"];
$link=$_POST['link1'];
$slink=$_POST['sub_link1'];


 $tb=strtolower($_SESSION["username"])."_".$_SESSION["sub"]."_exam";
 #echo "$tb";
$query="update ".$tb. " set link='$link', sub_link='$slink' where name='$name';";
#echo "$query";
$res= (mysqli_query($conn, $query));

header('Refresh:1; url="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/subject%20module/production/index4.php"'); 

 

}

 if(!empty($_POST['name1'])  )
 { 
 	
 if (!empty($_POST['link1']) and !empty($_POST['info1'])  ) {
 	updAss1();
 }
 elseif (!empty($_POST['sub_link1']) and !empty($_POST['info1']) ) {
 	updAss2();
 }
 elseif (!empty($_POST['sub_link1']) and !empty($_POST['link1']) ) {
 	updAss7();
 }
 elseif (!empty($_POST['link1'])  ) {
 	updAss3();
 }
 elseif (!empty($_POST['sub_link1'])  ) {
 	updAss4();
 }
 elseif (!empty($_POST['info1'])  ) {
 	updAss5();
 }
 elseif (!empty($_POST['info1']) and !empty($_POST['link1']) and !empty($_POST['sub_link1'])  ) {
 	updAss6();
 }
 

 
 
 
 	
 		
 	}
 	
 
 	
else
{
	echo '<script>window.alert("Kindly fill in the required fields!");</script>';
	header('Refresh:1; url="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/subject%20module/production/index4.php"');  
}

 
 




   $conn -> close();
    
?>

