
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php include('dbsignup.php') ?>

	<link href="css/SignUp.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" media="all">
		</style>

		<div id="login-box">
<form method="post" action="signup.php">
	<?php include('errors.php'); ?>
  <div class="left">
    <h1>Sign up</h1>
    <input type="text" name="phone" placeholder="Phone Number" value="<?php echo $phone; ?>" required />
    <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>" required />
    <input type="text" name="email" placeholder="E-mail" value="<?php echo $email; ?>" required />
    <input type="password" name="password" placeholder="Password" required />
    <input type="password" name="password2" placeholder="Retype password" required />
    
  <button type="submit" name="signup" class="regibtn" >Sign Up </button>
   </div>
  </form>
  <div class="right">
    <span class="loginwith">Sign Up with<br />social network</span>
    
    <button class="social-signin facebook" onclick="window.location.href='https://www.facebook.com/login'">Log in with facebook </a> </button>
    <button class="social-signin twitter" onclick="window.location.href='https://www.twitter.com/login'">Log in with Twitter</button>
    <button class="social-signin google" onclick="window.location.href='https://accounts.google.com/Login'" >Log in with Google</button>
     <button class="SignUp" onclick="window.location.href='LogIn.php'" >Already Signed Up! </button>
  </div>
  <div class="or">OR</div>
</div>


</body>
</html>