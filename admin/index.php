<?php
	session_start();
	include 'db.php';
		if (!isset($_SESSION["teacher"])) {
		header("location: ../userlog.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Codedeyo Platform</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<script type="text/javascript">
		setTimeout(function(){
   window.location.reload(1);
}, 5000);
	</script>
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
	<!--Online users -->
	<div class="reg">
		<h3 style="background: blueviolet;padding: 10px;color: white;">Active Students</h3>
		<h5 style="text-align: center;">Share screen with</h5>
	<div class="online">
			<?php
				if (isset($_SESSION["teacher"])) {
					$query = mysqli_query($con, "SELECT * FROM session ORDER BY id DESC");
					if (mysqli_num_rows($query) == 0) {
						echo "<code style='color:red;text-decoration:underline;font-weight:bold;'>No user online yet! Happy coding</code>";
					}
					while ($row = mysqli_fetch_assoc($query)) 
							{
					?>
							<a style="text-decoration: none;color: white;" href="board.php?user_id=<?php echo $row['user_id']; ?>"><p style="margin: 0px;
background: linear-gradient(blueviolet, #000);
padding: 10px;
width: 100%;
margin-bottom:6px;
width: 90%;
color: white;"><?php echo $row["username"]; ?> <img src="image/online.png" style="height: 10px;"> <br><small style="color: lightblue;">since: <?php echo $row["time"]; ?></small>
<?php
	$query2 = mysqli_query($con, "SELECT * FROM ".$row['username']." WHERE chatid='".$row['user_id']."1' ") or die();
	$row2 = mysqli_fetch_assoc($query2);
 ?>	<small style="float: right;color: chartreuse;
"><?php echo $row2["read2"]; ?>
</small></p></a>
<?php } ?>
						<?php	

				}

			?>
	</div>
	</div>
<div class="footer" style="padding: 20px;text-align: center;">
		Copyright &copy; 2019 <a href="index.php">Coding Class v1.0</a> | <a href="https://www.facebook.com/biggidroid" target="_blank">BiggiDroid Platform</a> - <a href="adminlog.php">Admin</a>
	</div>
	
</body>
</html>