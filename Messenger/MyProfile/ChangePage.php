
<?php

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "xcompany";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$np = $_POST["np"];
		$curp = $_POST["curp"];
		$id= $_SESSION["id"];


		$sql = "SELECT * FROM user_info where password='$curp' and id='$id'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
			$sql = "UPDATE user_info SET password='$np' WHERE id='$id'";

			if (mysqli_query($conn, $sql)) {
			    header('location: ChangePage.php');
			}

		    $_SESSION["password"] = $np;
		    
		} else {
		    echo "Wrong Password";
		}

}



?>















<!DOCTYPE html>
<html>

<head>

	<title>xCompany</title>
	<link rel="stylesheet" type="text/css" href="ChangePage.css">

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

		<fieldset>
		  <legend>Edit Profile</legend>
		  <form action="ChangePage.php" method="post">
		  <div class="container">

		  	<label for="email"><b>Current Password :</b></label>
		    <input type="password" placeholder="Enter password" name="curp" required class="rd1"><br><br>
		    <label for="email"><b>New Password :</b></label>
		    <input type="password" placeholder="Enter password" name="np" required class="rd1"><br><br>
		    <label for="email"><b>Re-type Password :</b></label>
		    <input type="password" placeholder="Enter password" name="rnp" required class="rd1"><br><br>
		    <div class="registerbtn">
		      <input type="submit" >
		  </div>
		  </div>

		  
		</form>
		</fieldset>

		<p class="copyright">Copyright &copy; 2017<p>

	</section>
</body>
</html>
