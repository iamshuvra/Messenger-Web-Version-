<?php

session_start();

$conn = mysqli_connect("localhost","root","","messenger");

date_default_timezone_set("Asia/Dhaka");
$current_timestamp = date('Y-m-d H:i:s');

if (isset($_POST['submitque'])) {
$sql = 'insert into faq_questions(question_text,timestamp) values("'.$_POST['addque'].'","'.$current_timestamp.'")';

$conn->query($sql);
//header('location:faq.php');
}

$conn->close();



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="css/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" media="all">
		</style>
					<script src="js/jquery-3.4.1.js" type="text/javascript"></script>
</head>
<body>
<body>
	
<div align="center">
<div class="WelcomeCom">
<h1>Frequently Asked Questions and Answers</h1><br>
<h4>Ask Your Desire Questions or Try to help community by answering their questions</h4>
<div id="plus">
	<img src="images/plus.png" align="right" height="40px" width="40px" >
</div>

<div id="profile-img-click">
		<ul id="profile-img-click-ul">
			<li id="view-profile-click">Main Page</li>
			<li id="setting-click">Setting</li>
			<li id="log-out-click">Log Out</li>
		</ul>
	</div>

<p><a href="faq.php" id="faq-sidebar">FAQ index </a> | <a href="create.php"> Add FAQ</a> | <a href="edit.php"> Edit FAQ</a></p></div>
<form method="post" id="added">
<h2>Add your question here: <h2> <br>
<textarea name="addque" class="textarea"> </textarea> <br>
<button type="submit" name="submitque" id="addquebtn">Ask Question</button>
</form>
</div>
</body>
</html>

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