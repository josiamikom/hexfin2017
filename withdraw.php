<?php 
require_once 'lib/DatabaseHandler.php';
    $db=new DatabaseHandler();
    $result=$db->OTPList('josiaranda21@gmail.com');
    var_dump($result);
 ?>