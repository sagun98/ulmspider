<?php

session_start();

$found=false;
unset($_SESSION['login_status']); 
$new_location= dirname("/test/job") . PHP_EOL;
header("Location:$new_location");

?>