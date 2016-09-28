<?php
$dbhost='localhost';
$dbuser= "root";
$dbpassword= "";
$dbname="info";


$conn =new mysqli($dbhost,$dbuser,$dbpassword,$dbname);

if (!$conn){

	die("Error in connection".mysql_error());
}
$conn2 =new mysqli($dbhost,$dbuser,$dbpassword,$dbname);

if (!$conn2){

	die("Error in connection".mysql_error());
}

$conn3 =new mysqli($dbhost,$dbuser,$dbpassword,$dbname);

if (!$conn3){

	die("Error in connection".mysql_error());
}


$conn4 =new mysqli($dbhost,$dbuser,$dbpassword,$dbname);

if (!$conn4){

	die("Error in connection".mysql_error());
}
?>






