<?php
include ('../assets/dbConnect.php');

if(isset($_POST['submit'])){
     $myname = $_POST['name'];
     $mymobile = $_POST['phone'];
     $myaddress = $_POST['address'];
	   $myusername = $_POST['username'];
     $mypassword = $_POST['password'];
     
     
      $emailquery="select * from admin where username='$myusername'";
      $equery=mysqli_query($conn,$emailquery);
      $emailcount=mysqli_num_rows($equery);
      
      if($emailcount>0){
        $error = "This data already exists";
      }
      else{
	  $sql ="INSERT INTO admin (name, phone,address,username,password) VALUES ('$myname', '$mymobile','$myaddress','$myusername', '$mypassword')";
  
if($conn->query($sql) === TRUE){
$error = "Successfully Registered";
}
else{
    $error = "Something Error to Register";
}
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
      <div class="signup-title">Tourism</div>
      <div class="sub-title">Time to Travel</div>
      <div style = "font-size:12px; color:red; margin-top:10px" align="center"><?php echo $error; ?></div>
		
      <div class="fields-signup">
          <div class="name"><img src="../image/name.png" alt="">
              <input type="text" name="name" class="user-input" placeholder="Enter your name"required>
          </div>
          <div class="phone"><img src="../image/phone.png" alt="">
              <input type="telephone" name="phone" class="user-input" placeholder="Enter your phone no"required>
          </div>

          <div class="address"><img src="../image/address.png" alt="">
              <input type="text" name="address" class="user-input" placeholder="Enter your address"required>
          </div>
          <div class="s-username"><img src="../image/username.png" alt="">
              <input type="username" name="username" class="user-input" placeholder="Enter email/username"required>
          </div>
          <div class="s-password"><img src="../image/password.jpg" alt="">
              <input type="password" name="password" class="user-input" placeholder="Enter Password"required>
          </div>
          
      </div>
      <input type="submit" class="sign-in" name="submit"value="Signup">
      <div class="link">
          Have an account? <a href="login.php" class="signup">Login</a>
      </div>
      </form>
      		 
      <div class="link">
          <a href="index.php" class="forgot">Home</a> | Signup
      </div>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>