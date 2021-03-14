<?php
session_start();
include ('../assets/dbConnect.php');
if(isset($_POST['submit'])){
	 $myusername = $_POST['username'];
      $mypassword = $_POST['password'];
	  $sql =("SELECT * FROM admin WHERE username = '$myusername' and password = '$mypassword' limit 1");
	  $result = $conn->query($sql);
	  
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
	$_SESSION['username']=$myusername;
        $_SESSION['password']=$mypassword;
        $_SESSION['id'];
        header("location: ../admin/dashboard.php");
    }
} else {
         $error = "Your Username or Password is invalid";
      }
}
$conn->close();
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Tourism</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
  </head>
  <body>
      
  <div class="login-div">
     <form action="" method="post">
      <div class="logo"></div>
      <div class="title">Tourism</div>
      <div class="sub-title">Time to Travel</div>
      <div style = "font-size:12px; color:red; margin-top:15px" align="center"><?php echo $error; ?></div>
		<div class="fields">
          <div class="username"><img src="../image/username.png" alt="">
              <input type="username" name="username" class="user-input" placeholder="Enter Username"required>
          </div>
          <div class="password"><img src="../image/password.jpg" alt="">
              <input type="password" name="password" class="user-input" placeholder="Enter Password"required>
          </div>
          
      </div>
      <input type="submit" class="sign-in" name="submit"value="Login">
      <div class="link">
          <a href="#" class="forgot">Forgot Password?</a> or <a href="signup.php" class="signup">Signup</a>
      </div>
      </form>
      
      <div class="link">
          <a href="index.php" class="forgot">Home</a> | Login
      </div>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>