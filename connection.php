<?php
	global $connection;
	$connection = mysqli_connect('localhost','root','','db_admin');

	if (mysqli_connect_errno()) {
	  echo '<div class="alert alert-danger" role="alert" style="margin:20px auto">';
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  echo '</div>';
	  exit;
	}
	
?>