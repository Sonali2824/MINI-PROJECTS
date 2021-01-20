<?php
//include auth_session.php file on all user panel pages
include("C:\\xampp\\htdocs\\VIRTUAL CLASSROOM PROJECT\\auth_session.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Classes Dashboard!  </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index1.php" class="site_title"><i class="fa fa-book"></i> <span>Classes Dashboard!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                
              </div>
              <div class="profile_info">
                <span>Welcome to the Class <?php echo $_SESSION['sub']." "; ?><?php echo $_SESSION['username']; ?>!</p></span>
                
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                
                <ul class="nav side-menu">
                  
                  <li><a href="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/subject%20module/production/index.php"><i class="fa fa-thumb-tack"></i> Announcements <span ></span></a>
                    
                  </li>
                  <li><a href="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/subject%20module/production/index1.php"><i class="fa fa-bookmark"></i> Module Resources <span ></span></a>
                   
                  </li>
                  <li><a href="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/subject%20module/production/index2.php"><i class="fa fa-edit"></i> Assignments <span ></span></a>
                    
                  </li>
                  <li><a href="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/subject%20module/production/index3.php"><i class="fa fa-question-circle"></i> Quiz Links <span ></span></a>
                    
                  </li>
                  <li><a href="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/subject%20module/production/index4.php"><i class="fa fa-pencil-square"></i>Examinations <span ></span></a>
                    
                  </li>
                  <li><a href="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/subject%20module/production/index5.php"><i class="fa fa-laptop"></i>Lab <span ></span></a>
                    
                  </li>
                  <li><a href="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/dashboard/dashboard.php"><i class="fa fa-dashboard"></i>Dashboard <span ></span></a>
                    
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                
                <ul class="nav side-menu">
                  
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
             
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
              <div class="title_left">
                <h3>Module Resources</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    
                    <span class="input-group-btn">
                      
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Added Content</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Link for Content</th>
                          <th>Additional Information</th>
                          
                        </tr>
                      </thead>


                      <tbody>
                        <?php
 $dbhost = "localhost";  
 $dbuser = "root";
 $dbpass = "";
 $db = $_SESSION["username"]."_".$_SESSION["sub"]."_dB";
 $conn = new mysqli($dbhost,$dbuser, $dbpass,$db) or die(); 
 $tb=$_SESSION["username"]."_".$_SESSION["sub"]."_mod";
$query="select * from ".$tb. " ;";
$res= (mysqli_query($conn, $query));

while($row = mysqli_fetch_array($res))
{
  
print "<tr><td>$row[0]</td><td><a href=$row[1] target='_blank'>Click to View Content</a></td>";
print "<td>$row[2]</td></tr>";

}


   $conn -> close();
    
?>
                        
                      </tbody>
                    </table>
                  </div>
                  </div>
              

          

              </div>
          

            <div class="title_right">
              <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                <div class="input-group">
                  
                  <span class="input-group-btn">
                    
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Add Resources</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="add_mod.php" method="post" >

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="name"> Name of the Module <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="name" name="name" required="required" class="form-control ">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="link">Link for the Resource Content <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="link" name="link" required="required" class="form-control">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="info" class="col-form-label col-md-3 col-sm-3 label-align">Additional Information</label>
                      <div class="col-md-6 col-sm-6 ">
                        <textarea id="info" class="form-control" type="text" name="info"></textarea>
                      </div>
                    </div>
                    
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                      <div class="col-md-6 col-sm-6 offset-md-3">
                        
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>


            
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Update Content</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form id="demo-form21" data-parsley-validate class="form-horizontal form-label-left" action="upd_mod.php" method="post">


                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="name1">Name of the Module <small>(as previously entered)</small> <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="name1" name="name1" required="required" class="form-control ">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="link1">Updated Link for Resource Content <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="link1" name="link1" required="required" class="form-control">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="info1" class="col-form-label col-md-3 col-sm-3 label-align">Updated Additional Information</label>
                      <div class="col-md-6 col-sm-6 ">
                        <textarea id="info1" class="form-control" type="text" name="info1"></textarea>
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    
                    <div class="item form-group">
                      <div class="col-md-6 col-sm-6 offset-md-3">
                        
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <button type="submit" class="btn btn-success" value="Update">Update</button>
                      </div>
                    </div>
                    

                  </form>
                </div>
              </div>
            </div>
          </div>

          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Delete Content</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form id="demo-form22" data-parsley-validate class="form-horizontal form-label-left" action="del_mod.php" method="post">


                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="name2">Name of the Module <small>(as previously entered)</small> <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="name2" name="name2" required="required" class="form-control ">
                      </div>
                    </div>
                    
                    <div class="ln_solid"></div>
                    
                    <div class="item form-group">
                      <div class="col-md-6 col-sm-6 offset-md-3">
                        
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <button type="submit" class="btn btn-success" value="Delete">Delete</button>
                      </div>
                    </div>
                    

                  </form>
                </div>
              </div>
            </div>
          </div>
          
            </div>
          </div>

        
        <!-- /page content -->

       

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  
  </body>
</html>
