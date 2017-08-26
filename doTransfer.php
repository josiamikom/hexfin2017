<?php 

	$data=array('PrimaryID'=>$_POST['from'],'Amount'=>$_POST['Amount']);
	$recipient=$_POST['to'];
	require_once 'lib/DatabaseHandler.php';
    $db=new DatabaseHandler();
    $db->Transfer($data,$recipient);
    header('location:wallets.php')
 ?>