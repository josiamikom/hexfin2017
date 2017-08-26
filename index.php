<?php
echo "hi there <br>";
require_once 'lib/ApiHandler.php';
$api=new ApiHandler();
print_r($api->getAccessToken());
?>
