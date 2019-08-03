<?php
	session_start();
	include 'db.php';
		if (!isset($_SESSION["user"])) {
		header("location: userlog.php");
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
	<!--Online users -->
	<div class="reg" style="margin-top: 0px;width: 100%;">
		<h3 style="background: blueviolet;padding: 10px;color: white;">Active User</h3>
		<h5 style="text-align: center;">Chat with</h5>
	<div class="online">
			<?php
				if (isset($_SESSION["user"])) {
					$query = mysqli_query($con, "SELECT * FROM session ORDER BY id DESC");
					if (mysqli_num_rows($query) == 0) {
						echo "<code style='color:red;text-decoration:underline;font-weight:bold;'>No user online yet! Happy coding</code>";
					}
					while ($row = mysqli_fetch_assoc($query)) 
							{
					?>
							<a style="text-decoration: none;color: white;" href="chat.php?user_id=<?php echo $row['user_id']; ?>"><p style="margin: 0px;
background: linear-gradient(blueviolet, #000);
padding: 10px;
width: 100%;
margin-bottom:6px;
width: 90%;
color: white;"><?php echo $row["username"]; ?> <img src="image/online.png" style="height: 10px;"> <br><small style="color: lightblue;">since: <?php echo $row["time"]; ?></small>
<?php
	$query2 = mysqli_query($con, "SELECT * FROM ".$row['username']." WHERE chatid='".$row['user_id'].$_SESSION['user_id']."' ") or die();
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

	
</body>
</html>