<?php
session_start();
$con=mysqli_connect("localhost","root","123123","users_db");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
//echo $id;
echo $_GET['id'];
$id = $_GET['id'];
//echo $_SESSION['id'];
mysqli_query($con,"DELETE FROM users WHERE id='$id'");

mysqli_close($con);
header("Location: sers.php");
?>
