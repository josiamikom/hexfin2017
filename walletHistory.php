<?php 
	require_once 'lib/ApiHandler.php';
	$api=new ApiHandler();
	$histori=$api->History('2017-08-01','2017-08-27',$_GET['id'],'');
	if ($histori=='failed') {
		$histori=array();
	}else{
		$histori=$histori['response'];
	}
	print_r($histori);
 ?>