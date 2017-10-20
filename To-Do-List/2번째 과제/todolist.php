<?php
session_start();
if(!isset($_SESSION["login"])){
	header("Location: start.php");
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Remember What-To-Do</title>
		<link href="todolist.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
	<div class="headfoot">
			<h1>
				<img src="cow.gif" alt="logo" />
				Remember<br /> What-To-Do
			</h1>
		</div>

		<div id="main">
			<h2>
				<?=$_SESSION["login"]?>'s To-Do List
			</h2>
			
			<?php
			 $name = $_SESSION["login"];
			$myfile = fopen("todolist".$name.".txt", "a+") or die("Unable to open file!");
			$file = fread($myfile,filesize("todolist".$name.".txt")); 
			$x = explode("\n",$file);
			$_SESSION["x2"]= $x;
			
			$x = $_SESSION["x2"];
			
			
			
			$arrlength=count($x);
			?>
			<ul id="todolist">
			<?php for($i=1;$i<$arrlength;$i++){ ?>
			<li>
			<form action="submit.php" method="post">
			<?php echo $x[$i];?><input type="hidden" name="action" value="delete" />
			<input type="hidden" name="line" value="<?php echo $i;?>" />
			<input type="submit" name="submit" value="delete" />
			</form>
			</li>
			<?php
			
			} 
			fclose($myfile);
			?>
			<li>			
			<form action="submit.php" method="post">
			<input type="hidden" name="action" value="add" />
			<input name="item" type="text" size="25" autofocus="autofocus" />
			<input type="submit" value="add" />
			</form></li>
			
			
			<b><a href="logout.php">logout </a></b>
			<?php
			$d=mktime(11, 14, 54, 8, 12, 2014);
			echo "<i>(logged in since " . date("Y-m-d h:i:sa", $d).")</i>";
			?>
		</div>
		
		<div class="headfoot">
			<p>
				<q>Remember What-To-Do is nice, but it's a total copy of another site "Remember the Milk".</q> - PCWorld<br />
				All pages and content &copy; Copyright What-To-Do Inc.
			</p>
		</div>
	</body>
</html>