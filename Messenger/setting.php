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
				$name= $user['name'];
				
					

if (isset($_POST['editbtn'])) {
  // receive all input values from the form
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
   $email = mysqli_real_escape_string($db, $_POST['email']);
  $dob = mysqli_real_escape_string($db, $_POST['dob']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $aboutme = mysqli_real_escape_string($db, $_POST['aboutme']);
  $cnt=0;
   $user_check_query = "SELECT * FROM signup WHERE  email='$email' OR phone='$phone' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  if ($user) { 
    if ($user['phone'] == $phone) {
      echo '<label>"Phone Number already exists" <label/>';
      $cnt++;
    }
    if ($user['email'] == $email) {
      echo '<label>"Email already exists" <label/>';
      $cnt++;
    }
  }
  if(cnt==0){
  $query = "UPDATE signup SET phone='$phone', email='$email',dob='$dob', gender='$gender', aboutme='$aboutme' WHERE username='$username'";
  	mysqli_query($db, $query);
  	 $_SESSION['success'] = "You are now up-to-date";
  	
  	header("location:viewprofile.php");
  	exit();
  }
  else
  {
  	echo '<label> "input correctly"</label>';
  }

}

if (isset($_POST['passbtn'])) {
  // receive all input values from the form
  $Currentpass = mysqli_real_escape_string($db, $_POST['Currentpass']);
   $newpass = mysqli_real_escape_string($db, $_POST['newpass']);
  $newoass2 = mysqli_real_escape_string($db, $_POST['newpass2']);
  
  if($newpass==$newpass2){
  $query = "UPDATE signup SET password='$newpass' WHERE username='$username'";
  	mysqli_query($db, $query);
  	 $_SESSION['success'] = "You are now up-to-date";
  	
  	header("location:setting.php");
  }
  else{
  	  	echo '<label> "input correctly"</label>';

  }


}

/*
if(isset($_POST["imgbtn"])) {
echo '<script> alert("hi"); </script>';

$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileimg"]["name"]);
echo "string";
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
else
{
$sql = "UPDATE signup SET image= '$image' WHERE username= '$username'";
mysqli_query($db,$sql);
echo '<script> alert('.$sql.'); </script>';
if ($db->query($sql) === TRUE) {
    echo "New record created successfully";
    header("location:setting.php");
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}
 
$filepath = "images/" . $_FILES["fileimg"]["name"];

if(move_uploaded_file($_FILES["fileimg"]["name"], $filepath)) 
{
echo "<img src=".$filepath." height=200 width=300 />";
} 
else 
{
echo "Error !!";
}
}
} */


		
?>

<?php
/*
$host = "localhost"; 
$user = "root"; 
$dbname = "chat";  */

$con = mysqli_connect('localhost', 'root', '', 'messenger');
//$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['but_upload'])){
 
  $name = $_FILES['file']['name'];
  $target_dir = "upload/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){
 
     // Insert record
    // $query = "insert into images(name) values('".$name."')";
	$im = "upload/".$name;
	 $query="UPDATE signup
SET image='".$im."'
WHERE  username='$username'";
     mysqli_query($con,$query);
  
     // Upload file
     move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);

  }
 
}
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

			//edit profile js

			$('#ep').mouseover(function(){
				
				$('#showde').show();
    			document.getElementById("ep").style.backgroundColor = "red";

			});


			$('#ep').mouseout(function(){
				
				$('#showde').hide();
				 document.getElementById("ep").style.backgroundColor = "cadetblue";


			});
			$('#showde').mouseover(function(){
				
				$(this).show();
				$('#cp').hide();
				$('#cpp').hide();
				$('#cea').hide();


			});

			$('#showde').mouseout(function(){
				
				$(this).hide();
				$('#cp').show();
				$('#cpp').show();
				$('#cea').show();

			});
			//change password setting

			$('#cp').mouseover(function(){
				
				$('#settingpass').show();
				document.getElementById("cp").style.backgroundColor = "red";


			});

			$('#cp').mouseout(function(){
				
				$('#settingpass').hide();
				 document.getElementById("cp").style.backgroundColor = "cadetblue";


			});
			$('#settingpass').mouseover(function(){
				
				$(this).show();
				$('#ep').hide();
				$('#cpp').hide();
				$('#cea').hide();

			});

			$('#settingpass').mouseout(function(){
				
				$(this).hide();
				$('#ep').show();
				$('#cpp').show();
				$('#cea').show();

			});

			///image setting
			$('#cpp').mouseover(function(){
				
				$('#settingimg').show();
				document.getElementById("cpp").style.backgroundColor = "red";


			});

			$('#cpp').mouseout(function(){
				
				$('#settingimg').hide();
				 document.getElementById("cpp").style.backgroundColor = "cadetblue";


			});
			$('#settingimg').mouseover(function(){
				
				$(this).show();
				$('#ep').hide();
				$('#cp').hide();
				$('#cea').hide();

			});

			$('#settingimg').mouseout(function(){
				
				$(this).hide();
				$('#ep').show();
				$('#cp').show();
				$('#cea').show();

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
	<h1>Edit <?php echo $username; ?>'s Details</h1>
	<div id="plus">
	<img src="images/plus.png" align="right" height="40px" width="40px" >
</div>
</div>

<div class="settinga">
	<table cellspacing="0px"><tr>
			<h1><td id="ep">Edit Profile  </td>
			<td id="cp">Change Password</td>
			<td id="cpp">Change Profile Picture</td>
			<td id="cea">Change Email Address</td>
			</h1></tr></table>

</div>

	<div id="profile-img-click">
		<ul id="profile-img-click-ul">
			<li id="view-profile-click">Main Page</li>
			<li id="setting-click">Setting</li>
			<li id="log-out-click">Log Out</li>
		</ul>
	</div>
	<div>
		<form method="post">
		<ul class="ShowDetails" id="showde">
			<h1><li>Name: <input type="text" name="name" value="<?php echo $name; ?>"  class="settingdetails">
			 </li>
			<li>Phone: <input type="text" name="phone" value="<?php echo $phone; ?>" class="settingdetails"></li>
			<li>Email: <input type="email" name="email" value="<?php echo  $email; ?>" class="settingdetails"></li>
			<li>Gender: <input type="text" name="gender" value="<?php echo $gender;  ?>" class="settingdetails"></li>
			<li>Dob: <input type="date" name="dob" value="<?php echo $dob; ?>" class="settingdetails"></li>
			<li>Your Status: <input type="text" name="aboutme" value=" <?php echo $aboutme; ?>" class="aboutme"> </li>

			<button type="submit" name="editbtn" value="Confirm" id="editbtn" class="btn"> Confirm </button> </form>

		</h1> </ul>

		</form>
	</div>

	<div>
		<form method="post"><h1><ul id="settingpass">
			<li>Current Password: <br> <input type="password" name="Currentpass" class="settingdetails"></li>
			<li>New Password: <br> <input type="password" name="newpass" class="settingdetails"></li>
			<li>Confirm New Password: <br> <input type="password" name="newoass2" class="settingdetails"></li>
			<button type="button" name="passbtn" value="Confirm" id="passbtn" class="btn"> Confirm </button> </form>

		</ul></h1>
			</div></form>
			
	<div id="settingimg">
		
		

<form method="post" action="" enctype='multipart/form-data'>
<h1>
<ul>
					<li>Choose Your File: 
					<br>
  <input type='file' name='file' />
  </li>
				</ul></h1><br>
  <input type='submit' value='upload' name='but_upload' class='btn'>
</form>
<?php

$sql = "select image from signup
WHERE  username='$username'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);

$image = $row['image'];
//////
$image_src = $image;
//$image_src = "upload/".$image;

?>
<img src='<?php echo $image_src;  ?>' height="300" width="300">
  
	</div>
</body>
</html>




<?php


?>