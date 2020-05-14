<?php

//session_start();

?>
<?php include 'C:\xampp\htdocs\Messenger\dbsignup.php';
?>


<!DOCTYPE html>
<html>

<head>

	<title>Messenger</title>
	<link rel="stylesheet" type="text/css" href="EditPro.css">
	<style type="text/css">
		#pc {
			float: left;
			margin-left: 200px;
		}
		#sec {
			float: left;
		}

	</style>
</head>

<body>
		<div style="background-image: url('C:/xampp/htdocs/Messenger/images/login_background.jpg');">


	<section class="sec-index">
	
		<img src="" alt="Messenger" class="logo-img">

		<div class="right-float">

			<p>Logged in as <u><?php  

			//echo $_SESSION["name"];

			if(isset($_SESSION['username'])) 
				echo $_SESSION['username'];
			?></u> | <a href="Login.php"><u>Logout</u></a></p>

		</div>

		<h3>Welcome to Messenger</h3>

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

		<fieldset>
		  <legend>Edit Profile</legend>
			 <div id="sec">
			  <p>Name : <?php 
			  if(isset($_SESSION['name'])) 
			  echo $_SESSION["name"] ;?></p>
			  <p>Email : <?php 
			  if(isset($_SESSION['email'])) 
			  echo $_SESSION["email"] ;?></p>
			  <p>Gender : <?php 
			  if(isset($_SESSION['gender'])) 
			  echo $_SESSION["gender"] ;?></p>
			  <p>DOB : <?php
			  if(isset($_SESSION['dob'])) 
			   echo $_SESSION["dob"] ;?></p>
			  
			</div>
			<img src="<?php echo $_SESSION["image"];?>" width="200px" height="200px" id="pc">
		</fieldset>

	</section>
</body>
</html>
