	<?php 
		session_start();
		include 'db.php';
		if (!isset($_SESSION["teacher"])) {
		header("location: ../userlog.php");
	}
			$id = $_GET["user_id"];
			$result1 = mysqli_query($con, "SELECT * FROM students WHERE id='$id' ") or die();
			$result = mysqli_fetch_assoc($result1);
			echo $result["html"];
	?>