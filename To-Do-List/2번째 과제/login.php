<!DOCTYPE html>
<html>
	<body>
<?php
// This is the login.php file\
if(!isset($_POST["name"]) || $_POST["password"] == ""){
die("Error : missing required parameters !!! ");
}
$user = $_POST["name"];
$pass= $_POST["password"];
$granted = false;
$userfile = "users.txt";
if(($_POST["action"])=="Log in"){
	$users = explode("\n", file_get_contents($userfile));
	foreach ($users as $each ){
		$info = explode(":", $each);
		if( $user == trim($info[0]) && $pass == trim($info[1])){
			$granted = true ;
			break;
		}
	}
}
else{
	$myfile = fopen("users.txt", "a") or die("Unable to open file!");
	$txt = $user;
	fwrite($myfile, $txt);
	$txt = ":";
	fwrite($myfile, $txt);
	$txt = $pass;
	fwrite($myfile, $txt);
	$txt = "\n";
	fwrite($myfile, $txt);
	fclose($myfile);
}
 session_start();
 
 if($granted ){
 $_SESSION["login"] = $user ;
 header("Location: todolist.php");
 
 }
 else {
 header("Location: start.php");
 }


?>
</body>
</html>