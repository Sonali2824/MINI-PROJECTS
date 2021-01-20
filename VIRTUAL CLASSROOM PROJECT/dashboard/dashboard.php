<?php
//include auth_session.php file on all user panel pages
include("C:\\xampp\\htdocs\\VIRTUAL CLASSROOM PROJECT\\auth_session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Faculty Dashboard</title>
    <link rel="icon" type="image/png" href="img/favicon.ico"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
    
</head>

<body style="background-image: url('img\\background.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-xl navbar-light bg-light">
                    <a class="navbar-brand" href="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/dashboard/dashboard.php">
                        
                        <i class="fas fa-3x fa-tachometer-alt tm-site-icon"></i>
                        <h1 class="tm-site-title mb-0">Dashboard <p>Hey, <?php echo $_SESSION['username']; ?>!</p> </h1>
                    </a>
                    <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto">
                            
                            
                            
                                
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link d-flex" href="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/logout.php">
                                    <i class="far fa-user mr-2 tm-logout-icon"></i>
                                    <span>Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- row -->
        <div class="row tm-content-row tm-mt-big">
            
            <div class="tm-col tm-col-big">
                <div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title">Create A Class</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <form action="sub_module_reg.php" class="tm-signup-form" method="post">
                                <div class="form-group">
                                    <label for="no">Enter the number of class created on this forum:</label>
                                    <input id="no" name="no" type="text" class="form-control validate">
                                </div>
                                <div class="form-group">
                                    <label for="name">Enter Faculty Name:</label>
                                    <input  id="name" name="name" type="text" class="form-control validate">
                                </div>
                                <div class="form-group">
                                    <label>Select Department: </label>
<select name = "dropdown" class="form-control validate"  >
            <option value = "ISE" selected>ISE</option>
            <option value = "CSE">CSE</option>
            <option value = "ECE">ECE</option>
            <option value = "EEE">EEE</option>
            <option value = "MECHANICAL">MECHANICAL</option>
            <option value = "AUTOMOBILE">AUTOMOBILE</option>
</select>
                                </div>
                                <div class="form-group">
                                    Enter Subject Name: <input type="text" name="sub" class="form-control validate">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger" style="color: #6A5ACD;
  background-color: #6A5ACD;
  border-color: white; color: black; " >Create Class</button>
                                </div>                               

                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="tm-col tm-col-big">
                <div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title">Classes Created</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                          <?php 
$dbhost = "localhost";  
 $dbuser = "root";
 $dbpass = "";
 $db = "virtualclassroom";
 $conn = new mysqli($dbhost,$dbuser, $dbpass,$db) or die();
 $tb=strtolower($_SESSION['username']);
 
 $tb=strtolower($_SESSION['username'])."_sub_module";
 $sql="select * from ".$tb." where num=1;";
 
  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
        
        $count = mysqli_num_rows($result);  

 if ($count==1) : ?>
    <form action="set_b1.php" method="post">
 <div >
<input type="submit"  style="visibility: visible; color: #6A5ACD;
  background-color: #6A5ACD;
  border-color: white; color: black; width: 300px;" id="b1" class="btn-class" value="

    <?php 
$dbhost = "localhost";  
 $dbuser = "root";
 $dbpass = "";
 $db = "virtualclassroom";
 $conn = new mysqli($dbhost,$dbuser, $dbpass,$db) or die();
$tb=strtolower($_SESSION['username']);
 
 $tb=strtolower($_SESSION['username'])."_sub_module";
 $sql="select * from ".$tb." where num=1;";
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
        echo $row["num"]," ",$row["sub"] ;
        $count = mysqli_num_rows($result);  

  ?> "/>

</div>
</form>
<?php endif ?>
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
        
        $count = mysqli_num_rows($result);  

 if ($count==1) : ?>
    <form action="set_b2.php" method="post">
 <div >
<input type="submit" style="visibility: visible; color: #6A5ACD;
  background-color: #6A5ACD;
  border-color: white; color: black; width: 300px;" id="b2" class="btn-class"  value="

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
        echo $row["num"]," ",$row["sub"] ;
        $count = mysqli_num_rows($result);  

  ?>
"/>
</div>
</form>
<?php endif ?>

<?php 
$dbhost = "localhost";  
 $dbuser = "root";
 $dbpass = "";
 $db = "virtualclassroom";
 $conn = new mysqli($dbhost,$dbuser, $dbpass,$db) or die();
 $tb=strtolower($_SESSION['username']);
 
 $tb=strtolower($_SESSION['username'])."_sub_module";
 $sql="select * from ".$tb." where num=3;"; 
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
        
        $count = mysqli_num_rows($result);  

 if ($count==1) : ?>
    <form action="set_b3.php" method="post">
 <div >
<input type="submit" style="visibility: visible; color: #6A5ACD;
  background-color: #6A5ACD;
  border-color: white; color: black; width: 300px;" id="b3" class="btn-class" value="

    <?php 
$dbhost = "localhost";  
 $dbuser = "root";
 $dbpass = "";
 $db = "virtualclassroom";
 $conn = new mysqli($dbhost,$dbuser, $dbpass,$db) or die();
 $tb=strtolower($_SESSION['username']);
 
 $tb=strtolower($_SESSION['username'])."_sub_module";
 $sql="select * from ".$tb." where num=3;";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
        echo $row["num"]," ",$row["sub"] ;
        $count = mysqli_num_rows($result);  

  ?>"/>
 
</div>
</form>
<?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tm-col tm-col-small">
                <div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title">Delete A Class</h2>
                        </div>
                    </div>
                     <form action="sub_module_del.php" class="tm-signup-form" method="post">
                                <div class="form-group">
                                    <label for="name1">Enter the name of the class to be deleted:</label>
                                    <input id="name1" name="name1" type="text" class="form-control validate">
                                </div>
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger" style="color: #6A5ACD;
  background-color: #6A5ACD;
  border-color: white; color: black;padding-left:6px; ">Delete Class </button>
                                </div>                               

                            </form>
                </div>
            </div>
        </div>
        
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
</body>

</html>