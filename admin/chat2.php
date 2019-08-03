<?php
include 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Codedeyo Platform</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<style type="text/css">
	</style>
	<script type="text/javascript">
		setTimeout(function(){
   window.location.reload(1);
}, 5000);
	</script>
</head>
<body>
<!-- Communication -->
	<?php
		session_start();
	if (!isset($_SESSION["teacher"])) {
		header("location: userlog.php");
	}

	?>
	
	<div class="chat">
		<!-- Current Session here -->
		
		<?php
		$user = $_SESSION['teacher']."_msg";
		$chat = $_SESSION['teacher_id'].$_GET['user_id'];
		$query = mysqli_query($con, "SELECT * FROM ".$user." WHERE chatid='$chat' ORDER BY id ASC") or die();
		while ($row = mysqli_fetch_assoc($query)) {  ?>
		<p class="student">
			<?php echo $row["students_msg"]."<small style='float: right;color: white;display:block;'>".$row["time"]."</small>"; ?>
		</p>
			<?php
		}
		$user = $_SESSION['teacher']."_msg";
		$chat = $_SESSION['teacher_id'].$_GET['user_id'];
		$query = mysqli_query($con, "SELECT * FROM ".$user." WHERE chatid='$chat' ORDER BY id ASC") or die();
		if (!$row = mysqli_fetch_assoc($query)) {
			echo "<p style='background: rgba(0, 0, 0, 0.59) none repeat scroll 0% 0%;
border-radius: 5px;
padding: 5px;
text-align: center;
box-shadow: 1px 2px 2px 5px rgba(0, 0, 0, 0.59);
margin-top: 100px;'>Start a new chat</p>";
		}
		?>
		
		<!-- Current Session ends here -->

		<!-- Get id start here -->
			<?php
		$chat = $_GET["user_id"];
			$chatquery = mysqli_query($con, "SELECT * FROM students WHERE id='$chat' ") or die("No connection");
			$chatresult = mysqli_fetch_assoc($chatquery);

		$user = $chatresult["username"];
		$session = $_GET['user_id'].$_SESSION['teacher_id'];
		$query = mysqli_query($con, "SELECT * FROM ".$user." WHERE chatid='$session' ORDER BY id ASC") or die();
		while ($row = mysqli_fetch_assoc($query)) {  ?>
		<p class="teacher">
			<?php echo $row["students_msg"]."<small style='float: right;
color: black;display:block;'>".$row["time"]."</small>"; ?>
		</p>
			<?php
		}

		?>
		<!-- Get id start here -->
	</div>
</body>
</html>