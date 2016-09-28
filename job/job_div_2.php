
<!DOCTYPE>
<html>
<head>
	<title></title>
</head>
<body>
<div class="job_div" style="font-size: 22px; margin-left: 500px; color:black;">

<h2 style="color: black; margin-right: 500px;">Available Campus Jobs:</h2>
<br>
<br>
	<?php
	include('connect.php');
	//session_start();
		$sql = "SELECT id, publisher, jobtitle, department, joblocation, flex, opening, payrate, phone, jobdescription, jobqualification, category FROM description " ; 
			$stmt= $db->prepare($sql);
			$stmt-> execute();
			$stmt-> bind_result($id, $publisher, $jobtitle, $department, $joblocation, $flex, $opening, $payrate, $phone, $jobdescription, $jobqualification, $category);
			while ($stmt->fetch()){
				echo "JOB: ".$jobtitle;
				echo "<br>";

				echo "DESCRIPTION: ".$jobdescription;
				echo "<br>";

				echo "PAYRATE:".$payrate;
				echo "<br>";	



				$_SESSION['jobdetail_id']=$id;
				?>

				<form action= "" method="POST" >
	<input type="submit" name= "<?php echo $id?>" value= "View Details" style="border-radius: 3px; color:#47a3da; width: 110px; margin-top: 10px; ">							
		</form>


			<?php
			if (isset($_POST[$id])){
			foreach($_POST as $key => $value){
    			echo "$key";
    			$_SESSION['key']=$key;
    		 	header('Location:job/job_apply.php?id='.$id);
			}
		}
			echo "<br>";
			echo "<br>";
			 
			 }	
			?>
</div>

</body>
</html>
