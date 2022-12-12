<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Next Journey</title>
	<link rel="stylesheet" type="text/css" href="CSS/regstyle.css">
</head>
<body>
	<div class="header">
		<h2>Announcements</h2>
	</div>
	<div class="content">
		<p><h1>Thank you for registering.</h1></p><br>
		<p><h3>We are delighted to be joined by you in our next journey! We will email you the details of our next destination and timings as soon as possible. Stay ready!</h3></p><br><br>
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<?php  if (isset($_SESSION['username'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
			<p> <a href="index.php?logout='1'" style="color: red;">Logout</a> </p>
			<p><a href="home.html">Home</a></p>
		<?php endif ?>
	</div>
		
</body>
</html>