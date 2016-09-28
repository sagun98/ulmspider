<?php

session_start();

unset($_SESSION['login_status']); 

//$new_location= dirname("/test/job") . PHP_EOL;
//header("Location:$new_location");
header('Location:index.php');

?>