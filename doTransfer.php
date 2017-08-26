<?php 

	$data=array('PrimaryID'=>$_POST['from'],'Amount'=>$_POST['Amount']);
	$recipient=$_POST['to'];
	require_once 'lib/DatabaseHandler.php';
    $db=new DatabaseHandler();
    var_dump($db->Transfer($data,$recipient));
    
 ?>