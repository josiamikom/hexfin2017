<?php
echo "<pre>";
require_once 'lib/DatabaseHandler.php';
	$db=new DatabaseHandler();
	$data=array('CustomerName'=>'tes1','DateOfBirth'=>'1995-01-21','EmailAddress'=>'josiaranda21@gmail.com','IDNumber'=>'6474','Name'=>'Gas Money','Type'=>'reguler');
	$topup=array('PrimaryID'=>'11','Amount'=>'250000.00');
	//print_r($db->MakeWallet($data));
	print_r($db->TopUp($topup));
//echo date('c');
	///$otp=array('type'=>'cashout','PrimaryID'=>'9','Amount'=>'50000.00');
	///print_r($db->getOTP($otp));
	//require_once 'lib/ApiHandler.php';
	//$api=new ApiHandler();
	//print_r($api->History('2017-08-26','2017-08-26','9','500499040'));
	//$wdraw=array('PrimaryID'=>'9','Amount'=>'10000.00');
	//print_r($db->Transfer($wdraw,'8'));
	print_r($db->getWallets('josiaranda21@gmail.com'));
?>
