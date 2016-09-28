<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>ULM Spider</title>
		<meta name="description" content="ULM Spider" />
		<meta name="keywords" content="job,search" />
		<meta name="author" content="Sagman" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>

				<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		 	<link rel="stylesheet" type="text/css" href="css/default.css" />
		 	<link rel="stylesheet" type="text/css" href="css/search.css" />
				<link rel="stylesheet" type="text/css" href="css/component.css" />
		  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
		  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		  <script>
		  $(function() {
		    $( "#name" ).autocomplete({
		      source: 'search.php'
		    });
		  });
		  </script>

		  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
		  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		  <script>
		  $(function() {
		    $( "#name1" ).autocomplete({
		      source: 'search_students.php'
		    });
		  });
		  </script>
 
	</head>
	<body>
		<div class="container">

				
		


			<header class="clearfix">
				<span>Spread the WEB <span class="bp-icon bp-icon-about" data-content="Update the job informations"></span></span>
				<h1>ULM Spider</h1>

				<div class="menu" style="background: #47a3da; float: right; border-radius: 3px;margin-right: 80px;">
			<h3>
			<?php $new_location= dirname("/test/job") . PHP_EOL; ?>
			e
				<a style="float: right;	 margin-right: 30px; color: white; " href="view_applicants_box.php">Applicants for the job </a> 
				<a style="float: right;  margin-right: 30px; color: white; " href="post_a_job.php">Post A Job </a>  &nbsp &nbsp
				<a style="float: right;  margin-right: 30px; color: white;" href="<?echo $new_location?>">Home </a> &nbsp &nbsp


	

		
			</header>	



 
   <body>
   		<!job_details.php>

				<?php 

	$id = $_GET['id'];
	if($id == null || $id =="") {
		header ('Location: index.php');
		die();
	}

	session_start();
		include ("connect.php");


		$sql = "SELECT id, publisher, jobtitle, department, joblocation, flex, opening, payrate, phone, jobdescription, jobqualification, category FROM description WHERE `id`=? " ; 
			$stmt= $db->prepare($sql);
			$stmt-> bind_param('i',$id);
			$stmt-> execute();
			$stmt-> bind_result($id, $publisher, $jobtitle, $department, $joblocation, $flex, $opening, $payrate, $phone, $jobdescription, $jobqualification, $category);
			$stmt->fetch();

			 if (isset($_POST['update'])){

				$stmt1 = $db1->prepare("UPDATE description SET jobtitle=?,department=?,joblocation=?,flex=?,opening=?,payrate=?,phone=?,jobdescription=?,jobqualification=?,category=? WHERE id = ? ");
				$stmt1->bind_param('ssssssssssi',$_POST['jobtitle'],$_POST['department'],$_POST['joblocation'],$_POST['flex'],$_POST['opening'],$_POST['payrate'],$_POST['phone'],$_POST['jobdescription'],$_POST['jobqualification'],$_POST['category'],$id);
				$stmt1->execute(); 
				$stmt1->close();
				?> <div style="margin-left: 30px;"><?php echo "Sucesssfully updated the job informations."; ?> </div> <br>

				<?php
				
			}
		
 if (isset($_POST['back'])){
				$new_location= dirname("/test/job") . PHP_EOL;  	
				header('Location:description.php');
			}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action= "" method="post" style="margin-left: 30px;">
		<input type="hidden" value="<?php echo $id ?>" name="id" />
		<div class="field">
			<label for="jobtitle"> Job Title </label>
			<input type="text" name="jobtitle" id="jobtitle" autocomplete="off" value="<?php echo $jobtitle ?>" style="margin-left: 100px;">
		</div><br>


		<div class="field">
			<label for="department"> Department Name </label>
			<input type="text" name="department" id="department" autocomplete="off" value="<?php echo $department ?>" style="margin-left: 30px;">
		</div><br>


		<div class="field">
			<label for="joblocation"> Job Location </label>
			<input type="text" name="joblocation" id="joblocation" autocomplete="off" value="<?php echo $joblocation?>" style="margin-left: 73px;">
		</div><br>


		<div class="field">
			<label for="flex"> Flexible Scheduling </label>
		<select name= "flex" style="margin-left: 27px;">	
			 <option value="yes" <?php if ($flex == "yes") echo "selected" ?>>yes</option>
			 <option value="no" <?php if ($flex == "no") echo "selected" ?>>no</option>
			 </select>
		</div><br>


		<div class="field">
			<label for="opening"> Number of Openings </label>
			<input type="text" name="opening" id="opening" autocomplete="off" value="<?php echo $opening?>" style="margin-left: 15px;">
		</div><br>


		<div class="field">
			<label for="payrate"> Hourly Pay Rate   $</label>
			<input type="text" name="payrate" id="payrate" autocomplete="off" value="<?php echo $payrate?>" style="margin-left: 34px;">
		</div><br>


		<div class="field">
			<label for="phone"> Phone </label>
			<input type="text" name="phone" id="phone" autocomplete="off" value="<?php echo $phone?>" style="margin-left: 113px;">

		</div><br>

		<div class="field">
			<label for="category"> Category </label>
			<select name= "category"  style="margin-left: 92px;">	
			 <option value="O3" <?php if ($category == "O3") echo "selected" ?>>O3</option>
			 <option value="O4" <?php if ($category == "O4") echo "selected" ?>>O4</option>
			 </select>
		</div>
		<br>

		<div class="field">
			<div>Duties and Responsibilities</div>
			<textarea name = "jobdescription" id= "jobdescription" rows="10px"; cols="50px"; ><?php echo $jobdescription;?> </textarea>
			
		</div><br>	

		<div class="field">
			<div> Job Qualification<div>
			<textarea name = "jobqualification" id= "jobqualification" rows="5px"; cols="50px"; ><?php echo $jobqualification;?> </textarea>
		</div><br>	

		<br>

		<div>
			<button class="post_it" type="submit" value="Update" name="update" style="vertical-align:middle"><span>UPDATE </span></button>
			
		</div><br>	

		<div>
			<input type="submit" value="Back" name="back"></input>
			
		</div><br>	

	</form>
</body>
</html>


							 	



<div style= "position:absolute; font-size:18px; top:8px;right:16px">
<a href= "logout.php" style="font-size: 22px; ">Log out </a>
</div>




















   
   </body>
</html>

<?php


include("conn.php");


echo "</br>";
echo "</br>";
?>


<?php	

$_SESSION['login']=false;
$_SESSION['staff']=false;


if (!empty($_SESSION['name'])){
	$d = split(" ", $_SESSION['name']);
//	echo $d[0];
  if(array_key_exists(1, $d))
  	$sql = ("SELECT id,first_name,last_name,degree,department,address,phone,email,rating,points FROM ulm_teachers WHERE ( `last_name` LIKE '%".$d[0]."%' and `first_name` LIKE '%".$d[1]."%') OR (`last_name` LIKE '%".$d[1]."%' and `first_name` LIKE '%".$d[0]."%')");
  else
  	$sql = ("SELECT id,first_name,last_name,degree,department,address,phone,email,rating,points FROM ulm_teachers WHERE `last_name` LIKE '%".$d[0]."%' or `first_name` LIKE '%".$d[0]."%' ");

  $stmt=$conn->prepare($sql);
	$stmt->execute();
	$stmt->bind_result($id,$first_name, $last_name,$degree,$department,$address,$phone,$email,$rating,$points);
	$count=1;
	while($stmt->fetch()) {
		$_SESSION['login']=true;
		$_SESSION['staff']=true;
	

	        	$count++;
	     
	        	
	        	
	}
}
?>
			
		
			
				

				</p>
			</div>
			
			
		</div>
		<script src="js/cbpTooltipMenu.min.js"></script>
		<script>
			var menu = new cbpTooltipMenu( document.getElementById( 'cbp-tm-menu' ) );
		</script>

	</body>
</html>
