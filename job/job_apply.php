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
		<link rel="stylesheet" type="text/css" href="css/component1.css" />
		<script src="js/modernizr.custom.js"></script>

				<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		 	<link rel="stylesheet" type="text/css" href="css/default.css" />
		 	<link rel="stylesheet" type="text/css" href="css/search.css" />
				<link rel="stylesheet" type="text/css" href="css/component1.css" />
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
				<span>Spread the WEB <span class="bp-icon bp-icon-about" data-content="Find a campus job or get info on anyone in ULM, rate them and give comments about them being anonymous"></span></span>
				<h1>ULM Spider</h1>

				<div class="menu" style="background: #47a3da; float: right; border-radius: 3px;margin-right: 80px;">
			<h3>
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
				
				 $new_location= dirname("/test/job") . PHP_EOL;?>
				

				<?php 
				error_reporting(0);
				session_start();
				$new_location= dirname("/test/job") . PHP_EOL; 
					if ($_SESSION['login_status']==true){?>
						<a style="float: right;  margin-right: 30px; color: white;" href="<? echo $new_location."/login_index.php"?>">Home </a> &nbsp &nbsp </h3> </div> <?
					} 
					else{
						?><a style="float: right;  margin-right: 30px; color: white;" href="<?echo $new_location?>">Home </a> &nbsp &nbsp  
							</h3> </div><?
					}

				?>

	

		
			</header>	

				<!search box>


 
   <body>
   		<div style="margin-left: 30px;">
<h2>Campus Jobs:</h2>

	<?php
	//error_reporting(0);
	include('connect.php');

		$sql = "SELECT id, publisher, jobtitle, department, joblocation, flex, opening, payrate, phone, jobdescription, jobqualification, category FROM description WHERE id=?" ; 
			$stmt= $db->prepare($sql);
			$stmt->bind_param('i',$_SESSION['key']);
			$stmt-> execute();
			$stmt-> bind_result($id, $publisher, $jobtitle, $department, $joblocation, $flex, $opening, $payrate, $phone, $jobdescription, $jobqualification, $category);
			while ($stmt->fetch()){
				
				$_SESSION['job_applied']=$id;

				?>
				 <div style="color:black;"><b style="color:#47a3da; ">Job Title</b>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo " ".$jobtitle;?></div> 
			
				 <br>
				<div style="color:black;"><b style="color:#47a3da; ">Department</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <?php echo " ".$department;?></div> 
					<br>


				<div style="color:black;"><b style="color:#47a3da; ">Job Location</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp<?php echo " ".$joblocation;?></div> 
				
				<br>

				<div style="color:black;"><b style="color:#47a3da; ">Flexibility</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp &nbsp &nbsp &nbsp<?php echo " ".$flex;?></div> 
			
				<br>

				<div style="color:black;"><b style="color:#47a3da; ">Openings</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<?php echo " ".$opening;?></div> 
				<br>
				<div style="color:black;"><b style="color:#47a3da; ">Pay Rate</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<?php echo " ".$payrate;?></div> 
			
				<br>
				<div style="color:black;"><b style="color:#47a3da; ">Phone</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo " ".$phone;?></div> 
				<br>

				<div style="color:black;"><b style="color:#47a3da; ">Job Description</b>&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo " ".$jobdescription;?></div> 
				<br>
				<div style="color:black;"><b style="color:#47a3da; ">Job Qualification</b>&nbsp&nbsp<?php echo " ".$jobqualification;?></div> 
				<br>
				<div style="color:black;"><b style="color:#47a3da; ">Category</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo " ".$category;?></div> 
				<br>

				<?php
				echo "<br>";
				echo "<br>";
				echo "<br>";
				?>

				<hr style="margin-right: 50px;">
				<?php

				if ($_SESSION['login_status']==true){
					$email=$_SESSION['email'];
					?>
				

	<form action= "" method="POST" enctype="multipart/form-data">
	<br>
	<br>
	<br>
	<h3>Send your info to the employee</h3>
	Your Email: <?php echo $email;?>
	<br>
	<input type="text" name="name" id="name" placeholder="Your Name">
	<br>
	<textarea rows="8" cols="30" name="message" id="message" placeholder="Your message"></textarea>
	<br>
	<input type ="file" name="resume">
	Attach resume(optional)
	<br>
	<input type="submit" name="apply" value= "APPLY" >					
		</form>
		<?php
				  
	  
	        	if (isset($_POST['apply'])){

					if (!empty($_POST)) {

						if (!empty($_POST['name'])) {


								if (!empty($_POST['message'])){
							$name   		   = strtolower(trim($_POST['name']));
							$message	   	   = strtolower(trim($_POST['message']));	

				// upload file begin
					$uploaddir = 'upload/';
					define ('SITE_ROOT', realpath(dirname(__FILE__)));
					$uploadfile = SITE_ROOT.'/upload/'. basename($_FILES['resume']['name']);
					$uploadfile=str_replace(' ','|',$uploadfile);
					$resume = $uploadfile;
					move_uploaded_file($_FILES['resume']['tmp_name'], $uploadfile);
				//upload file end
	
			
			$insert= $db2->prepare("INSERT INTO job_applicant(name,email,message,resume,job_applied) VALUES (?,?,?,?,?)");
			$insert->bind_param ('ssssi',$name,$email,$message,$resume,$_SESSION['job_applied']);
			
			if($insert->execute())
			{
				?><div style="color: #008000"><?echo "Succesfully sent your information.";?> </div><?php
			//	header ('Location: description.php');
				
									}
								}
								else {
									?><div style="color: red;"><?echo "Message field empty";?></div>

									<?php
									}
								}
								
								else {
									?><div style="color: red;"><?echo "Enter your name";?></div>

									<?php
									}			
							}
						
					
		

			echo "<br>";
			echo "<br>";
		}
	}

				


				else{  
				
					?>
					
	<br>
	<br>
	<br>
	<h3>Send your info to the employee</h3>
	<form action= "" method="POST" enctype="multipart/form-data">
	<input type="text" name="name" id="name" placeholder="Your Name">
	<br>
	<input type="text" name="email" id="email" placeholder="Your Email">
	<br>
	<textarea rows="8" cols="30" name="message" id="message" placeholder="Your message"></textarea>
	<br>
	Attach resume (optional) &nbsp &nbsp 
	<input type ="file" name="resume">
	
	<br>
	<input type="submit" name="apply" value= "APPLY" >	
	<br>
					
		</form>
		<?php
			// Uploading the image into the upload folder.
	       if (isset($_POST['apply'])){
	  
	        		$uploaddir = 'upload/';
					define ('SITE_ROOT', realpath(dirname(__FILE__)));
					$uploadfile = SITE_ROOT.'/upload/'. basename($_FILES['resume']['name']);
					$uploadfile=str_replace(' ','|',$uploadfile);
					$resume = $uploadfile;
					echo "<br>";


		move_uploaded_file($_FILES['resume']['tmp_name'], $uploadfile);
  }

//upload file end


				

			
				if (isset($_POST['apply'])){

					if (!empty($_POST)) {

						if (!empty($_POST['name'])) {

							if (!empty($_POST['email'])){

									if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

								if (!empty($_POST['message'])){
						
							$email 			   =strtolower(trim($_POST['email']));
							$name   		   = strtolower(trim($_POST['name']));
							$message	   	   = strtolower(trim($_POST['message']));		
			
			$insert= $db2->prepare("INSERT INTO job_applicant(name,email,message,resume,job_applied) VALUES (?,?,?,?,?)");
			$insert->bind_param ('ssssi',$name,$email,$message,$resume,$_SESSION['job_applied']);
		
			if($insert->execute())
			{
				
				?><div style="color: #008000"><?echo "Succesfully sent your information.";?></div> <?php
			//	header ('Location: description.php');
				
									}
								}
								else {
									?><div style="color: red;"><?echo "Message field empty";?></div>

									<?php
									}
								}
								else {
								?><div style="color: red;"><?echo "Invalid email";?></div>

									<?php
								}
							}
							
							else {
									?><div style="color: red;"><?echo "Email field empty";?></div>

									<?php
									}
								}
								
								else {
									?><div style="color: red;"><?echo "Enter your name";?></div>

									<?php
									}			
							}
						}
					}
			}

			echo "<br>";
			echo "<br>";
			 	
			?>
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
		

   		?> 
   	        	
	        	
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
