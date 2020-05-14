 <link href="css/SignUp.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" media="all">
		</style> 
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
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'messenger');

// REGISTER USER
if (isset($_POST['signup'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $password2 = mysqli_real_escape_string($db, $_POST['password2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($phone)) { array_push($errors, "Phone Number is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
  if ($password != $password2) {
	array_push($errors, "The two passwords do not match");
  }

  $user_check_query = "SELECT * FROM signup WHERE username='$username' OR email='$email' OR phone='$phone' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['username'] == $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['phone'] == $phone) {
      array_push($errors, "phone number already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	 //$password = md5($password);//encrypt the password before saving in the database

  	$query = "INSERT INTO signup (phone,username, email, password, dob,image,name,gender) 
  			  VALUES('$phone', '$username', '$email', '$password','no date ','images/user.png',' no name','no gender')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now signed up";

  	header('location: login.php');
  }
 // session_destroy();
}
//session_start();
//login
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }
  if (count($errors) == 0) {
  	//$password = md5($password);
  	$query = "SELECT * FROM SignUp WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
   /* $_SESSION["id"] = $row["id"];
    echo  $_SESSION["id"];
      $_SESSION["email"] = $row["email"];
      $_SESSION["name"] = $row["name"];
      $_SESSION["username"] = $row["username"];
      $_SESSION["image"] = $row["image"];
      $_SESSION["gender"] = $row["gender"];
      $_SESSION["dob"] = $row["dob"];
      $_SESSION["password"] = $row["password"]; */
  	if (mysqli_num_rows($results)==1) {
  	  $_SESSION['username'] = $username;
      $_SESSION['id'] = $id;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: main.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>


<?php 
  if ($errors && count($errors) > 0) :  ?>
  <div class="error">
    <p><?php  foreach ($errors as $error) : 
     echo $error ; ?> </p>
    <?php endforeach ?>
  </div>
<?php  endif  ?>