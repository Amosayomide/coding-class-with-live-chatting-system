<?php
	if (isset($_POST["submit"])) {
		$con = mysqli_connect("localhost", "root", "", "class") or die();
		$username = $_POST["username"];
		$password = md5($_POST["password"]);

		$query = mysqli_query($con, "SELECT * FROM teacher WHERE username='$username' AND password='$password' ") or die();
		if (!$row = mysqli_fetch_assoc($query)) {
			$message = "<p style='box-shadow: 1px 1px 4px 1px red;text-align: center;padding: 5px;color: green;'>Username or Password not found</p>";
		}else{
			$message = "<p style='box-shadow: 1px 1px 4px 1px green;text-align: center;padding: 5px;color: green;'>Username found</p>";
			session_start();
			$username = $row["username"];
			$user_id = $row["id"];
			$_SESSION["teacher_id"] = $user_id;
			date_default_timezone_set("Africa/Lagos");
			$time = date("h:i:sa");
			$_SESSION["teacher"] = $username;
			$query2 = mysqli_query($con, "SELECT * FROM session_teacher WHERE user_id='$user_id'") or die();
			if (!$row2 = mysqli_fetch_assoc($query2)) {
				mysqli_query($con, "INSERT INTO session_teacher(user_id, username, time) VALUES('$user_id', '$username', '$time') ") or die();
			}
			else{
			echo "<script>window.location.href='admin/'</script>";
		}

	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="reg"> 
	<h3>Admin Login</h3>
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
	</div>
</body>
</html>