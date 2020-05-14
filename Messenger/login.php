<?php

include('database_connection.php');
session_start();

$message = '';
/*
if(isset($_SESSION['user_id']))
{
	header('location:main.php');
} */

if(isset($_POST['login_user']))
{
	$query = "
		SELECT * FROM signup 
  		WHERE username = :username
	";
	$statement = $connect->prepare($query);
	$statement->execute(
		array(
			':username' => $_POST["username"]
		)
	);	

	$count = $statement->rowCount();
	if($count > 0)
	{
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			if(($_POST["password"]== $row["password"]))
			{
				$_SESSION['user_id'] = $row['user_id'];
				$_SESSION['username'] = $row['username'];
				$sub_query = "
				INSERT INTO login_details 
	     		(user_id) 
	     		VALUES ('".$row['user_id']."')
				";
				$statement = $connect->prepare($sub_query);
				$statement->execute();
				$_SESSION['login_details_id'] = $connect->lastInsertId();
				header('location:both.php');
			}
			else
			{
					echo  '<script> alert("Wrong Password");</script>';
			}
		}
	}
	else
	{
					echo  '<script> alert("Wrong Username");</script>';
	}
}


?>

<!DOCTYPE html>
<html>
<head>
  <title>Messenger Web login</title>
</head>
<body>
<link href="css/login.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" media="all">
		</style>


<form method="post" action="">

    <div id="login-box">
      <div class="left">
    <h1>Log In</h1>
    <input type="text" name="username" placeholder="Username or Phone Number" />
    <input type="password" name="password" placeholder="Password" />    
      <button type="submit" class="regibtn" name="login_user">Login</button>

  </div>
  
</form>







  <div class="right">
    <span class="loginwith">Log in with<br />social network</span>
    
    <button class="social-signin facebook" onclick="window.location.href='https://www.facebook.com/login'">Log in with facebook </a></button>
    <button class="social-signin twitter" onclick="window.location.href='https://www.twitter.com/login'">Log in with Twitter</button>
    <button class="social-signin google" onclick="window.location.href='https://accounts.google.com/Login'" >Log in with Google</button>
    <form>
         <button type="submit" formaction="signup.php" class="signupbtn2">Haven't Signed Up!</button>
      </form>


  </div>
  <div class="or">OR</div>
</div>
</form>
</body>
</html>