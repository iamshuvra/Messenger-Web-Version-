<!--
//index.php
!-->

<?php
//session_start();

include('database_connection.php');

/*
if(!isset($_SESSION['user_id']))
{
	header("location:login.php");
} */

?>

<html>  
    <head>

		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Messenger Web Version</title>  
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  		<script src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
  		<style>
body {
   background-image: url('images/login_background.jpg');  
   color: white;
}

</style>
		
  
    </head>  
    <body>  
        <div class="container">
			<br />
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

</div>
			<h3 align="center">Messenger Web Version</h3><br />
			<br />
			<div class="row">
				<div class="col-md-8 col-sm-6">
					<h4>Online User</h4>
				</div>
				<div class="col-md-2 col-sm-3">
				<form action="chat.php" method="post" >
				<input type="submit" name="group_chat" value="Group Chat" class="btn btn-warning btn-xs">
				</form>


				</div>
				<div class="col-md-2 col-sm-3">
					<p align="right">Hi - <?php echo $_SESSION['username']; ?> - <a href="logout.php">Logout</a></p>
				</div>
			</div>
			<div class="table-responsive">
				
				<div id="user_details"></div>
				<div id="user_model_details"></div>
			</div>
			<br />
			<br />
			
		</div>
		
    </body>  
</html>

<style>
#user_model_details{
	position: absolute;
  right:400px;
  width: 700px;
  padding: 10px;
  top:250px;

}
#user_dialog{
	

}
.chat_message_area
{
	position: relative;
	width: 100%;
	height: auto;
	background-color: #FFF;
    border: 1px solid #CCC;
    border-radius: 3px;
    text-decoration-color: teal;
}

#group_chat_message
{
	width: 100%;
	height: auto;
	min-height: 80px;
	overflow: auto;
	padding:6px 24px 6px 12px;
	color: teal;
	display: none;
}

.image_upload
{
	position: absolute;
	top:3px;
	right:3px;
}
.image_upload > form > input
{
    display: none;
}

.image_upload img
{
    width: 24px;
    cursor: pointer;
}
 #profile-img-click {
        	display: none; 
			width: 150px;
			height: 160px;
			position: fixed;
	        background-color: teal;
			color: white;
			top: 2%;
			left: 87%;
			padding: 10px;
			z-index: 999;
		}

		#profile-img-click-ul {
			display: flex;
			flex-direction: column;
			list-style: none;
			margin-top: 0;
		}
		#profile-img-click-ul li {
			padding: 10px;
			font-size: 20px;
			cursor: pointer;
		}
		#message_area{
width: :98%;
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

</style> 



<script>  
$(document).ready(function(){
	

	fetch_user();
	
	 
	
	
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

	setInterval(function(){
		update_last_activity();
		fetch_user();
		update_chat_history_data();
		//fetch_group_chat_history();
	}, 5000);

	function fetch_user()
	{
		$.ajax({
			url:"fetch_user.php",
			method:"POST",
			success:function(data){
				$('#user_details').html(data);
			}
		})
	}

	function update_last_activity()
	{
		$.ajax({
			url:"update_last_activity.php",
			success:function()
			{

			}
		})
	}

	function make_chat_dialog_box(to_user_id, to_user_name)
	{
		var modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="You have chat with '+to_user_name+'">';
		modal_content += '<div style="height:400px; border:1px solid #ccc; color:teal; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
		modal_content += fetch_user_chat_history(to_user_id);
		modal_content += '</div>';
		modal_content += '<div class="form-group">';
		modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control chat_message"></textarea>';
		modal_content += '</div><div class="form-group" align="right">';
		modal_content+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';
		$('#user_model_details').html(modal_content);
	}
	/*
$(document).on('click','.group_chat',function(){
	////
	 $("#dialog").dialog("Open");
}); */



	$(document).on('click', '.start_chat', function(){
		var to_user_id = $(this).data('touserid');
		var to_user_name = $(this).data('tousername');
		make_chat_dialog_box(to_user_id, to_user_name);
		$("#user_dialog_"+to_user_id).dialog({
			autoOpen:false,
			width:200
		});
		$('#user_dialog_'+to_user_id).dialog('open');
		$('#chat_message_'+to_user_id).emojioneArea({
			pickerPosition:"top",
			toneStyle: "bullet"
		});
	});
	$(document).on('click', '.send_chat', function(){
		var to_user_id = $(this).attr('id');
		var chat_message = $.trim($('#chat_message_'+to_user_id).val());
		if(chat_message != '')
		{
			$.ajax({
				url:"insert_chat.php",
				method:"POST",
				data:{to_user_id:to_user_id, chat_message:chat_message},
				success:function(data)
				{
					//$('#chat_message_'+to_user_id).val('');
					var element = $('#chat_message_'+to_user_id).emojioneArea();
					element[0].emojioneArea.setText('');
					$('#chat_history_'+to_user_id).html(data);
				}
			})
		}
		else
		{
			alert('Type something');
		}
	});

	function fetch_user_chat_history(to_user_id)
	{
		$.ajax({
			url:"fetch_user_chat_history.php",
			method:"POST",
			data:{to_user_id:to_user_id},
			success:function(data){
				$('#chat_history_'+to_user_id).html(data);
			}
		})
	}

	function update_chat_history_data()
	{
		$('.chat_history').each(function(){
			var to_user_id = $(this).data('touserid');
			fetch_user_chat_history(to_user_id);
		});
	}

	$(document).on('click', '.ui-button-icon', function(){
		$('.user_dialog').dialog('destroy').remove();
		$('#is_active_group_chat_window').val('no');
	});

	$(document).on('focus', '.chat_message', function(){
		var is_type = 'yes';
		$.ajax({
			url:"update_is_type_status.php",
			method:"POST",
			data:{is_type:is_type},
			success:function()
			{

			}
		})
	});
	
	$(document).on('blur', '.chat_message', function(){
		var is_type = 'no';
		$.ajax({
			url:"update_is_type_status.php",
			method:"POST",
			data:{is_type:is_type},
			success:function()
			{
				
			}
		})
	});
	$(document).on('click', '.remove_chat', function(){
		var chat_message_id = $(this).attr('id');
		if(confirm("Are you sure you want to remove this chat?"))
		{
			$.ajax({
				url:"remove_chat.php",
				method:"POST",
				data:{chat_message_id:chat_message_id},
				success:function(data)
				{
					update_chat_history_data();
				}
			})
		}
	});
	
	

 

  
});
</script>
 
 