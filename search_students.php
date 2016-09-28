<?php
include("conn.php");
$searchTerm = $_GET['term'];
//get matched data from skills table
$d = split(" ", $searchTerm);

//get matched data from skills table

if(array_key_exists(1, $d)) {
	$query = ("SELECT first_name,last_name FROM ulm_students WHERE `last_name` LIKE '%".$d[0]."%' and `first_name` LIKE '%".$d[1]."%'");
}
else
	$query = $conn->query("SELECT  first_name,last_name  FROM ulm_students WHERE first_name LIKE '%".$searchTerm."%' OR last_name LIKE '%".$searchTerm."%'");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['last_name']." ".$row['first_name'];
}
//return json data
echo json_encode($data);
?>