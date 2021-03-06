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
	</head>
	<body>
		<div class="container">
			<header class="clearfix">
				<span>Spread the WEB <span class="bp-icon bp-icon-about" data-content="Find a campus job or get info on anyone in ULM, rate them and give comments about them being anonymous"></span></span>
				<h1>ULM Spider</h1>

				<div class="sign_in">
				<?php include ("sign_in.php"); ?>
				</div>
			</header>	

			<div class="filler-above">

				<div class="sign_up" >
				<p><?php
				include ("sign_up.php");
					?>
				</div>
				
	
					

				

				<div style="float: right ;margin-right: 220px; margin-top:40px; ">
						<div style="margin-right: 10px; margin-bottom: 5px;">
						<h3>Search ULM database for an employee or a student</h3>
					</div>
					

				<?php 
					ob_start();
					include_once("search_box.php");
					?>

				</div>
				</p>
			</div>


			<ul id="cbp-tm-menu" class="cbp-tm-menu">
				<li>
					<a href="index.php">Home</a>
				</li>

				<li>
					<a href="job/post_a_job.php">Post A Job</a>
				</li>

				<li>
					<a href="job/view_applicants_box.php">Applicants for the job</a>
				</li>
				
			</ul>
			<div class="filler-below">
				
			<?php  include('job/job_div.php');	?>

			<!event begin>
				<div style="float: right; margin-right: 300px;"><h2> Upcoming Events:</h2>	
					<div style="height: 180px;width: 200px; margin-right: 50px; margin-top: 30px;">
					<a target="_blank" href="http://ulmdota.16mb.com/" >

					<img src="data:image/jpeg;base64,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" > </a> 

					</div>
					<div style="margin-left: 60px;">ULM Dota Tournament</div>
				</h2>	
				</div>

				<!event end>


			</div>
		</div>
		<script src="js/cbpTooltipMenu.min.js"></script>
		<script>
			var menu = new cbpTooltipMenu( document.getElementById( 'cbp-tm-menu' ) );
		</script>
	</body>
</html>
