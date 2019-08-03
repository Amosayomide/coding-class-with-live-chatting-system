		<?php
		include 'db.php';
			session_start();
			if (!isset($_SESSION["teacher"])) {
		header("location: ../userlog.php");
	}
				if (isset($_POST["send"])) {
					
				$students_id = $_POST["students_id"];
				$user_table = $_POST["table"];
				$students2_id = $_GET["user_id"];
				$students_msg = $_POST["students_msg"];
				$time = $_POST["time"];
				$chatid = $_POST["chat_id"];

		     $query = mysqli_query($con, "INSERT INTO ".$user_table."(students_id, students2_id, students_msg, time, chatid) VALUES('$students_id', '$students2_id', '$students_msg', '$time', '$chatid') ") or die("Error with request");
		     	if ($query) {
		     	$user_id = $_SESSION["teacher_id"].$_GET["user_id"];
		     	$read2 = "New messge!";
		     	mysqli_query($con, "UPDATE teacher_msg SET read2='$read2' WHERE chatid='$user_id' ") or die("Error with noti");
		     }
				}
				
			?>

<!DOCTYPE html>
<html>
<head>
	<title>Codedeyo Platform</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<style type="text/css">
		.float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:70px;
	left:40px;
	background-color:blueviolet;
	color:#FFF;
	border-radius:50px;
	text-align:center;
  font-size:15px;
	box-shadow: 2px 2px 3px #999;
  z-index:100;
}

.my-float{
	margin-top:16px;
}
	</style>
</head>
<body style="padding: 0px;margin: 0px;margin-bottom: 10px;">
<!-- Communication -->
	<?php
		

	

	?>
	<div class="chat">

		<!-- Partner user screen -->
		<?php
			$chat = $_GET["user_id"];
			$chatquery = mysqli_query($con, "SELECT * FROM students WHERE id='$chat' ") or die("No connection");
			$chatresult = mysqli_fetch_assoc($chatquery);
			?>

			<p style="text-align: left;padding: 10px;margin-bottom: 0px;background: black;padding: 6px;box-shadow: 1px 1px 4px 1px black;margin: 0px;margin: 0px;
    margin-bottom: 0px;
margin-bottom: 5px;
font-weight: bold;
font-size: 20px;"><small><?php echo $chatresult["username"]; ?><?php
					$chat = $_GET["user_id"];
					$result1 = mysqli_query($con, "SELECT * FROM session WHERE user_id='$chat' ") or die();
						$result = mysqli_fetch_assoc($result1);
							if ($result == 0) { ?>

								<span style="font-size: 10px;">Offline</span></small></p>
							
					<?php	}else{ ?>
							<br>
							<span style="color: lightblue;font-size: 10px;">Online</span></small><small style="float: right;margin-top: -10px;"><a href="javascript:void;" onclick="window.history.go(-1);" style="text-decoration: none;color: white;">Back</a></small></p>
				<?php	}		
				 ?> 
		<!-- Partner user screen end --> 

		<div class="upchat" style="box-shadow: 10px 10px 10px 10px lightblue;margin-bottom: 20px;"> 
				<!-- Chat result start here -->
		<iframe style="width: 100%;
height: 385px;
border: none;
scroll-behavior: smooth;" src="chat2.php?user_id=<?php echo $_GET['user_id']; ?>"></iframe>
		<!-- Chat result ends here -->
	
		<form method="post" action="" class="message">
			<input type="hidden" name="table" value="<?php echo $_SESSION['teacher'].'_msg'; ?>">
			<input type="hidden" name="students_id" value="<?php echo $_SESSION['teacher_id']; ?>">
			<?php
					$user_id = $_GET["user_id"];
					$result1 = mysqli_query($con, "SELECT * FROM session WHERE user_id='$chat' ") or die();
						$result = mysqli_fetch_assoc($result1);
				 ?>
			<input type="hidden" name="time" value="<?php echo $result['time']; ?>">
			<input type="hidden" name="chat_id" value="<?php echo $_SESSION['teacher_id'].$result['user_id']; ?>">
			<input style="padding: 6px;" type="text" name="students_msg" class="input" placeholder="Enter your message">
			<button class="Send" name="send">Send</button>
		</form>
		</div>
	
	</div>

</body>
</html>