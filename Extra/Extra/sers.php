<?php
session_start();
if(!isset($_SESSION['login'])){
		header("Location: admin.php");
		}
	$con=mysqli_connect("localhost","root","123123","users_db");
	if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$result = mysqli_query($con,"SELECT * FROM users");
?>
<html>
<head>
	<title>Content Page</title>
	<style>
	table th{
    background-color: yellow;
    }
	table td{
	  text-align: center;
	}
	</style>
</head>
<body style="font-family:verdana">

	<center>
	<h1>All Users</h1>
	<br>
	<b><a href="logout.php"> logout </a></b>
	<?php 
	echo "<table border='1'>
	<tr>
	<th>ID</th>
	<th>Username</th>
	<th>Password</th>
	<th>E-mail</th>
	<th>delete</th>
	</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
   echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['username'] . "</td>";
  echo "<td>" . $row['password'] . "</td>";
  echo "<td>" . $row['email'] . "</td>";
  ?>
	<td> <a href="delete.php?id=<?php echo $row['id']?>"> delete </a></td>
  <?php
  echo "</tr>";
  }
echo "</table>";

mysqli_close($con);
	?>
	</center>
</body>
</html>