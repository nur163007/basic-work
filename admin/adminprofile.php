
<?php
session_start(); 
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
        <?php
         @include('includes/stylesheet.php');
        ?>
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
                                    <li class="active">Admin Profile</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.breadcrumbs-->
        <!-- Content -->
        <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="card col-lg-8 col-12 offset-lg-2">
                <div class="card-header">
                    <h3>Admin Profile</h3>
                </div>
                <div class="card-body bg-light">
                <table>
						 
                         <?php

             $servername = "localhost";
             $username = "root";
             $password = "";
             $dbname = "tourism";
             
             $conn= new mysqli($servername, $username, $password,$dbname);
             $error="";
             if ($conn->connect_error) {
                 die("Connection failed: " . $conn->connect_error);
             } 
                   $username=$_SESSION['username'];
                   $sql ="select * from admin where username='$username'";
                   $query_run= mysqli_query($conn,$sql);
                   while($row = mysqli_fetch_assoc($query_run)) {

             ?>	
             <tbody>
              <tr>
                <td><span class="float-left">Name</span> <span class="float-right">: <?php echo  $row["name"]?></span></td>
              </tr>
              <tr>
                <td><span class="float-left">Phone no</span><span class="float-right">: <?php echo  $row["phone"]?></span></td>
              </tr>
              <tr>
                <td><span class="float-left">Address </span><span class="float-right">:<?php echo  $row["address"]?></span></td>
              </tr>
              <tr>
                <td><span class="float-left">Email</span><span class="float-right">: <?php echo  $row["username"]?></span></td>
              </tr>
            </tbody>
            
            <?php
                   }
                   ?>
                                      </table> 
                </div>
                <!-- @include('admin.includes.message') -->

            </div>

            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
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
    <?php
         @include('includes/styleJs.php');
    ?>
</body>
</html>
