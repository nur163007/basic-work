<?php
session_start();
include ('../assets/dbConnect.php');
if(isset($_POST['change'])){
      $username = $_POST['username'];
      $oldpassword = $_POST['oldpassword'];
      $password = $_POST['newpassword'];
      $cpassword = $_POST['cpassword'];
      
      $query = "SELECT password from admin where username ='$username'";
      $result = mysqli_query($conn,$query);
      
      while($row = mysqli_fetch_array($result)){
        $pass = $row['password'];
        if($pass == $oldpassword){
            if($password == $cpassword){
                $sql ="UPDATE admin SET password='$password' WHERE username ='$username'";
                $update = mysqli_query($conn,$sql);
                if($update){
    $error = "Password Change Successfully";
    header("location:logout.php");
}
else{
    $error = "Can not change the password";
    
}

            }else{
                $error = "New Password and Confirm password do not match";
            }
        }else{
            $error = "Previous Password is Incorrect";
        }
        
      }
      
}
?>
<html lang="en"><!--<![endif]-->
<head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tourism</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <link rel="icon" href="../image/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="../assets/css/normalize.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="../assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../assets/css/style.css"> 
        <link rel="stylesheet" href="../assets/css/style1.css"> 
    <link rel="stylesheet" href="../assets/css/password.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="dashboard.php"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Administration</a>
                        <ul class="sub-menu children dropdown-menu">                            <li><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html">Add Customer</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="#">Add Booking</a></li>
                            <li><i class="fa fa-bars"></i><a href="package.php">Add packages</a></li>

                            <li><i class="fa fa-id-card-o"></i><a href="ui-cards.html">Add Images</a></li>
                            <li><i class="fa fa-exclamation-triangle"></i><a href="ui-alerts.html">Add Itinerary</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Reports</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="tables-basic.html">Customer Reports</a></li>
                            <li><i class="fa fa-table"></i><a href="tables-data.html">Customer List</a></li>
                            <li><i class="fa fa-table"></i><a href="tables-data.html">Booking Reports</a></li>
                            <li><i class="fa fa-table"></i><a href="tables-data.html">Packages Reports</a></li>
                            <li><i class="fa fa-table"></i><a href="tables-data.html">Images Reports</a></li>
                            <li><i class="fa fa-table"></i><a href="tables-data.html">Itinerary Reports</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand ml-auto" href="dashboard.php"><img src="../image/logo2.png" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="../image/logo2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle mr-auto"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="../image/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="adminprofile.php"><i class="fa fa-user"></i>My Profile</a>

                            <a class="nav-link" href="password.php"><i class="fa fa-lock"></i>Change Password</a>

                            <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->
        <!-- Breadcrumbs-->
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-0">

                    </div>
                    <div class="col-sm-12">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="dashboard.php">Home</a></li>
                                    <li class="active">Change Password</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.breadcrumbs-->
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="card">
                    <div class="card-header">
                        <h3>Password Change</h3>
                    </div>

                    <!-- @include('admin.includes.message') -->

                    <div class="card-body">
                        <div style = "font-size:19px; color:red; margin-left:25px;margin-bottom: 15px;" align="left"><?php echo $error; ?></div>
                        <form method="POST" action="">
                            <div class="form-group col-md-4 d-none">
                                <input class="form-control" type="text" name="username"value="<?php echo $_SESSION['username'];?>">
                               
                              </div>
                            <div class="form-group col-md-4">
                                <label for="package_name">Previous Password</label>
                                <input class="form-control" type="password" name="oldpassword" id="password"placeholder="Enter Your Old Password">
                                <span class="eye" onclick="myFunction()"><i id="hide1"class="fa fa-eye"></i>
                                  <i id="hide2"class="fa fa-eye-slash"></i></span>
                              </div>
                              <div class="form-group col-md-4">
                                <label for="package_type">New Password</label>
                                <input class="form-control" type="password" name="newpassword" id="myInput"placeholder="Enter Your New Password">
                                <span class="eye" onclick="myFunction1()"><i id="hide3"class="fa fa-eye"></i>
                                  <i id="hide4"class="fa fa-eye-slash"></i></span>
                              </div>
                              <div class="form-group col-md-4">
                                <label for="no_of_days">Confirm Password</label>
                                <input class="form-control" type="password" name="cpassword" id="loginpass"placeholder="Enter Your Confirm Password">
                                <span class="eye" onclick="myFunction2()"><i id="hide5"class="fa fa-eye"></i>
                                  <i id="hide6"class="fa fa-eye-slash"></i></span>
                              </div>

                              <input class="btn btn-success col-md-4" type="submit" name="change"value="Change Password">
                          </form>
                      </div>
                  </div>

                  <!-- /.row -->

              </div>
              <!-- .animated -->
          </div>
          <!-- /.content -->
          <div class="clearfix"></div>
          <!-- Footer -->
          <footer class="fixed-bottom">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-3 col-5 offset-1 offset-sm-3">
                        Copyright &copy; 2021 tourism
                    </div>
                    <div class="col-sm-3 col-5 text-right">
                        Designed by <a href="#">Developer</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
  

    <script>
              function myFunction(){
                  var x = document.getElementById("password");
                  var y = document.getElementById("hide1");
                  var z = document.getElementById("hide2");
                  
                  if(x.type === 'password'){
                      x.type = "text";
                      y.style.display = "block";
                      z.style.display = "none";
                  }
                  else{
                      x.type = "password";
                      y.style.display = "none";
                      z.style.display = "block";
                  }
              }
              function myFunction1(){
                  var x = document.getElementById("myInput");
                  var y = document.getElementById("hide3");
                  var z = document.getElementById("hide4");
                  
                  if(x.type === 'password'){
                      x.type = "text";
                      y.style.display = "block";
                      z.style.display = "none";
                  }
                  else{
                      x.type = "password";
                      y.style.display = "none";
                      z.style.display = "block";
                  }
              }
              function myFunction2(){
                  var x = document.getElementById("loginpass");
                  var y = document.getElementById("hide5");
                  var z = document.getElementById("hide6");
                  
                  if(x.type === 'password'){
                      x.type = "text";
                      y.style.display = "block";
                      z.style.display = "none";
                  }
                  else{
                      x.type = "password";
                      y.style.display = "none";
                      z.style.display = "block";
                  }
              }
              
              </script>

              <script src="../assets/js/jquery-3.5.1.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.matchHeight.min.js"></script>
    <script src="../assets/js/main.js"></script>
    <!--  Chart js -->
    <script src="../assets/js/Chart.bundle.min.js"></script>
    <!--Flot Chart-->
    <script src="../assets/js/jquery.flot.min.js"></script>
    <script src="../assets/js/jquery.flot.spline.min.js"></script>
    <!-- local -->
    <script src="../assets/js/widgets.js"></script>
</body>
</html>
