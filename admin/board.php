<?php
	session_start();
	include 'db.php';
	if (!isset($_SESSION["teacher"])) {
		header("location: ../adminlog.php");
	}
	$user_id = $_GET["user_id"];
	$result1 = mysqli_query($con, "SELECT * FROM students WHERE id='$user_id' ") or die();
	$result = mysqli_fetch_assoc($result1);
	$user = $result["username"];
	$read2 = "";
	$chatid = $_GET["user_id"].$_SESSION["teacher_id"];
	mysqli_query($con, "UPDATE ".$user." SET read2='$read2' WHERE chatid='$chatid' ") or die("Error with noti");

	if (isset($_POST["submit"])) {
		$user_id = $_GET["user_id"];
		$html = $_POST["html"];
	    $query = mysqli_query($con, "UPDATE students SET html='$html' WHERE id='$user_id' ");
	}
	
			$user_id = $_GET["user_id"];
			$result1 = mysqli_query($con, "SELECT * FROM students WHERE id='$user_id' ") or die();
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

				<?php
			if (isset($_SESSION["teacher"])) {
				?>
					<small class="name"><i class="fa fa-user"></i>
				<?php
				echo $_SESSION["teacher"];
			
			 ?> <?php
					$user_id = $_SESSION["teacher_id"];
					$result1 = mysqli_query($con, "SELECT * FROM session_teacher WHERE user_id='$user_id' ") or die();
						$result = mysqli_fetch_assoc($result1);
				 ?> <a href="logout.php?user_id=<?php echo $result['user_id']; ?>" style="color: black; margin-left: 5px;"><i class="fa fa-sign-out"></i></a></small><?php } else{
			 	?>
			 	<?php
			 } ?>

			<h1 class="title"><a style="text-decoration: none;color: white
			" href="index.php">BiggiDroid Coding Class</a></h1>
	<div class="p1">
	<h3>Edit HTML Code Here</h3>
	<?php
		$user_id = $_GET["user_id"];
		$result1 = mysqli_query($con, "SELECT * FROM students WHERE id='$user_id' ") or die();
			$result = mysqli_fetch_assoc($result1);
	 ?>
	<form method="post" action="">
		<textarea class="html" name="html"><?php 
			echo $result["html"];
		 ?></textarea><br>
		<center>
			<button name="submit" class="button">Run Code</button>
		</center>
	</form>
	</div>
	<!-- Result -->
	<div class="p2">
		<h3>HTML Code Result</h3>
		<iframe class="result" src="result.php?user_id=<?php echo $_GET['user_id']; ?>"></iframe>
	</div>
	<iframe src="chat.php?user_id=<?php echo $_GET['user_id']; ?>" class="chatbox" style="	width: 100%;
		    height: 600px;
		    border: none;
		    box-sizing: border-box;
		    clear: both;margin-top: 20px;"></iframe>
	<div class="footer" style="padding: 20px;text-align: center;">
		Copyright &copy; 2019 <a href="index.php">Coding Class v1.0</a> | <a href="https://www.facebook.com/biggidroid" target="_blank">BiggiDroid Platform</a> - <a href="adminlog.php">Admin</a>
	</div>
</body>
</html>