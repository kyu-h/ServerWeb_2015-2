<!DOCTYPE HTML> 
<html>
<head>
<link href="jobfair.css" type="text/css" rel="stylesheet" />
</head>
 <body>
 <?php 
 
 $nameErr = $emailErr= $overlapErr= "";
 //에러 문자열 
 $name = $email = "";
 $file = "";
 //txt 파일 안에 있는 문자열 받아주기
 
 $myfile = fopen("list.txt", "r+") or die("Unable to open file!");
	//파일 오픈
		$file = fread($myfile,filesize("list.txt"));
			//파일 안에 있는 문자열을 읽어서 file변수에 저장
		$x = strpos($file,$_POST["name"]);
		//file이 가지고 있는 문자열중 name과 같은 문자가 있으면 문자열 위치 반환
		// 없다면 false 반환
		fclose($myfile); //파일 닫기
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["name"]) || empty($_POST["email"]) ) {
		//이름이나 이메일이 비어있다면
       $nameErr = "sorry";
	   echo "<h1>Sorry</h1>";
	   echo "You didn't fill out the form completely.";
	   echo "<a href ='/1394036/jobfair.html'>Try again?</a>","<br><br>";
      }
	  else if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$_POST["email"])){
	  //이메일의 형식이 잘못되였다면
	  $emailErr = "Invalid email format"; 
	   echo "<h1>Sorry</h1>";
	   echo "You didn't provide a e-mail address.";
	   echo "<a href ='/1394036/jobfair.html'>Try again?</a>","<br><br>";
	  } 
	  else if($x != false){
		//같은 이름이 이미 등록되어 있다면
		$overlapErr = "sorry";
		 echo "<h1>Sorry</h1>";
	   echo "You are already registered.";
	   echo "<a href ='/1394036/jobfair.html'>Try again?</a>","<br><br>";
	 }
	  else{
		echo "<h1>Thanks,Job Seeker!</h1>";
 
		echo "You successfully reserved a seat! See you then ^.^","<br>";
		echo "<b> Name : </b> ", $_POST["name"], "<br>";
		echo "<b> E-mail : </b> ", $_POST["email"], "<br>";
		echo "<b> Field of interest : </b> ", $_POST["interest"], "<br>";
		echo "<b> Gender : </b> ", $_POST["gender"], "<br>";
		echo "<hr><br>";
		echo "<b>Current reservation list</b>","<br>";
		$myfile = fopen("list.txt", "a") or die("Unable to open file!");
		//파일오픈
		$txt = $_POST["name"]; 
		fwrite($myfile, $txt);
		$txt = "  :";
		fwrite($myfile, $txt);
		$txt = $_POST["email"];
		fwrite($myfile, $txt);
		$txt = "  :";
		fwrite($myfile, $txt);
		$txt = $_POST["interest"];
		fwrite($myfile, $txt);
		$txt = "  :";
		fwrite($myfile, $txt);
		$txt = $_POST["gender"];
		fwrite($myfile, $txt);	
		$txt = "\n";
		fwrite($myfile, $txt);	
		fclose($myfile); //파일 닫기
		$myfile = fopen("list.txt", "r") or die("Unable to open file!"); 
		while(!feof($myfile)) { // list파일에 있는 문자열을 한줄씩 끝까지 읽어오기
			echo fgets($myfile) . "<br>";
		} 
		fclose($myfile);
	
	}
 }
 
 
 ?>
 
</body>
</html>