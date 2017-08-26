<?php 
require_once 'lib/DatabaseHandler.php';
    $db=new DatabaseHandler();
    $result=$db->OTPLists('josiaranda21@gmail.com');
    var_dump($result);
 ?>