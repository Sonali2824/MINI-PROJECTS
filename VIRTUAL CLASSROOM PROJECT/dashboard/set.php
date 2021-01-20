<?php
//include auth_session.php file on all user panel pages
include("C:\\xampp\\htdocs\\VIRTUAL CLASSROOM PROJECT\\auth_session1.php");
?>
<?php 
$dbhost = "localhost";  
 $dbuser = "root";
 $dbpass = "";
 $db = "virtualclassroom";
 $conn = new mysqli($dbhost,$dbuser, $dbpass,$db) or die();
 $fname=$_POST["name"];
 $subject=$_POST["sub"];
 $_SESSION["sub"]=$subject;
 $sql="select * from faculty_login where name='".$fname."';";
 
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result); 
        
        $_SESSION["username"]=$row[2] ;
$db1 = $_SESSION["username"]."_".$_SESSION["sub"]."_dB";
$conn1 = new mysqli($dbhost,$dbuser, $dbpass,$db1) or die();
if (mysqli_connect_errno())
{
echo '<script>window.alert("Class is not created! Kindly check all details entered.");</script>';
 header('Refresh:1; url="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/dashboard/dashboard_stud.php"');
}

else
{
 $sql="select * from faculty_login where name='".$fname."';";
 
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result); 
        
        $_SESSION["username"]=$row[2] ;
        
        $count = mysqli_num_rows($result);  
         
        header('Refresh:1; url="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/stud%20subject%20module/production/index_stud.php"');
}

  ?>