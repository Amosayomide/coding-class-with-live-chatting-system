<?php
	session_start();
	if (!isset($_SESSION["user"])) {
		header("location: userlog.php");
	}
	$con = mysqli_connect("localhost", "root", "", "class") or die();
	
	if (isset($_POST["submit"])) {
		$screen_id2 = $_GET['user_id'].$_SESSION['user_id'];
		$screen_id = $_POST["screen_id"];
		$html = $_POST["html"];
	    $query = mysqli_query($con, "UPDATE screen SET screen='$html', screen_id='$screen_id' WHERE screen_id='$screen_id' ") or die();
	}
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
			if (isset($_SESSION["user"])) {
				?>
					<small class="name"><i class="fa fa-user"></i>
				<?php
				echo $_SESSION["user"];
			
			 ?> <?php
					$user_id = $_SESSION["user_id"];
					$result1 = mysqli_query($con, "SELECT * FROM session WHERE user_id='$user_id' ") or die();
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

		$screen_id = $_GET["user_id"].$_SESSION["user_id"];
			$result1 = mysqli_query($con, "SELECT * FROM screen WHERE screen_id='$screen_id' ") or die();
			$result = mysqli_fetch_assoc($result1);	
	 ?>
	<form method="post" action="">
		<input type="hidden" name="screen_id" value="<?php echo $_GET['user_id'].$_SESSION['user_id']; ?>">
		<textarea class="html" name="html"><?php 
			echo $result["screen"];
		 ?></textarea><br>
		<center>
			<button name="submit" class="button">Run Code</button>
		</center>
	</form>
	</div>
	<!-- Result -->
	<div class="p2">
		<h3>HTML Code Result</h3>
		<div class="result">
			<!DOCTYPE html>
			<html>
			<head>
				<title>Codedeyo</title>
			</head>
			<body>
				<?php
					$con = mysqli_connect("localhost", "root", "", "class") or die();
			$id = $_GET['user_id'].$_SESSION['user_id'];
			$result1 = mysqli_query($con, "SELECT * FROM screen WHERE screen_id='$id' ") or die();
			$result = mysqli_fetch_assoc($result1);
			echo $result["screen"];
	?>
			</body>
			</html>
		</div>
	</div>
	<div class="chat" style="background: url('image/wallpaper.png');">
		<!-- Current Session here -->
		
		<?php
		$chat = $_GET['user_id'].$_SESSION['user_id'];
		$query = mysqli_query($con, "SELECT * FROM screen WHERE screen_id='$chat' ORDER BY id ASC") or die();
		while ($row = mysqli_fetch_assoc($query)) {  ?>
		<p class="student">
			<?php echo $row["screen_chat"]; ?>
		</p>
		<p class="teacher">
			<?php echo $row["screen_chat2"]; ?>
		</p>
			<?php
		}
		$chat = $_GET['user_id'].$_SESSION['user_id'];
		$query = mysqli_query($con, "SELECT * FROM screen WHERE screen_id='$chat' ORDER BY id ASC") or die();
		if (!$row = mysqli_fetch_assoc($query)) {
			echo "<p style='background: rgba(0, 0, 0, 0.59) none repeat scroll 0% 0%;
border-radius: 5px;
padding: 5px;
text-align: center;
box-shadow: 1px 2px 2px 5px rgba(0, 0, 0, 0.59);
margin-top: 100px;'>Start a new chat</p>";
		}
		?>
		<?php
		if (isset($_POST["send"])) {
				$chat = $_GET['user_id'].$_SESSION['user_id'];
			$query = mysqli_query($con, "SELECT * FROM screen WHERE screen_id='$chat' ") or die();
		    if (!$row = mysqli_fetch_assoc($query)) {
		    	$screen_id = $_POST["screen_id"];
				$screen_id2 = $_GET['user_id'].$_SESSION['user_id'];
				$screen_chat = $_POST["screen_chat"];
		    	 $query = mysqli_query($con, "INSERT INTO screen(screen_id, screen_chat) VALUES('$screen_id', '$screen_chat') ") or die("Error with request");
		    }else{
		    	$screen_id = $_POST["screen_id"];
				$screen_chat = $_POST["screen_chat"];
				$query = mysqli_query($con, "UPDATE screen SET screen_chat='$screen_chat' WHERE screen_id='$screen_id' ") or die();
		    }
		}

		?>
		
		<!-- Current Session ends here -->
	<form method="post" action="" class="message">
			<input type="text" name="screen_id" value="<?php echo $_SESSION['user_id'].$_GET['user_id']; ?>">
			<input style="padding: 6px;" type="text" name="screen_chat" class="input" placeholder="Enter your message">
			<button class="Send" name="send">Send</button>
		</form>
	
		<!-- Get id start here -->
	</div>
	<div class="footer" style="padding: 20px;text-align: center;">
		Copyright &copy; 2019 <a href="index.php">Coding Class</a> | <a href="https://www.facebook.com/biggidroid" target="_blank">BiggiDroid Platform</a> - <a href="adminlog.php">Admin</a>
	</div>
</body>
</html>