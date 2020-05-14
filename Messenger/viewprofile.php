<?php

session_start();
// initializing variables
$username = $_SESSION['username'];
$email    = "";
$phone= "";
$name="";
$password="";
$dob="";
$image="";
$gender="";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'messenger');

$query = "select * from signup where username = '$username'";
  	$result = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($result);
				$phone=$user['phone'];
				$dob=$user['dob'];
				$gender=$user['gender'];
				$image=$user['image'];
				$email  = $user['email'];
				$aboutme= $user['aboutme'];
				$image=$user['image'];
				
					
		

?>









<!DOCTYPE html>
<html>
<head>
	<title>View Profile</title>
	<link href="css/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" media="all">
		</style>
					<script src="js/jquery-3.4.1.js" type="text/javascript"></script>

		<script type="text/javascript">
				$(document).ready(function(){

				$('#plus').mouseover(function(){
				
				$('#profile-img-click').show();


			});

			$('#plus').mouseout(function(){
				
				$('#profile-img-click').hide();

			});
			$('#profile-img-click').mouseover(function(){
				
				$(this).show();

			});

			$('#profile-img-click').mouseout(function(){
				
				$(this).hide();

			});

			$('#view-profile-click').click(function(){
				window.location.replace('both.php');

			});
			$('#setting-click').click(function(){
				window.location.replace('setting.php');

			});
			$('#log-out-click').click(function(){
				window.location.replace('login.php');

			});
		});
			</script>
</head>
<body>
<div class="WelcomeCom">
	<h1>Welcome To Our Community</h1>
	<br>
	<h1>It's <?php echo $username; ?> Details</h1>
	<div id="plus">
	<img src="images/plus.png" align="right" height="40px" width="40px" >
</div>
</div>
	<div id="profile-img-click">
		<ul id="profile-img-click-ul">
			<li id="view-profile-click">Main Page</li>
			<li id="setting-click">Setting</li>
			<li id="log-out-click">Log Out</li>
		</ul>
	</div>
	<div>
					          <img src='<?php echo $image; ?>' class="viewimg" width='270px' height='200px' float='right' align="right"/>         

		<ul class="viewDetails">
			<h1><li>Name: <?php echo $username; ?> </li>
			<li>Username: <?php echo $username; ?></li>
			<li>Email: <?php echo  $email; ?></li>
			<li>Gender: <?php echo $gender; ?></li>
			<li>Dob: <?php echo $dob; ?></li>
			<li class="aboutme">Your Status: <?php echo $aboutme; ?>  </li></h1>


		</ul>
	</div>
</body>
</html>
