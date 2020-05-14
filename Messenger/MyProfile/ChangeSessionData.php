<?php

		session_start();

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
		$id = $_SESSION["id"];

		$sql = "SELECT * FROM signup where id='$id'";
		$result = $conn->query($sql);
			// output data of each row
			$row = $result->fetch_assoc();

			$_SESSION["id"] = $row["id"];
			$_SESSION["email"] = $row["email"];
			$_SESSION["name"] = $row["name"];
			$_SESSION["username"] = $row["username"];
			$_SESSION["image"] = $row["image"];
			$_SESSION["gender"] = $row["gender"];
			$_SESSION["dob"] = $row["dob"];
			$_SESSION["password"] = $row["password"];

			header('location: EditPro.php');

?>