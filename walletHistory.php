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
		$history[$key]['TransactionID']=$data->getTransactionID();
	    $history[$key]['AccountStatementID']=$data->getAccountStatementID();
	    $history[$key]['TransactionDate']=$data->getTransactionDate();
	    $history[$key]['TransactionType']=$data->getTransactionType();
	    $history[$key]['Amount']=$data->getAmount();
	    $history[$key]['CurrencyCode']=$data->getCurrencyCode();
	    $history[$key]['Description']=$data->getDescription();
	    $history[$key]['CurrentBalance']=$data->getCurrentBalance();
	}
	print_r($history);
 ?>