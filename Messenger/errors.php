<link href="css/login.css" rel="stylesheet" type="text/css">
		</style>
		  	<?php  //include('dbsignup.php'); ?>

<?php 

  if ($errors && count($errors) > 0) :  ?>
  <div class="error">
  	<p><?php  foreach ($errors as $error) : 
  	 echo $error ; ?> </p>
  	<?php endforeach ?>
  </div>
<?php  endif  ?>