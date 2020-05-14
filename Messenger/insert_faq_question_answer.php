<?php

session_start();
$syn = '';
$conn = mysqli_connect("localhost","root","","messenger");

date_default_timezone_set("Asia/Dhaka");
$current_timestamp = date('Y-m-d H:i:s');


$sql = 'insert into question_answers(que_answer,timestamp,faq_que_id) values ("'.$_POST['ans'].'","'.$current_timestamp.'",'.$_POST['q_id'].')';

$conn->query($sql);

$conn->close();



?>