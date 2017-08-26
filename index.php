<?php
echo "<pre>";
require_once 'lib/DatabaseHandler.php';
	$db=new DatabaseHandler();
	$db->openDB();
	$data=array('CustomerName'=>'tes1','DateOfBirth'=>'1995-01-21','EmailAddress'=>'josi@a.com','IDNumber'=>'6474','Password'=>'1234','Type'=>'reguler');
	print_r($db->MakeWallet($data));
echo date('c');
?>
