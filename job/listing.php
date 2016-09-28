<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dashboard</title>
</head>
<body>
	
<h2>Your Posted jobs:</h2>
<div>
	
	<?php 
		session_start();
		include ("connect.php");


		$sql = "SELECT id, jobtitle, jobdescription FROM description WHERE `publisher`=? " ; 
			$stmt= $db->prepare($sql);
			$publisher_id = $_SESSION['user_id'];

			$stmt-> bind_param('s',$publisher_id);
			$stmt-> execute();
			$res = array();
			$stmt-> bind_result($id, $jobtitle, $jobdescription);

			while ($stmt->fetch()) {
			
				 echo "<a href='jobdetails.php? id= ".$id."'>" . $jobtitle . "</a>   :   " . $jobdescription . "<br/>";
				}
				echo "Click to update";
	 ?>

</div>

</body>
</html>