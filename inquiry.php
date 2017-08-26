<?php 
	echo "<pre>";

	require_once 'lib/ApiHandler.php';
	$api=new ApiHandler();
	print_r($api->UserInq("'$_GET[id]'"));
 ?>