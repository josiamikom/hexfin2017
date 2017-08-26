<?php 
	require_once 'lib/ApiHandler.php';
	$api=new ApiHandler();
	print_r($api->History('2017-08-01','2017-08-27',$_GET['id'],''));
 ?>