<?php 
	$data=array('PrimaryID'=>$_POST['from'],'Amount'=>$_POST['Amount']);
	require_once 'lib/DatabaseHandler.php';
    $db=new DatabaseHandler();
    var_dump($db->getOTP($data));
    //header('location:withdraw.php');
 ?>