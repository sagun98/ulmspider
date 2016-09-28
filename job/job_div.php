
<!DOCTYPE>
<html>
<head>
	<title></title>
</head>
<body>
<div class="job_div" style="font-size: 22px; margin-left: 100px; color:black; width: 500px;float: left;">

<h3 style="color: #47a3da;">Available Campus Jobs:</h3>
<br>

	<?php
	include('connect.php');
	//session_start();
		$sql = "SELECT id, publisher, jobtitle, department, joblocation, flex, opening, payrate, phone, jobdescription, jobqualification, category FROM description " ; 
			$stmt= $db->prepare($sql);
			$stmt-> execute();
			$stmt-> bind_result($id, $publisher, $jobtitle, $department, $joblocation, $flex, $opening, $payrate, $phone, $jobdescription, $jobqualification, $category);
			while ($stmt->fetch()){
				?>
				<ul>
				<div style="font-size: 16px;">
				
				<div><li><div style="color:black;"><b style="color:#47a3da; "> JOB:</b><?php echo " ".$jobtitle;?></div>  
				
				
				&nbsp <div style="color:#47a3da;"><b>DESCRIPTION:</b></div> <?php echo $jobdescription;
				echo "<br>";
				echo "<br>"; ?>
				<div style="color:black;"><b style="color:#47a3da; "> PAYRATE:</b><?php echo " ".$payrate;?></div>  
				
				
				</div>
				<?php
				$_SESSION['jobdetail_id']=$id;
				?>

				<form action= "" method="POST" >
	<input type="submit" name= "<?php echo $id?>" value= "View Details" style="border-radius: 3px; color:#47a3da; width: 110px; margin-top: 10px; ">							
		</form>
		</li>
		</ul>


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
