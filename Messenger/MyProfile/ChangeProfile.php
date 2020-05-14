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
		$id= $_SESSION["id"];

		$image= $_FILES["fileToUpload"]["name"];
		$target= "img/".basename($image);

		$sql = "UPDATE user_info SET image='$image' WHERE id='$id'";
		move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target);

		if (mysqli_query($conn, $sql)) {
			$_SESSION["image"] = $image;
			header('location: ChangeProfile.php');
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}



		mysqli_close($conn);
}


?>


<!DOCTYPE html>
<html>

<head>

	<title>xCompany</title>
	<link rel="stylesheet" type="text/css" href="ChangeProfile.css">

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

		<fieldset class="f1">
		  <legend>Registration</legend>
		  <img src="img/<?php echo $_SESSION["image"]; ?>" id="pc">
		  <form action="ChangeProfile.php" method="post" enctype="multipart/form-data">
		  	<input type="file" name="fileToUpload" id="fileToUpload"><br><br>
		  	<input type="submit">
		  </form>
		  
		</fieldset>

		<p class="copyright">Copyright &copy; 2017<p>

	</section>
</body>
</html>
