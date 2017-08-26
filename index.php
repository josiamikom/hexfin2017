<?php
echo "<pre>";
require_once 'lib/DatabaseHandler.php';
	$db=new DatabaseHandler();
	$data=array('CustomerName'=>'tes1','DateOfBirth'=>'1995-01-21','EmailAddress'=>'josi@a.com','IDNumber'=>'6474','Password'=>'1234','Type'=>'reguler');
	//$topup=array('PrimaryID'=>'9','Amount'=>'5000.00');
	//print_r($db->MakeWallet($data));
	//print_r($db->TopUp($topup));
//echo date('c');
	$otp=array('type'=>'cashout','PrimaryID'=>'9','Amount'=>'50000.00');
	print_r($db->getOTP($otp));
?>
