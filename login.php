<?php
include("includes/config.php");
if(isset($_POST['login']))
  {
      // Getting username/ email and password
      $uname=$_POST['email'];
      $password=$_POST['password'];

      // Fetch data from database on the basis of username/email and password
      $sql =mysqli_query($conn,"SELECT email,password FROM user WHERE (email='$uname')");
    
 $num=mysqli_fetch_array($sql);

//  print_r($num);
//  die;
if($num>0)
{
$hashpassword=$num['password']; // Hashed password fething from database

// echo $haspassword;
// echo $password;
// die;
//verifying Password
if ($hashpassword==$password) {

	echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
  } else {
    echo "<script>alert('Wrong Password');</script>";
 
  }
}
//if username or email not found in database
else{
echo "<script>alert('User not registered ');</script>";
  }
 
}
?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Login Form | CodingLab</title> -->
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  </head>
  <body>
    <div class="container">
      <div class="wrapper">
        <div class="title"><span>Login Form</span></div>
        <form action="#" method="post">
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" name="email" placeholder="Email or Phone" required>
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Password" required>
          </div>
          <div class="pass"><a href="#">Forgot password?</a></div>
          <div class="row button">
            <input type="submit" name="login" value="Login">
          </div>
          <div class="signup-link">Not a member? <a href="#">Signup now</a></div>
        </form>
      </div>
    </div>

  </body>
</html>
