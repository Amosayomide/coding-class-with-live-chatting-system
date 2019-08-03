<?php
	session_start();
	include 'db.php';
	$user_id = $_GET["user_id"];
	mysqli_query($con, "DELETE FROM session WHERE user_id='$user_id' ") or die("Error connecting");
	session_destroy();
	header("location: index.php");

?>