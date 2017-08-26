<?php 
	$data=array('PrimaryID'=>$_POST['PrimaryID'],'Amount'=>$_POST['Amount']);
	require_once 'lib/DatabaseHandler.php';
    $db=new DatabaseHandler();
    $db->TopUp($data);
    header('location:wallets.php');
 ?>