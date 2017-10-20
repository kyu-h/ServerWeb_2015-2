<!DOCTYPE html>
<?php
session_start();

$con = mysqli_connect("localhost","root","123123","users_db");

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($_POST['username'])) {
        echo "<script> alert('Please enter your name!')</script>";
        }
    if (empty($_POST['password'])) {
        echo "<script> alert('Please enter your password!')</script>";
        }
    
    $query = "SELECT username, password FROM users WHERE username='$username' AND password='$password' ";
    $result = mysqli_query($con,$query);
    
    if ( mysqli_num_rows($result) > 0 ) {
            $_SESSION['login']=$username;
            header("Location: sers.php");
    } else {
		echo $result;
        echo "Wrong username or password !".$result;
    }

}
?>
<html>
<head>
    <title> Admin Page </title>
</head>
<body>
<center>
    <form method="post" action="admin.php">
    <table border="2" >
        <tr>
            <td colspan="2" align="center"> <b>Admin Login</b> </td>
        </tr>
        <tr>
            <td align="center"> <b>Admin Name </b></td>
            <td> <input type="text" name="username" > </td>
        </tr>
        <tr>
            <td align="center"> <b>Admin Password</b> </td>
            <td> <input type="password" name="password" > </td>
        </tr>
        <tr>
            <td colspan="2" align="center"> 
            <input type="submit" name="submit" value="Admin Login" > </td>
        </tr>
        </table>
    </form>
</center>
</body>
</html>