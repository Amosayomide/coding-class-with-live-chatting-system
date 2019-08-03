	<?php 
		session_start();
		if (!isset($_SESSION["user"])) {
		header("location: userlog.php");
	}
	$con = mysqli_connect("localhost", "root", "", "class") or die();
			$id = $_GET['user_id'].$_SESSION['user_id'];
			$result1 = mysqli_query($con, "SELECT * FROM screen WHERE screen_id=2928 ") or die();
			$result = mysqli_fetch_assoc($result1);
			echo $result["screen"];
	?>