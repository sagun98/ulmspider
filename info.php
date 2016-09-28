 <html>
 <head><title>Informo</title>
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
<div style="margin-left: 20px"><?echo "<h3>"."Search Results:"."</h3>" ?> </div>
<hr>

 <div style="margin-left: 20px"><? echo "Matches for <b>". $_SESSION['name'].$_SESSION['name1']."</b>"; ?>
</div>

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
		

   		?> <div style="margin-left: 20px"> <?echo "<h4>"."<br/>".$count.". ".'<a href="view.php?email='.$email.'">' .$first_name ." ".$last_name." -- "."(View details)".'</a>'."</h4>"; ?> </div>
   

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


if (!empty($_SESSION['name1'])){
	$d1 = split(" ", $_SESSION['name1']);
//	echo $d[0];
  if(array_key_exists(1, $d1))
  	$sql = ("SELECT id,first_name,last_name,major,email,rating,points FROM ulm_students WHERE ( `last_name` LIKE '%".$d1[0]."%' and `first_name` LIKE '%".$d1[1]."%') OR (`last_name` LIKE '%".$d1[1]."%' and `first_name` LIKE '%".$d1[0]."%')");
  else
  	$sql = ("SELECT id,first_name,last_name,major,email,rating,points FROM ulm_students WHERE `last_name` LIKE '%".$d1[0]."%' or `first_name` LIKE '%".$d1[0]."%' ");

  $stmt2=$conn2->prepare($sql);
	$stmt2->execute();
	$stmt2->bind_result($id,$first_name, $last_name,$major,$email,$rating,$points);
	$count=1;
	while($stmt2->fetch()) {
		$_SESSION['login']=true;

        ?>
        	<div style="margin-left: 20px;"><? echo "<h4>"."<br/>".$count.". " .'<a href="view.php?email='.$email.'">' .$first_name ." ".$last_name." -- "."(View details)".'</a>'."</h4>";?> </div>
   
	        	  <div style="margin-left: 20px;">->  Major: <?php echo $major; ?></div>
	        	
	        	<div style="margin-left: 20px;">->  Email: <?php echo $email; ?></div>
	        	<div style="margin-left: 30px;"><h4> Rating: <?php echo $rating; ?></div>
	       		<div style="margin-left: 30px;"><h4> Points: <?php echo $points; ?></div>	        	
	        	
	        	</br></h4>
	        	<?php
	        	$count++;
	        	
	}

      }

	if ($_SESSION['login']==false)
		header("Location:index.php");
?>


			