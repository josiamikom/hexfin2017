<?php
echo "<pre>";
require_once 'lib/ApiHandler.php';
$api=new ApiHandler();
print_r(json_decode($api->getAccessToken()));
?>
