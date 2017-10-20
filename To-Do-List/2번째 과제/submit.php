 <?php
 session_start();
		$item="";
		$todoErr="";
		 $name = $_SESSION["login"];
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if(($_POST["action"])=="add"){
			
			$file = 'todolist'.$name.'.txt';
			$list = "\n".$_POST["item"];
			
			file_put_contents($file, $list,FILE_APPEND | LOCK_EX);
			}
			else{
			$x = $_SESSION["x2"];
			$a = $_POST["line"];
			//echo $a;
			//echo "<br>";
			//var_dump($x);
			//echo "<br>";
			array_splice($x,$a,1);
			//var_dump($x);
			$myfile = fopen("todolist".$name.".txt", "w") or die("Unable to open file!");
			$txt = $x;
			fwrite($myfile,implode("\n",$txt));
			fclose($myfile);
		    }
		}
		//session_destroy();
		header("Location: todolist.php");
?>