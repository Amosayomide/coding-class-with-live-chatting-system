<?php
include "include/header.php";
?>
	

			<h1 class="title">
				<a style="text-decoration: none;color: white;" href="index.php">BiggiDroid Social</a>
		   </h1>
						<?php
			if (isset($_SESSION["user"])) {
				?>
					<center><small class="name" style="float: none;"><i class="fa fa-user"></i>
				<?php
				echo $_SESSION["user"];
			
			 ?> <?php
					$user_id = $_SESSION["user_id"];
					$result1 = mysqli_query($con, "SELECT * FROM session WHERE user_id='$user_id' ") or die();
						$result = mysqli_fetch_assoc($result1);
				 ?> <a href="logout.php?user_id=<?php echo $result['user_id']; ?>" style="color: black; margin-left: 5px;"><i class="fa fa-sign-out"></i></a></small></center><?php } else{
			 	?>
			 	<?php
			 } ?>
	<iframe src="online.php" class="chatbox" style="	width: 100%;
		    height: 600px;
		    border: none;
		    box-sizing: border-box;
		    clear: both;margin-top: 20px;"></iframe>
	<?php include 'include/footer.php'; ?>