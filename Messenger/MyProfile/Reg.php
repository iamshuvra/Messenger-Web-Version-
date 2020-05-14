<?php

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

		$em = $_POST["email"];
		$pass = $_POST["psw"];
		$username = $_POST["username"];
		$name = $_POST["name"];
		$dob= $_POST["dob1"]."/".$_POST["dob2"]."/".$_POST["dob3"];
		$gender = $_POST["gender"];

		$sql = "INSERT INTO user_info (name, email, username, password,  gender, dob) VALUES ('$name', '$em', '$username','$pass','$gender','$dob')";

		if (mysqli_query($conn, $sql)) {
			header('location: Login.php');
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		mysqli_close($conn);
}



?>










<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="Reg.css">
</head>
<body>
<section class="sec-index">
  
    <img src="Capture.PNG" alt="xCompany" class="logo-img">

    <div class="right-float">

      <p><a href="Home.php"><u>Home</u></a> | <a href="Login.php"><u>Login</u></a> | <a href="Reg.php"><u>Registration</u></a>

    </div>

  </section>


<fieldset class="f1">
  <legend>Registration</legend>
  <form action="Reg.php" method="POST">
  <div class="container">

    <label><b>Name </b></label>
    <input type="text" placeholder="Enter Name" name="name" required class="rd1"><br><br>

    <label><b>Email </b></label>
    <input type="email" placeholder="Enter Email" name="email" required class="rd1"><br><br>

    <label><b>Username </b></label>
    <input type="text" placeholder="Enter Username" name="username" required class="rd1"><br><br>

    <label><b>Password  </b></label>
    <input type="password" placeholder="Enter Password" name="psw" required class="rd1"><br><br>

    <label><b>Confirm Password </b></label>
    <input type="password" placeholder="Enter Confirm Password" name="psw" required class="rd1"><br><br>

    <fieldset>
      <legend>Gender</legend>
        <input type="radio" value="male" name="gender">Male
        <input type="radio" value="female" name="gender">Female
        <input type="radio" value="other" name="gender">Other
    </fieldset>
    <br>
    <fieldset>
      <legend>Date Of Birth</legend>
        <input type="text" class="dob" name="dob1">/
        <input type="text" class="dob" name="dob2">/
        <input type="text" class="dob" name="dob3">(dd/mm/yy)
    </fieldset>
    <br><br>
    <input type="submit">
    <input type="reset">
  </div>

  
</form>
</fieldset>


<p class="copyright">Copyright &copy; 2017<p>
</body>
</html>