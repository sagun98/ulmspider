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
				<a style="float: right; margin-right: 30px; color: white; " href="job/view_applicants_box.php">Applicants for the job </a> 
				<a style="float: right;  margin-right: 30px; color: white; " href="job/post_a_job.php">Post A Job </a>  &nbsp &nbsp
				<a style="float: right;  margin-right: 30px; color: white;" href="main.php">Home </a> &nbsp &nbsp
			</h3> </div>


	

		
			</header>	

				<!search box>


 
   <body>
   		

   			

   	<form method="post" action="index.php">
   
		<div class="search" style="float: right; width: 500px;margin-left: 400px">
			
			<input type="text" name="name" id="name" placeholder="Search staffs name">
		</div>	
	</form>
   
   
   	<form method="post" action="index.php">
   	
		<div class="search" style="float: right; width: 500px;margin-left: 40px; margin-top: 10px;">
		
			<input type="text" name="name1" id="name1" placeholder="Search students name">
		</div>	
	</form>  
	
   
   </body>
</html>

<?php

session_start();
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
