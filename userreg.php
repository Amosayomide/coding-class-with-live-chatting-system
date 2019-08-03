<?php

	include 'db.php';

	if (isset($_POST["submit"])) {
		$username = $_POST["username"];
		$email = $_POST["email"];
		$number = $_POST["number"];
		$html = "<p>Edit this code</p>";
		$password = md5($_POST["password"]);
		$sql = "CREATE TABLE ".$username."(
			    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
			    students_id VARCHAR(30) NOT NULL,
			    students2_id VARCHAR(30) NOT NULL,
			    students_msg VARCHAR(70) NOT NULL,
			    time VARCHAR(70) NOT NULL,
			    chatid VARCHAR(70) NOT NULL,
			    read2 VARCHAR(70) NOT NULL
			)";
		$base = mysqli_query($con,$sql) or die("ERROR: Could not connect. " . mysqli_connect_error());
		$query = mysqli_query($con, "INSERT INTO students(number, username, password, email, html) VALUES('$number', '$username', '$password', '$email', '$html') ") or die("ERROR: Could not connect. " . mysqli_connect_error());
		if ($query) {

			$message = "<p style='box-shadow: 1px 1px 4px 1px lightblue;text-align: center;padding: 5px;color: green;'>Registration completed <span><a href='userlog.php' style='background:lightseagreen;color: white;padding: 2px;
padding-right: 2px;padding-left: 2px;padding-left: 5px;padding-right: 5px;'>Login</a></span></p>";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>User Registration</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="reg"> 
	<h3>User Registration</h3>
	<?php
		if (isset($_POST["submit"])) {
			echo $message;
		}
	?>
	<form method="post" action="">
		<p>Username:
			<input type="text" name="username" placeholder="Enter desired username">
		</p>
		<p>
			Email:
			<input type="email" name="email" placeholder="Enter email address">
		</p>
		<p>
			Phone:
			<input type="number" name="number" placeholder="Enter mobile number">
		</p>
		<p>
			Password:
			<input type="password" name="password" placeholder="Enter desired password">
		</p>
		<input type="submit" name="submit" value="Register">
	</form>
	<p>
		If already registered <a href="userlog.php">Login</a>
	</p>
	<div class="footer" style="padding: 20px;text-align: center;">
		Copyright &copy; 2019 <a href="index.php">Coding Class v1.0</a> | <a href="https://www.facebook.com/biggidroid" target="_blank">BiggiDroid Platform</a> - <a href="adminlog.php">Admin</a>
	</div>
	</div>
</body>
</html>