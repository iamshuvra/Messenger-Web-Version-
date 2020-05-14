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
?>