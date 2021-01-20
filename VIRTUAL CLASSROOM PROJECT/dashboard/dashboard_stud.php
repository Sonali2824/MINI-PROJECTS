<?php
//include auth_session.php file on all user panel pages
include("C:\\xampp\\htdocs\\VIRTUAL CLASSROOM PROJECT\\auth_session1.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Dashboard</title>
    <link rel="icon" type="image/png" href="img/favicon.ico"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
</head>

<body id="reportsPage" class="bg02" style="background-image: url('img\\background.jpg')">
    <div class="" id="home">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-xl navbar-light bg-light">
                        <a class="navbar-brand" href="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/dashboard/dashboard_stud.php">
                            
                            <i class="fas fa-3x fa-tachometer-alt tm-site-icon"></i>
                            <h1 class="tm-site-title mb-0">Dashboard <p>Hey, <?php echo $_SESSION['user']; ?>!</p></h1>
                        </a>
                        <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item">
                                    
                                </li>
                                <li class="nav-item dropdown">
                                    
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        
                                    </div>
                                </li>
                                <li class="nav-item active">
                                    
                                </li>

                                <li class="nav-item">
                                   
                                </li>
                                <li class="nav-item dropdown">
                                    
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        
                                    </div>
                                </li>
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
                <div class="col-xl-8 col-lg-12 tm-md-12 tm-sm-12 tm-col">
                    <div class="bg-white tm-block h-100">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <h2 class="tm-block-title d-inline-block">Added Classes</h2>

                            </div>
                            <div class="col-md-4 col-sm-12 text-right">
                                
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped tm-table-striped-even mt-3">
                                <thead>
                                    <tr class="tm-bg-gray">
                                        
                                        <th scope="col">Faculty Name</th>
                                        <th scope="col" >Subject</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
 $dbhost = "localhost";  
 $dbuser = "root";
 $dbpass = "";
 $db = "virtualclassroom";
 $conn = new mysqli($dbhost,$dbuser, $dbpass,$db) or die(); 
 
$query="select username from faculty_login ;";
$res= (mysqli_query($conn, $query));

while($row = mysqli_fetch_array($res))
{
$username=$row[0];
$tb=strtolower($username)."_sub_module";

$query1="select * from ".$tb." ;";

$res1= (mysqli_query($conn, $query1));
while($row1 = mysqli_fetch_array($res1) )
{
    
    print "<tr><td>$row1[1]</td>";
    print "<td>$row1[3]</td></tr>";
}
}


   $conn -> close();
    
?>
                                    
                                </tbody>
                            </table>
                        </div>

                        <div class="tm-table-mt tm-table-actions-row">
                            <div class="tm-table-actions-col-left">
                                
                            </div>
                            <div class="tm-table-actions-col-right">
                                
                                <nav aria-label="Page navigation" class="d-inline-block">
                                    <ul class="pagination tm-pagination">
                                        
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-12 tm-md-12 tm-sm-12 tm-col">
                    <<div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title">Access a Class</h2>
                        </div>
                    </div>
                     <form action="set.php" class="tm-signup-form" method="post">
                        <div class="form-group">
                                    <label for="name">Enter the name of the Faculty: <small>(as displayed on the table)</small></label>
                                    <input id="name" name="name" type="text" class="form-control validate">
                                </div>
                                <div class="form-group">
                                    <label for="sub">Enter the name of the class: <small>(as displayed on the table)</small></label>
                                    <input id="sub" name="sub" type="text" class="form-control validate">
                                </div>
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger" style="color: #6A5ACD;
  background-color: #6A5ACD;
  border-color: white; color: black; ">Access Class </button>
                                </div>                               

                            </form>

                        </div>
                    </div>
                </div>
            </div>
                    </div>
                </div>
            </div>
            

        </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
        
    </script>
</body>

</html>