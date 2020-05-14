<?php

session_start();



?>


<!DOCTYPE html>
<html>

<head>

	<title>xCompany</title>
	<link rel="stylesheet" type="text/css" href="LoginDas.css">

</head>

<body>

	<section class="sec-index">
	
		<img src="Capture.PNG" alt="xCompany" class="logo-img">

		<div class="right-float">

			<p>Logged in as <u><?php   echo $_SESSION["name"]; ?></u> | <a href="Login.php"><u>Logout</u></a></p>

		</div>

		<h3>Welcome to xCompany</h3>

		<div class="account">
			
			<p><strong>Account</strong></p>
			
			<ul>

				<li><a href=""><u>Dashboard</u></a></li>
				<li><a href="viewpro.php"><u>View Profile</u></a></li>
				<li><a href="EditPro.php"><u>Edit Profile</u><a/></li>
				<li><a href="ChangeProfile.php"><u>Change Profile Picture</u></a></li>
				<li><a href="ChangePage.php"><u>Change Password</u></a></li>
				<li><a href="Login.php"><u>Logout</u></a></li>

			</ul>

		</div>

		<div class="vertical-line"></div>

		<div class="welcome-name">
			
			<p>Welcome  <?php   echo $_SESSION["name"]; ?></p>

		</div>

		<p class="copyright">Copyright &copy; 2017<p>

	</section>
</body>
</html>
