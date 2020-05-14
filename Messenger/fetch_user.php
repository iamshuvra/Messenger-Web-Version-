<?php

//fetch_user.php

include('database_connection.php');
//session_start();

 echo '<link href="css/style.css"  media="" >';

echo '</style>
					<script src="js/jquery-3.4.1.js" type="text/javascript"></script>';

$query = "
SELECT * FROM signup 
WHERE user_id != '".$_SESSION['user_id']."' 
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();



/*
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
$output = '
<table class="table table-bordered table-striped">
	<tr>
		<th width="70%">Username</td>
		<th width="20%">Status</td>
		<th width="10%">Action</td>
	</tr>

'
$output='
	<table class="table table-bordered">
	<tr>
		<th width="100%"> Users</td>
		</tr>

'; */
foreach ($result as $row) {

	$status = '';
	$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
	$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
	$user_last_activity = fetch_user_last_activity($row['user_id'], $connect);
	if($user_last_activity > $current_timestamp)
	{
		$status = '<span class="label label-success">Online</span>';
	}
	else
	{
		$status = '<span class="label label-danger">Offline</span>';
	}
	echo  '
	<div id=feuser>
		  <ul>
	    <li><img src='.$row['image'].' class="viewimg" width="170px" id="box" height="200px"> </li>
		<li>Username: '.$row['username'].'</li>	    
		<li id="chatoutput">Status: '.$status.'</li>
		<li id="chatoutput"><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$row['user_id'].'" data-tousername="'.$row['username'].'">Start Chat</button></li><br><br>
		 '.count_unseen_message($row['user_id'], $_SESSION['user_id'], $connect).' '.fetch_is_type_status($row['user_id'], $connect).'
		</ul>	</div>
	'; 

echo ' <script type="text/javascript">
				$(document).ready(function(){});
</script>
	
' ;
}
?>
<script type="text/javascript">
					$(document).ready(function(){
						$('#box').click(function(){
				
				              $('#chatoutput').show();

						});
						$('#box').mouseout(function(){
				
				              $('#chatoutput').hide();

						});
						$('#chatoutput').mouseover(function(){
				
				              $(this).show();

						});
						$('#chatoutput').mouseout(function(){
				
				              $(this).hide();

						});
					});


</script>
<style type="text/css">
	ul{
    margin: 0;
	padding: 6px 0 6px 14px;
	list-style: none;
	background-image: url("images/icons/info.png");
	background-repeat: no-repeat;
	background-position: left;
	background-size: 40px;
	width: 400px;

}
</style>