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
				<span>Spread the WEB <span class="bp-icon bp-icon-about" data-content="Post the job filling up the form below"></span></span>
				<h1>ULM Spider</h1>

				<div class="menu" style="background: #47a3da; float: right; border-radius: 3px;margin-right: 80px;">
			<h3>
			<?php $new_location= dirname("/test/job") . PHP_EOL; ?>
			
			<?php
				session_start();
					if ($_SESSION['login_status']==true){
						?><a style="float: right;  margin-right: 30px; color: white; " href="applicants.php">Applicants for the job  </a>
						&nbsp &nbsp
					<?
					}
					else {
						?><a style="float: right;  margin-right: 30px; color: white; " href="poster_applicants.php">Applicants for the job  </a>  &nbsp &nbsp
					<?
					}
			 

			
			
					if ($_SESSION['login_status']==true){
						?><a style="float: right;  margin-right: 30px; color: white; " href="description.php">Post A Job </a>  &nbsp &nbsp
					<?
					}
					else {
						?><a style="float: right;  margin-right: 30px; color: white; " href="poster.php">Post A Job </a>  &nbsp &nbsp
					<?
					}
				
				

					if ($_SESSION['login_status']==true){
						?><a style="float: right;  margin-right: 30px; color: white; " href="<? echo $new_location."/login_index.php"?>">Home </a>  &nbsp &nbsp
					<?
					}
					else {
						?><a style="float: right;  margin-right: 30px; color: white; " href="<? echo $new_location?>">Home </a>  &nbsp &nbsp
					<?
					}
				?>

				</h3>
				</div>
				
				


	

		
			</header>	



 
   <body>
   		<!description.php>


<?php


if ($_SESSION['login_status'])
{
	?><div style="margin-left:30px; font-size: 20px; color: #191970;"> <?php echo "Hello " .$_SESSION['username']. " !!!"; ?> </div>

<?php
	echo "<br>";
	include ("security.php");
	include ("connect.php");

// Inserting job data into the description table. 
if (!empty($_POST)) {
	if (isset($_POST['jobtitle'],$_POST['department'],$_POST['joblocation'],$_POST['flex'],$_POST['opening'],$_POST['payrate'],$_POST['phone'],$_POST['jobdescription'],$_POST['jobqualification'],$_POST['category'])){

		$jobtitle 		   = strtolower(trim($_POST['jobtitle']));
		$department   	   = strtolower(trim($_POST['department']));
		$joblocation 	   = strtolower(trim($_POST['joblocation']));
		$flex       	   = strtolower(trim($_POST['flex']));
		$opening     	   = strtolower(trim($_POST['opening']));
		$payrate           = strtolower(trim($_POST['payrate']));
		$phone       	   = strtolower(trim($_POST['phone']));
		$jobdescription	   = strtolower(trim($_POST['jobdescription']));
		$jobqualification  = strtolower(trim($_POST['jobqualification']));
		$category          = strtolower(trim($_POST['category']));

	
					if (!empty($jobtitle)) {

						if (!empty($department)) {

							if (!empty($joblocation)) {

								if (!empty($opening)) {

									if (!empty($payrate)) {

											if (!empty($phone)) {

													if (!empty($jobdescription)) {

														if (!empty($jobqualification)) {

							
	
			$insert= $db->prepare("INSERT INTO description(publisher,jobtitle,department,joblocation,flex,opening,payrate,phone,jobdescription,jobqualification,category) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
			$insert->bind_param ('issssssssss',$_SESSION['user_id'],$jobtitle,$department,$joblocation,$flex,$opening,$payrate,$phone,$jobdescription,$jobqualification,$category);
			
			if($insert->execute())
			{
				header ('Location: description.php');
				die();
			}
									
								}

								else {
									?><div style="color: red; margin-left: 30px;"> <?echo "Specify the job Qualification.";  ?>  </div><br><?php
									 }		
							}

							else {
								?><div style="color: red; margin-left: 30px;"> <?echo "Enter the job description";  ?>  </div><br><?php
								 }

							}
							else {
								?><div style="color: red; margin-left: 30px;"> <?echo "Enter the phone number";	 ?>  </div><br><?php
								 }
					}
					else{
						?><div style="color: red; margin-left: 30px;"> <?echo "Enter the payrate";  ?>  </div><br><?php
						}
				}
				else {
					?><div style="color: red; margin-left: 30px;"> <?echo "Specify the number of openings.";  ?>  </div><br><?php
					 }
			}
			else {
				?><div style="color: red; margin-left: 30px;"> <?echo "Enter the location of the job";  ?>  </div><br><?php
				 }

		}
		else {
			?><div style="color: red; margin-left: 30px;"> <?echo "Enter the name of the department"; ?>  </div><br><?php
			 }
	}
	else {
		?><div style="color: red; margin-left: 30px;"> <?echo "Enter the title of the job"; ?>  </div><br>

		<?php
		 }
}
}


	
}

else {
	header("Location:poster.php");

}
?>




<! Form for posting the Job description.>
<form action= "" method="post" style="margin-left: 30px;">

		<div class="field">
			<label for="jobtitle"> Job Title </label>
			<input type="text" name="jobtitle" id="jobtitle" autocomplete="off" style="margin-left: 100px;">
		</div><br>


		<div class="field">
			<label for="department"> Department Name </label>
			<input type="text" name="department" id="department" autocomplete="off" style="margin-left: 30px;" >
		</div><br>


		<div class="field">
			<label for="joblocation"> Job Location </label>
			<input type="text" name="joblocation" id="joblocation" autocomplete="off" style="margin-left: 73px;">
		</div><br>


		<div class="field">
			<label for="flex"> Flexible Scheduling </label>
			<select name= "flex" style="margin-left: 27px;">	
			 <option value="yes">Yes</option>
			 <option value="no">No</option>
			 </select>
		</div><br>


		<div class="field">
			<label for="opening"> Number of Openings </label>
			<input type="text" name="opening" id="opening" autocomplete="off" style="margin-left: 15px;">
		</div><br>


		<div class="field">
			<label for="payrate"> Hourly Pay Rate   $</label>
			<input type="text" name="payrate" id="payrate" autocomplete="off" style="margin-left: 34px;">
		</div><br>


		<div class="field">
			<label for="phone"> Phone </label>
			<input type="text" name="phone" id="phone" autocomplete="off" style="margin-left: 113px;">
		</div><br>

			<div class="field">
			<label for="category"> Category </label>
			<select name= "category" style="margin-left: 92px;">	
			 <option value="O3">O3</option>
			 <option value="O4">O4</option>
			  <option value="Both">Both</option>
			 </select>
		</div>
		<br>

		<div class="field">
			<div>Duties and Responsibilities</div>
			<textarea name = "jobdescription" id= "jobdescription" rows="10px"; cols="50px";> </textarea>
		</div><br>	

		<div class="field">
			<div> Job Qualification<div>
			<textarea name = "jobqualification" id= "jobqualification" rows="5px"; cols="50px";> </textarea>
		</div><br>	

	<br>

	<button class="post_it" type="submit" value="POST" style="vertical-align:middle"><span>POST JOB </span></button>
		<br>	

	</form>


<br>
<br>

<hr>
<br>
<br>
<br>

<h2 style="margin-left: 20px;">Your Posted jobs:</h2>
<br>

	
	<?php
	//Listing out already posted jobs. 
		include ("connect.php");


		$sql = "SELECT id, jobtitle, jobdescription FROM description WHERE `publisher`=? " ; 
			
			$stmt= $db->prepare($sql);
			$publisher_id = $_SESSION['user_id'];

			$stmt-> bind_param('s',$publisher_id);
			$stmt-> execute();
			$stmt-> bind_result($id, $jobtitle, $jobdescription);
			$found = false;
			echo "<ol>";
			while ($stmt->fetch()) {
				$description_id=$id ;
				$found = true;
				?>
				<li>Applicants for 

					<a href='jobdetails.php?id=<?php echo $id ?>'>
						<?php echo $jobtitle ?>
						&nbsp &nbsp &nbsp (Click here to edit the job contents.)
					</a>

					<?php
						$sql1 = "SELECT id, name, email,message,resume,job_applied FROM job_applicant" ; 
						$stmt1= $db1->prepare($sql1);
						$stmt1-> execute();
						$stmt1-> bind_result($id, $name, $email,$message,$resume,$job_applied);
						while ($stmt1->fetch()) {
								if ($job_applied ==  $description_id){
							echo "<br>"	;	
							echo "<br>"	;	
							echo "&nbsp &nbsp &nbsp Name: ".$name;
							echo "<br>";
							echo "&nbsp &nbsp &nbsp Email:".$email;
							echo "<br>";
							echo "&nbsp &nbsp &nbsp Message:". $message;
							echo "<br>";

							$resume = strstr($resume, 'upload');
							$new_location= dirname("/test/job/upload") . PHP_EOL;
							
							$new_location=trim($new_location);
							$resume= $new_location."/".$resume;
							//echo $resume;

							$resume_length=strlen($resume);
							//echo $resume_length;
							if ($resume_length>17){

							 ?>
							
							 	<a href="<?php echo $resume ?>" download> Resume download</a>

							 	<?php } 

							 	else {
							 		echo "No resume uploaded.";
							 	}
							 	?>
							
							<?php
							echo "<br>";
							echo "<br>";
								}
							}
					?>
				</li>
				<?php
				echo "<br>";
				echo "<br>";

			}
			echo "</ol>";
			if(!$found){
				?> <div style="margin-left: 40px; color: red;"> <?php echo "No Job Posted Yet!"; }?></div>
			
	

</div>

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
		

   		?> <div style="margin-left: 20px"> <?echo "<h4>"."<br/>".'<a href="view.php?email='.$count.". ".$email.'">' .$first_name ." ".$last_name." -- "."(View details)".'</a>'."</h4>"; ?> </div>
   

	        	 <div style="margin-left: 20px;"><?echo "->  Degree: ".$degree;?> </div>
	        	
	        	<div style="margin-left: 20px;"><?echo "->  Department: ".$department;?> </div>
	        	
	        	<div style="margin-left: 20px;"><?echo "->  Address: ".$address;?> </div>
				
	        	
	        	<div style="margin-left: 20px;"><?echo "->  Phone: ".$phone;?> </div>
	        	
	        	
	        	<div style="margin-left: 20px;"><?echo "->  Email: ".$email;?> </div>
	        	

	        	<div style="margin-left: 30px;"><h4> Rating: <?php echo $rating; ?></div>
	       		<div style="margin-left: 30px;"><h4> Points: <?php echo $points; ?></div>	        	
	        	
	        	</h4>
	        	</br>
<?php

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
