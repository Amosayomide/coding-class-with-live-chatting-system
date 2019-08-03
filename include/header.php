<?php
	session_start();
	include './db.php';
	if (!isset($_SESSION["user"])) {
		header("location: userlog.php");
	}
	
	if (isset($_POST["submit"])) {
		$id = $_SESSION["user_id"];
		$html = $_POST["html"];
	    $query = mysqli_query($con, "UPDATE students SET html='$html' WHERE id='$id' ");
	}
	
			$id = $_SESSION["user_id"];
			$result1 = mysqli_query($con, "SELECT * FROM students WHERE id='$id' ") or die();
			$result = mysqli_fetch_assoc($result1);	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Codedeyo Platform</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
</head>
<body>