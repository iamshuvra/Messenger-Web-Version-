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

		<div>
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



			</div>
		</body>
		</html>
		<?php

		$syn = '';

		$conn = mysqli_connect("localhost","root","","messenger");



		$sql = 'select * from faq_questions order by timestamp desc';
		$result = $conn->query($sql);

		$i = 1;
		$flag = true;

		while($row = $result->fetch_assoc()) {
			$syn .= '<div id="no-of-questions" class="question-faq"><h4>'.$row['question_text'].'</h4>';

			$sql2 = 'select * from question_answers where faq_que_id = '.$row['faq_que_id'].' order by timestamp desc';
			$result2 = $conn->query($sql2);
			if(mysqli_num_rows($result2) > 0) {
				$row2 = $result2->fetch_assoc();

				$syn .= '</p></div><div id="question-hide-sec-'.$row['faq_que_id'].'" class="question-ans-hide">'; 

				$j = 2;
				$syn .= '</div>';
			}
			$syn .= '<div id="button-on-faq-sec"><button class="'.$row['faq_que_id'].'"<button id="faq-showmore-btn" name="ansbtn" class="'.$row['faq_que_id'].'">Add Answer</button></div></div>';
			$i++;
		} 

		echo $syn;

		$conn->close();



		?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>FAQ Page</title>
<!--	<style type="text/css">
		
		.faq_holder{
			text-align: left;
			width: 500px;
			margin-left: auto;
			margin-right: auto;
			padding: 4px;
		}
		.faq{
			margin-bottom: 10px;
		}
		.questions{
			font-weight: bold;
			font-size: 16px;

		}
		.answers{
			margin-left: 20px;
		}


	</style> -->
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




		//faqqqqqqqq

		$(document).on('click','#faq-sidebar',function(){
			$('#main_sec').html("");
			$('#main_sec').css('width','79%');
			$('#sidebar_active_member_sec').html('');
			$('#sidebar_active_member_sec').css('display','none');

			var syn = '<div id="faq-question-ans"><div id="add-question-on-faq"></div><div id="faq-question-section"></div></div>';

			$('#main_sec').html(syn);
			set_question_box();
			fetch_faq_question_and_answer();
		});




		function fetch_faq_question_and_answer() {
			$.ajax({
				url : "faq.php",
				method : "POST",
				dataType : "text",
				success: function(data) {
					$('#faq-question-section').html(data);
				}
			});
		}

		function set_question_box() {
			$(document).on('click','#faq-reply-btn',function() {
				var q_id = $(this).attr('class');
				var syn = '<div id="faq-reply-box"><h4>Question : '+$(this).attr('name')+'</h4><div id="add-question-on-faq" class="add-question-on-faq-2"><textarea id="textarea-'+q_id+'" class="faq-question-textarea-2"></textarea><button id="'+q_id+'" class="reply-btn-for-faq">Reply</button></div></div>';
				$('#add-question-on-faq').html(syn);
				fetch_faq_question_and_answer();
			});
		}
						var q_id = 0;

           $(document).on('click','#faq-showmore-btn',function() {

				 q_id = $(this).attr('class');

				var ans_ques= '<textarea class="area" id="txt-area-for-answer" name="ansarea"></textarea><button input="submit" id="faq-ans-for-ques">Confirm</button>';
				$('#answerq').html(ans_ques);
				
			}); 

           $(document).on('click','#faq-ans-for-ques',function() {

				var textareaData = $('#txt-area-for-answer').val();
				if(textareaData != '') {
					$.ajax({
						url : "insert_faq_question_answer.php",
						method : "POST",
						data : { q_id: q_id, ans : textareaData},
						dataType : "text",
						success: function(data) {
							fetch_faq_question_and_answer();
							$('#answerq').html('');

						}
					});
				}
			}); 

			$(document).on('click','.reply-btn-for-faq',function() {
				var q_id = $(this).attr('id');
				var textareaData = $('#textarea-'+q_id).val();
				if(textareaData != '') {
					$.ajax({
						url : "insert_faq_question_answer.php",
						method : "POST",
						data : { q_id: q_id, ans : textareaData},
						dataType : "text",
						success: function(data) {
							fetch_faq_question_and_answer();
							set_question_box();
						}
					});
				}
			});


			$(document).on('click','#faq-add-question-btn',function() {

				var text = $('#faq-question-textarea').val();
				if(text != '') {
					$.ajax({
						url : "insert_faq_question.php",
						method : "POST",
						data : { que_text: text},
						dataType : "text",
						success: function(data) {
							$('#faq-question-textarea').val("");
							fetch_faq_question_and_answer();
						}
					});
				}
			});

					});


	</script>
</head>
<body>
	<div id="answerq">
		
</div>
</body>
</html>