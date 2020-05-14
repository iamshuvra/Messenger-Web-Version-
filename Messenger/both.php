<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Community Web Application</title>
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
				window.location.replace('viewprofile.php');

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
	<h1>Hello <?php echo $_SESSION['username']; ?> <br> Welcome To Our Community</h1>
	<div id="plus">
		<img src="images/plus.png" align="right" height="40px" width="40px" >

	</div>
    </div>
	<form method="post" class="chatorfaq">    

      <button type="submit" class="faqbtn" name="qna" formaction="faq.php">Ask some questions or Give Answer</button><br><br>
        <div class="or">OR</div>
        </script>

<div id="profile-img-click">
		<ul id="profile-img-click-ul">
			<li id="view-profile-click">My Profile</li>
			<li id="setting-click">Setting</li>
			<li id="log-out-click">Log Out</li>
		</ul>
	</div>

      <button type="submit" class="chatbtn" name="chat" formaction="main.php"> Join With our community chat</button>
  </form>


<script>
        	

</script>





































</body>
</html>