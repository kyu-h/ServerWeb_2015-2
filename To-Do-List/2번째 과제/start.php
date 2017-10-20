
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
			<p>
				The best way to manage your tasks. <br />
				Never forget What-To-Do again!
			</p>

			<p>
				Log in now to manage your to-do list. <br />
				If you do not have an account, one will be created for you.
			</p>

			<form id="loginform" action="login.php" method="post">
				<div><input name="name" type="text" size="8" autofocus="autofocus" /> <strong>User Name</strong></div>
				<div><input name="password" type="password" size="8" /> <strong>Password</strong></div>
				<input type="submit" name="action" value="Log in" />
				<input type="submit" name="action" value="Sign up" />
			</form>
			
		
		</div>

		<div class="headfoot">
			<p>
				<q>Remember What-To-Do is nice, but it's a total copy of another site "Remember the Milk".</q> - PCWorld<br />
				All pages and content &copy; Copyright What-To-Do Inc.
			</p>
		</div>
	</body>
</html>
