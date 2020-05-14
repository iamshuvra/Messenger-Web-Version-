<?php
session_start();
	$user_id=$_SESSION['user_id'];
			$user_name=	$_SESSION['username'];
			
			
?>
<doctype html>
<html>
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  		<script src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
  		
		<script>
		$(document).ready(function(){		
		$("#message_area").load("loadgroupchat.php");
			setInterval(function(){
				$("#message_area").load("loadgroupchat.php");
			},1000);
				
			});
		</script>

<form action="main.php">
<input type="submit" name="back" style="color: orange;" value="Back" class="btn btn-warning btn-xs">
</form>
       
<style>
	#message_area{
width: :98%;
background-color: black;
border: 1px solid blue;
height: 400px;
padding: 0% 1%;
overflow: auto;
}
#sending{
height: 500px;
width: 450px;
margin: 24px auto;
border: 1px solid black;
}

#a{
	width: 450px;
	height: 50px;
	
margin: 24px auto;
border: 1px solid black;
}
body {
   background-image: url('images/login_background.jpg');  
   color: white;
}

</style>

	


	<div id="sending">
	<div id="a"  title="Group Chat">
	<h2 style="color:marun;" align="center">Group Chat</h2>
	</div>
	
<div id="message_area">
	<?php
 


$servername = "localhost";

$password = "";
$db="messenger";
// Create connection

			
$con = new mysqli($servername, "root", $password,$db);
$sq="select * from group_chat";
$rl=mysqli_query($con,$sq);
while ($row=mysqli_fetch_assoc($rl)) {
	$mes=$row['message'];
	$Uname=$row['username'];
	$time=$row['Time'];
	//echo '<div id="msg">';
	echo '<h4 style="color:green">'.$Uname.'</h4>';
	echo '<p>'.$mes.'</p>';
	echo '<p style="color:grey;">'.$time.'</p>';
	//echo '</div>';
}
//

if(isset($_POST['submit']))
{
	 $msg=$_POST['message'];

	 $servername = "localhost";

$password = "";

$db="messenger";
// Create connection 

$conn = new mysqli($servername, "root", $password,$db);

	 $sql='INSERT INTO group_chat(from_user_id,message,username) VALUES("'.$user_id.'","'.$msg.'","'.$user_name.'")';
	 
	 if(mysqli_query($conn,$sql)){
		 
echo '<h4 style="color:blue">'.$user_name.'</h4>';
echo '<br>';
echo '<p>'.$msg.'</p>';

	 }
	 else
		 echo "connection undone";

} 
?>
</div>
<form  method="post">

<input type="text" name="message" style="width: 449px; height: 50px;" placeholder="type your message"><br>
<input type="submit" name="submit" style="width: 150px; height: 45px; color: blue; " value="send">
</div>

</form>

</html>
