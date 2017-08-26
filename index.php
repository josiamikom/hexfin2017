<?php
echo "<pre>";
require_once 'lib/DatabaseHandler.php';
	$db=new DatabaseHandler();
	$db->openDB();
	$data=array('CustomerName'=>'tes1','DateOfBirth'=>'1995-01-21','EmailAddress'=>'josi@a.com','IDNumber'=>'6474','Password'=>'1234','MobileNumber'=>'021');
	print_r($db->LogIn($data));
echo date('c');
?>
