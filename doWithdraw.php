<?php 
	$data=array('PrimaryID'=>$_POST['PrimaryID'],'Amount'=>$_POST['Amount'],'Type'=>$_POST['Type']);
	require_once 'lib/DatabaseHandler.php';
    $db=new DatabaseHandler();
    $db->getOTP($data);
    header('location:withdraw.php');
 ?>