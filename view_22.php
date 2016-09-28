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

		<link rel="stylesheet" type="text/css" href="css/style_user.css">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

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
				<a style="float: right;  margin-right: 30px; color: white;" href="index.php">Home </a> &nbsp &nbsp
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
	
	<hr>
<?php
//error_reporting(0);
session_start();
include("conn.php");



if ($_SESSION['staff']==true){
	$sql = ("SELECT id,first_name,last_name,degree,department,address,phone,email,rating,points,count,image FROM ulm_teachers");
	$stmt=$conn->prepare($sql);
	$stmt->execute();
	$stmt->bind_result($id,$first_name,$last_name,$degree,$department,$address,$phone,$email,$rating,$points,$count,$image);
	while($stmt->fetch()) {
		
	 $email=trim($email);
	if(strcmp($_SESSION['email'],$email)==0){?>
		<h1 style="margin-left: 20px;">Profile</h1>


		<div class="box" style="height: 225px; width: 1000px;">
		<div style="float: left;">
  				<div style="margin-left: 20px;"><?php echo "<h2>".$first_name ." ".$last_name. "</h2>"; ?></div>
  				
	        	<div style="margin-left: 20px;"><?php echo "Degree: ".$degree; ?> </div>
	        	<div style="margin-left: 20px;"><?php echo "</br>";?></div>
	        	<div style="margin-left: 20px;"><?php echo "Department: ".$department;?></div>
	        	<div style="margin-left: 20px;"><?php echo "</br>";?></div>
	        	<div style="margin-left: 20px;"><?php echo "Address: ".$address;?></div>
	        	<div style="margin-left: 20px;"><?php echo "</br>";?></div>
	        	<div style="margin-left: 20px;"><?php echo "Phone: ".$phone;?></div>
	        	<div style="margin-left: 20px;"><?php echo "</br>";?></div>
	        	<div style="margin-left: 20px;"><?php echo "Email: ".$email;?></div>
	        	<div style="margin-left: 20px;"><?php echo "</br>";?></div>
	        	<div style="margin-left: 20px;"><?php echo "Points:". $points;?></div>
	        	<div style="margin-left: 20px;"><?php echo "</br>";?></div>
	        	<div style="margin-left: 20px;"><?php echo "Rating: ". $rating." out of 5"." (by ".$count." votes.)";?></div>
				<div style="margin-left: 20px;"><?php echo "<br>Thank you for rating!!!  ".$first_name." got ". $_SESSION['star']." stars from you.";?></div>

	        	<div style="margin-left: 20px;"><?php echo "</br>";?></div>

	        	</div>
	        	<?php
	        	//displaying users profile image
	        	$final_image= strrchr($image,"upload"); ?>
	        	<br>
				<div style=" float: right; border-style: solid; border-color: black; height: 200px;width: 200px; margin-right: 385px;">
				 <?php echo '<img style="margin-right:385px; margin-bottom=20px;" src="'.$final_image.' "height=200px width=200px "">'; 
				echo "<br>"; ?>

				<div style="float: right; height: 50px;width: 175px">
				<form  method="POST" enctype="multipart/form-data">
					<div>
					(Profile Image)
		
					<input type ="file" name="image">
					</div>
				<div>
					<input type="submit" name="submit_1" value= "Post" >		
				</div>	
				</form>
				</div>

				</div>
	 </div> 

<br>

<?php
ob_start();

				$_SESSION['id']=$id;
				$_SESSION['radio']= "t";

	        	// Uploading the image into the upload folder.
	       if (isset($_POST['submit_1'])){
	        	
	        		$uploaddir = 'upload/';
					define ('SITE_ROOT', realpath(dirname(__FILE__)));
					$uploadfile = SITE_ROOT.'/upload/'. basename($_FILES['image']['name']);
					$uploadfile=str_replace(' ','|',$uploadfile);
					$image = $uploadfile;


		if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
		    echo "UPLOAD SUCCESSFUL";

			
			// taking the uploaded file to the database.
			$stmt1 = $conn3->prepare("UPDATE ulm_teachers SET image=? WHERE first_name = ? AND last_name=?");
				$stmt1->bind_param('sss',$image,$first_name,$last_name);
				$stmt1->execute(); 
				$stmt1->close();
				ob_start();
				header('Location: view.php?email='.$email.'');
			}
		else {
		    echo "Possible file upload attack!\n";
		}
  }

  
	        	
	        	
	        	$_SESSION['first_name']=$first_name;
	        	$_SESSION['last_name']=$last_name;

	   
				if (isset($_POST['submit_2'])){
				
					
					$sql1 = ("SELECT id,rating,count,total_rating,points FROM ulm_teachers WHERE first_name=? AND last_name=?");
					$stmt_count=$conn2->prepare($sql1);
					$stmt_count->bind_param('ss',$first_name,$last_name);
					$stmt_count->execute();
					$stmt_count->bind_result($id,$rating,$count,$total_rating,$points);
					$stmt_count->fetch();
					$points=$points+($_POST['star']*5);
					$count=$count+1;
					$total_rating+=$_POST['star'];
					$average_rating = $total_rating/$count;
					$average_rating= round($average_rating,1);
				



				
				$stmt1 = $conn4->prepare("UPDATE ulm_teachers SET count = ?,total_rating=? , rating=? , points=? WHERE first_name = ? AND last_name=?");
				$stmt1->bind_param('iidiss',$count,$total_rating,$average_rating,$points,$first_name,$last_name);
				$stmt1->execute(); 
				$stmt1->close();
				$_SESSION['count']=$count;
				$_SESSION['star']=$_POST['star'];
				$_SESSION['$average_rating']=$average_rating;
				header('Location:view_2.php');


	}
  }
}




	//Comments section
?>


<div style="float: left;height:250px;width:1000px; position:absolute;margin-left: 70px;margin-top: 300px;">
<h2>Comments:</h2>
<hr>
  <form method='post' action="">
   <input  type="text" id="username" name="username" placeholder="Your Name">
   <br>
   <br>
  <textarea rows="4" cols="50";padding: 8px;border: 3px solid #cccccc;line-height: 130%; id="comment" name="comment" placeholder="Write Your Comment Here....."></textarea>
  <br>
  <input type="submit" name="submit" value="Post Comment">
  </form>
  </div>




<?php
if(isset($_POST['comment']) && isset($_POST['username'])){
  if (isset($_POST['submit'])){
  $comment=$_POST['comment'];
  $name=$_POST['username'];

    $insert= $conn2->prepare("INSERT INTO comments(person_id,radio,name,comment,post_time) VALUES (?,?,?,?,?)");
    $insert->bind_param ('issss', $_SESSION['id'],$_SESSION['radio'],$name,$comment,$CURRENT_TIMESTAMP);
    $insert->execute();
}
}



	$comm = ("SELECT name,comment,post_time FROM comments WHERE person_id=? AND radio=?");
    $stmt=$conn3->prepare($comm);
    $stmt->bind_param('is',$_SESSION['id'],$_SESSION['radio']);
    $stmt->execute();
    $stmt->bind_result($name,$comment,$post_time);
    if ($email= $_SESSION['email']){?>
    	<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>

    	
 <?php  while($stmt->fetch()){  ?> 
	
	
 <hr>
	<div style="margin-left: 20px; font-size: 18px;">  Posted By:<?php echo $name;?> </div>
	  <br>
    <div style="margin-left: 20px; color: black;">   <?php echo $comment;?>	</div>
      <br>
	<div style="margin-left: 20px;"> <?php echo $post_time;?> </div>
	 <br>
	
	  <br>


<?php 
}}}




else {

	ob_start();
	$sql = ("SELECT id,first_name,last_name,major,email,rating,points,count,image FROM ulm_students");
	$stmt=$conn->prepare($sql);
	$stmt->execute();
	$stmt->bind_result($id,$first_name,$last_name,$major,$email,$rating,$points,$count,$image);
	while($stmt->fetch()) {
	 $email=trim($email);
	if(strcmp($_SESSION['email'],$email)==0){ ?>

		<h1 style="margin-left: 20px;">Profile</h1>


		<div class="box" style="height: 225px; width: 1000px;">
		<div style="float: left;">
  				<div style="margin-left: 20px;"><?php echo "<h2>".$first_name ." ".$last_name. "</h2>"; ?></div>
	        	<div style="margin-left: 20px;"><?php echo "Major: ".$major; ?> </div>
	        	<div style="margin-left: 20px;"><?php echo "</br>"; ?> </div>
	        	<div style="margin-left: 20px;"><?php echo "Email: ".$email; ?> </div>
	        	<div style="margin-left: 20px;"><?php echo "</br>"; ?>	</div>
	        	<div style="margin-left: 20px;"><?php echo "Points:". $points; ?> 	</div>
	        	<div style="margin-left: 20px;"><?php echo "</br>"; ?>	</div>
	        	<div style="margin-left: 20px;"><?php echo "Rating: ". $rating." out of 5"." (by ".$count." votes.)"; ?>  </div>
				<div style="margin-left: 20px;"><?php echo "<br>Thank you for rating!!!  ".$first_name." got ". $_SESSION['star']." stars from you.";?> </div>
	        	</div>
	        	<?php
	        	echo "</br>";


	        	//displaying users profile image
	        	$final_image= strrchr($image,"upload"); ?>
	        	<br>
				<div style=" float: right; border-style: solid; border-color: black; height: 200px;width: 200px; margin-right: 385px;">
				 <?php echo '<img style="margin-right:385px; margin-bottom=20px;" src="'.$final_image.' "height=200px width=200px "">'; 
				echo "<br>"; ?>

				<div style="float: right; height: 50px;width: 175px">
				<form  method="POST" enctype="multipart/form-data">
					<div>
					(Profile Image)
		
					<input type ="file" name="image">
					</div>
				<div>
					<input type="submit" name="submit_1" value= "Post" >		
				</div>	
				</form>
				</div>

		</div>
		</div>


<br>




<?php

	       // Uploading the image into the upload folder.
	       if (isset($_POST['submit_1'])){
	        	
	        		$uploaddir = 'upload/';
					define ('SITE_ROOT', realpath(dirname(__FILE__)));
					$uploadfile = SITE_ROOT.'/upload/'. basename($_FILES['image']['name']);
					$uploadfile=str_replace(' ','|',$uploadfile);
					$image = $uploadfile;


		if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
		    echo "UPLOAD SUCCESSFUL";
			// taking the uploaded file to the database.
			$stmt1 = $conn3->prepare("UPDATE ulm_students SET image=? WHERE first_name = ? AND last_name=?");
				$stmt1->bind_param('sss',$image,$first_name,$last_name);
				$stmt1->execute(); 
				$stmt1->close();
				header('Location: view.php?email='.$email.'');
			}
		else {
		    echo "Possible file upload attack!\n";
		}
  }
  ?>



<?php

				$_SESSION['id']=$id;
				$_SESSION['radio']= "s";

	        	$_SESSION['first_name']=$first_name;
	        	$_SESSION['last_name']=$last_name;

	   
				if (isset($_POST['submit_2'])){
				
					
					$sql1 = ("SELECT rating,count,total_rating,points FROM ulm_students WHERE first_name=? AND last_name=?");
					$stmt_count=$conn3->prepare($sql1);
					$stmt_count->bind_param('ss',$first_name,$last_name);
					$stmt_count->execute();
					$stmt_count->bind_result($rating,$count,$total_rating,$points);
					$stmt_count->fetch();
					$points=$points+($_POST['star']*5);
					$count=$count+1;
					$total_rating+=$_POST['star'];
					$average_rating = $total_rating/$count;
					$average_rating= round($average_rating,1);


				
				$stmt1 = $conn2->prepare("UPDATE ulm_students SET count = ?,total_rating=? , rating=? , points=? WHERE first_name = ? AND last_name=?");
				$stmt1->bind_param('iidiss',$count,$total_rating,$average_rating,$points,$first_name,$last_name);
				$stmt1->execute(); 
				$stmt1->close();
				$_SESSION['count']=$count;
				$_SESSION['star']=$_POST['star'];
				$_SESSION['$average_rating']=$average_rating;
				header('Location:view_2.php');
			}
		}
	        	
		}

//Comments section
?>

		<html>
<head>
<link rel="stylesheet" type="text/css" href="css/comment_style.css">
</head>
<body>
<div style="float: left;height:250px;width:1000px; position:absolute;margin-left: 70px;margin-top: 200px;">
<h2>Comments:</h2>
<hr>
  <form method='post' action="">
   <input  type="text" id="username" name="username" placeholder="Your Name">
   <br>
   <br>
  <textarea rows="4" cols="50";padding: 8px;border: 3px solid #cccccc;line-height: 130%; id="comment" name="comment" placeholder="Write Your Comment Here....."></textarea>
  <br>
  <input type="submit" name="submit" value="Post Comment">
  </form>
  </div>

  <div id="all_comments">
  </div>

</body>
</html>


<?php
include_once('conn.php');
if(isset($_POST['comment']) && isset($_POST['username'])){
  if (isset($_POST['submit'])){
  $comment=$_POST['comment'];
  $name=$_POST['username'];

    $insert= $conn2->prepare("INSERT INTO comments(person_id,radio,name,comment,post_time) VALUES (?,?,?,?,?)");
    $insert->bind_param ('issss', $_SESSION['id'],$_SESSION['radio'],$name,$comment,$CURRENT_TIMESTAMP);
    $insert->execute();
}
}



	$comm = ("SELECT name,comment,post_time FROM comments WHERE person_id=? AND radio=?");
    $stmt=$conn3->prepare($comm);
    $stmt->bind_param('is',$_SESSION['id'],$_SESSION['radio']);
    $stmt->execute();
    $stmt->bind_result($name,$comment,$post_time);
    if ($email= $_SESSION['email']){?>
    	<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>

    	
 <?php  while($stmt->fetch()){  ?> 
	
	
 <hr>
	<div style="margin-left: 20px; font-size: 18px;">  Posted By:<?php echo $name;?> </div>
	  <br>
    <div style="margin-left: 20px; color: black;">   <?php echo $comment;?>	</div>
      <br>
	<div style="margin-left: 20px;"> <?php echo $post_time;?> </div>
	 <br>
	
	  <br>


<?php 
}}}



include("conn.php");


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
