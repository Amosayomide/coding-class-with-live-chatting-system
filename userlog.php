<?php
	include 'db.php';
	if (isset($_POST["submit"])) {
		$username = $_POST["username"];
		$password = md5($_POST["password"]);

		$query = mysqli_query($con, "SELECT * FROM students WHERE username='$username' AND password='$password' ") or die();
		if (!$row = mysqli_fetch_assoc($query)) {
			$message = "<p style='box-shadow: 1px 1px 4px 1px red;text-align: center;padding: 5px;color: green;'>Username or Password not found</p>";
		}else{
			$message = "<p style='box-shadow: 1px 1px 4px 1px green;text-align: center;padding: 5px;color: green;'>Username found</p>";
			session_start();
			$username = $row["username"];
			$user_id = $row["id"];
			$_SESSION["user_id"] = $user_id;
			date_default_timezone_set("Africa/Lagos");
			$time = date("h:i:sa");
			$_SESSION["user"] = $username;
			$query2 = mysqli_query($con, "SELECT * FROM session WHERE user_id='$user_id'") or die();
			if (!$row2 = mysqli_fetch_assoc($query2)) {
				mysqli_query($con, "INSERT INTO session(user_id, username, time) VALUES('$user_id', '$username', '$time') ") or die();
			}
			echo "<script>window.location.href='index.php'</script>";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="reg"> 
	<h3>User Login</h3>
	<?php
		if (isset($_POST["submit"])) {
			echo $message;
		}
	?>
	<form method="post" action="">
		<p>Username:
			<input type="text" name="username" placeholder="Enter your username">
		</p>
		<p>
			Password:
			<input type="password" name="password" placeholder="Enter your password">
		</p>
		<input type="submit" name="submit" value="Login">
	</form>
	<p>
		If not registered <a href="userreg.php">Register</a>
	</p>
	<div class="footer" style="padding: 20px;text-align: center;">
		Copyright &copy; 2019 <a href="index.php">Coding Class v1.0</a> | <a href="https://www.facebook.com/biggidroid" target="_blank">BiggiDroid Platform</a> - <a href="adminlog.php">Admin</a>
	</div>
	</div>

</body>
</html>