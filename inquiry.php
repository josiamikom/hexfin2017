<?php 
	echo "<pre>";

	require_once 'lib/ApiHandler.php';
	$api=new ApiHandler();
	if (empty($_GET['id'])) {
		$id=1;
	}else {
		$id=$_GET['id'];
	}
	print_r($api->UserInq("'$id'"));
 ?>