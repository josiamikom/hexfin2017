<?php 
	require_once 'lib/ApiHandler.php';
	$api=new ApiHandler();
	$histori=$api->History('2017-08-01','2017-08-27',$_GET['id'],'');
	if ($histori['status']=='failed') {
		$histori='';
	}else{
		$histori=$histori['response'];
	}
	foreach ($histori->getTransactionDetails() as $key => $data) {
		$history[$key]=$data->getTransactionID();
	    $history[$key]=$data->getAccountStatementID();
	    $history[$key]=$data->getTransactionDate();
	    $history[$key]=$data->getTransactionType();
	    $history[$key]=$data->getAmount();
	    $history[$key]=$data->getCurrencyCode();
	    $history[$key]=$data->getDescription();
	    $history[$key]=$data->getCurrentBalance();
	}
	print_r($history);
 ?>