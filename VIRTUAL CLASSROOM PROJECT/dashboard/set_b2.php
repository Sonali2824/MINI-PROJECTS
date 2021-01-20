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
$tb=strtolower($_SESSION['username']);
 
 $tb=strtolower($_SESSION['username'])."_sub_module";
 $sql="select * from ".$tb." where num=2;";
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
        
        $_SESSION["sub"]=$row["sub"] ;
        $count = mysqli_num_rows($result);  
         
       header('Refresh:1; url="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/subject%20module/production/index.php"');

  ?>