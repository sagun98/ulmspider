<?php

session_start();

unset($_SESSION['login_stat']); 
$new_location= dirname("/test/job") . PHP_EOL;
header("Location:$new_location");

?>