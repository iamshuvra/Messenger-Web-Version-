<?php



$db_host="localhost";
$db_username="root";
$db_pass="";
$db_name="messenger";

$db_connection= mysqli_connect($db_host,$db_username,$db_pass,$db_name);

mysqli_select_db($db_name);




?>