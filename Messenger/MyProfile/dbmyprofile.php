<?php
session_start();
// initializing variables
$username = "";
$email    = "";
$phone="";
$name="";
$password="";
$dob="";
$image="";
$gender="";
//session_start();
$conn = mysqli_connect('localhost', 'root', '', 'messenger');

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    $username = $_POST["username"];
    $pass = $_POST["password"];

    $sql = "SELECT * FROM signup where usernamer='$username' and password='$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      $row = $result->fetch_assoc();
      $_SESSION["id"] = $row["id"];
      $_SESSION["email"] = $row["email"];
      $email=$_SESSION["email"];
      $_SESSION["name"] = $row["name"];
      $_SESSION["username"] = $row["username"];
      $_SESSION["image"] = $row["image"];
      $_SESSION["gender"] = $row["gender"];
      $_SESSION["dob"] = $row["dob"];
      $_SESSION["password"] = $row["password"];
      header('location: viewpro.php');
    } else {
      header('location: Login.php');
    }
}



?>