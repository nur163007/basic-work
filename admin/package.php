
<?php 
include ('../assets/dbConnect.php');
if(isset($_POST['submit'])){
$pname = $_POST['package_name'];
$ptype = $_POST['package_type'];
$pdays = $_POST['no_of_days'];
$pnight = $_POST['no_of_nights'];
$pcost = $_POST['package_cost'];
$photel = $_POST['package_hotel'];
$pinclude = $_POST['package_include'];
$pdescription = $_POST['package_description'];
$targetDir = "../uploaded_image/";
$image = $_FILES['files']['name'];
$fileName = implode(",",$image);

if(!empty($image)){
    foreach($image as $key => $val){
        $targetFilePath = $targetDir.$val;
        move_uploaded_file($_FILES['files']['tmp_name'][$key],$targetFilePath);  
    }
  $sql ="INSERT INTO packages (package_name,package_type,no_of_days,no_of_nights,package_cost,package_hotel,package_include,package_description,package_image) VALUES ('$pname', '$ptype','$pdays','$pnight', '$pcost','$photel','$pinclude','$pdescription','$fileName')";
  $res = mysqli_query($conn,$sql);
  if($res === TRUE){
    $error = "Successfully inserted data";
  }
  else{
     $error =  "Something Error to insert";
  }

}
else{
   $error =  "fill the all fields";
}
}
?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <?php
    include('includes/stylesheet.php');
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

                            <li><i class="fa fa-id-card-o"></i><a href="#">Add Images</a></li>
                            <li><i class="fa fa-exclamation-triangle"></i><a href="#">Add Itinerary</a></li>
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
                                    <li><a href="#">Home</a></li>
                                    <li class="active">Packages</li>
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
                <div class="card">
                    <div class="card-header">
                        <h3>Create Package</h3>
                    </div>

                    <!-- @include('admin.includes.message') -->
                     <div style = "font-size:18px; color:red; margin-top:15px" align="center"><?php echo $error; ?></div>
        
                    <div class="card-body">
                        <form method="POST" action="" enctype="multipart/form-data" id="form">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="package_name">Package Name</label>
                                    <input class="form-control" type="text" name="package_name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="package_type">Package Type</label>
                                    <input class="form-control" type="text" name="package_type"required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="no_of_days">Total Days</label>
                                    <input class="form-control" type="text" name="no_of_days"required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="no_of_nights">Total Nights</label>
                                    <input class="form-control" type="text" name="no_of_nights"required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="package_cost">Package Cost</label>
                                    <input class="form-control" type="text" name="package_cost"required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="package_hotel">Package Hotel</label>
                                    <input class="form-control" type="text" name="package_hotel"required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="package_include">Package Includes</label>
                                    <textarea rows="3" cols="15"class="form-control" type="text" name="package_include"required></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="package_description">Package Description</label>
                                    <textarea rows="3" cols="15"class="form-control" type="text" name="package_description"required></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="package_image">Package Images</label>
                                    <input class="form-control-file" type="file" name="files[]"required multiple>
                                </div>
                            </div>
                            <input class="btn btn-success" type="submit" name="submit"value="submit">
                        </form>
                    </div>
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
    include('includes/styleJs.php');
    ?>
</body>
</html>
