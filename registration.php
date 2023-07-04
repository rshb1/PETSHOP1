<?php
// Include config file
require_once "includes/config.php";
error_reporting(0);

//check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['submit'])){

$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

  $sql = "INSERT INTO user (name, email,password) VALUES ( '$name', '$email', '$password')";

if (mysqli_query($conn, $sql)) {
    echo '<script>alert("Registration successful")</script>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
mysqli_close($conn);
?>



<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<title> Registration or Sign Up form in HTML CSS | CodingLab </title>-->
    <link rel="stylesheet" href="css/xenonstack.css">
   </head>
<body>
  <div class="wrapper">
    <h2>Registration</h2>
    <form action="#" method="post" >
      <div class="input-box">
        <input type="text" placeholder="Enter your name" name="name" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Enter your email" name="email" required>
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder="Create password" required>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Confirm password" required>
      </div>

      <div class="input-box button">
        <input type="Submit" name="submit" value="Register Now">
      </div>
      <div class="text">
        <h3>Already have an account? <a href="login.php">Login now</a></h3>
      </div>
    </form>
  </div>
</body>
</html>
