<?php
echo "<pre>";

require_once 'lib/ApiHandler.php';
$api=new ApiHandler();
print_r($api->UserInq('00001'));
echo "<br>aaa<br>";
print_r($api->UserReg());
?>
