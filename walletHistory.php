<?php 
	require_once 'lib/ApiHandler.php';
	$api=new ApiHandler();
	print_r($api->History('2017-08-26','2017-08-26',$_GET['id'],''));
 ?>