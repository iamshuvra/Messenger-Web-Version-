<link href="C:\xampp\htdocs\Messenger\css\signup.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" media="all">
		</style> 
<?php
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
	include_once 'C:\xampp\htdocs\Messenger\dbsignup.php';
		echo "done";

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "messenger";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$email = $_POST["email"];
		$name = $_POST["name"];
		$dob= $_POST["dob"];
		$gender = $_POST["gender"];
		$id= $_SESSION["id"];

		$sql = "UPDATE signup SET name='$name', email='$email', gender='$gender', dob='$dob' WHERE id='$id'";
		echo $id;
		echo $name;
		if (mysqli_query($conn, $sql)) {
			header('location: ChangeSessionData.php');
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		//mysqli_close($conn);
}

?>
<?php //echo $id; ?>


<!DOCTYPE html>
<html>

<head>

	<title>Messenger</title>
	<link rel="stylesheet" type="text/css" href="EditPro.css">

</head>

<body>

	<section class="sec-index">
	
		<img src="" alt="Messenger" class="logo-img">

		<div class="right-float">

			<p>Logged in as <u><?php   echo $_SESSION["username"]; ?></u> | <a href="Login.php"><u>Logout</u></a></p>

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
		  <form action="EditPro.php" method="POST">
		  <div class="container">

		  	<label><b>Name :</b></label>
		    <input type="text" value="<?php echo $_SESSION["name"];?>" name="name"  class="rd1"><br><br>
		    <label><b>Email :</b></label>
		    <input type="text" value="<?php echo $_SESSION["email"];?>" name="email" class="rd1"><br><br>

		    <div class="gen">
		    	<label id="g"><b>Gender  :</b></label>
			    <input type="radio" name="gender" class="rd" <?php if($_SESSION["gender"]=="male") echo "checked";?> value="male">male
			    <input type="radio" name="gender" class="rd" <?php if($_SESSION["gender"]=="female") echo "checked";?> value="female">female
			    <input type="radio" name="gender" class="rd" <?php if($_SESSION["gender"]=="other") echo "checked";?> value="other">other
		    </div><br>
		    <label for="email"><b>DOB :</b></label>
		    <input type="text" value="<?php echo $_SESSION["dob"];?>" name="dob" class="rd1"><br><br>
		    <div class="registerbtn">
		      <input type="submit" >
		  </div>
		  </div>

		  
		</form>
		</fieldset>


	</section>
</body>
</html>
