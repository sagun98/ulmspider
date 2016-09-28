
<?php
//error_reporting(0);
session_start();
include("conn.php");
include("header.php");

$_SESSION['email']=$_GET['email'];



if ($_SESSION['staff']==true){
	$sql = ("SELECT id,first_name,last_name,degree,department,address,phone,email,rating,points,count,image FROM ulm_teachers");
	$stmt=$conn->prepare($sql);
	$stmt->execute();
	$stmt->bind_result($id,$first_name,$last_name,$degree,$department,$address,$phone,$email,$rating,$points,$count,$image);
	while($stmt->fetch()) {
		
	 $email=trim($email);
	if(strcmp($_GET['email'],$email)==0){
		echo "<h1>Profile</h1>";
  				echo "<h2>".$first_name ." ".$last_name. "</h2>";
	        	echo "Degree: ".$degree;
	        	echo "</br>";
	        	echo "Department: ".$department;
	        	echo "</br>";
	        	echo "Address: ".$address;
	        	echo "</br>";
	        	echo "Phone: ".$phone;
	        	echo "</br>";
	        	echo "Email: ".$email;
	        	echo "</br>";
	        	echo "Points:". $points;
	        	echo "</br>";
	        	echo "Rating: ". $rating." out of 5"." (by ".$count." votes.)";
	        	echo "</br>";
	        	
	        	//displaying users profile image
	        	$final_image= strrchr($image,"upload");
	        	echo "<br>";
				echo '<img src="'.$final_image.' "height=200px width=200px "">';
				echo "<br>";
		
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/style_user.css">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<title></title>
</head>
<body>
<div class="stars">
  <form action="" method="post" >
    <input class="star star-5" id="star-5" type="radio" name="star" value="5" />
    <label class="star star-5" for="star-5"></label>
    <input class="star star-4" id="star-4" type="radio" name="star" value="4"/>
    <label class="star star-4" for="star-4"></label>
    <input class="star star-3" id="star-3" type="radio" name="star" value="3"/>
    <label class="star star-3" for="star-3"></label>
    <input class="star star-2" id="star-2" type="radio" name="star" value="2"/>
    <label class="star star-2" for="star-2"></label>
    <input class="star star-1" id="star-1" type="radio" name="star" value="1"/>
    <label class="star star-1" for="star-1"></label>
    <input type="submit" name="submit_2" value= "Rate"<?php $first_name?> >
  </form>
</div>
<br>

<form  method="POST" enctype="multipart/form-data" >
<div>
		(Profile Image)
		<input type ="file" name="image">
	</div>
<div>
			<input type="submit" name="submit_1" value= "Post" >		
	</div>	
	</form>
</body>
</html>
<?php

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
	include("comments.php");
	$comm = ("SELECT name,comment,post_time FROM comments WHERE person_id=? AND radio=?");
    $stmt=$conn3->prepare($comm);
    $stmt->bind_param('is',$_SESSION['id'],$_SESSION['radio']);
    $stmt->execute();
    $stmt->bind_result($name,$comment,$post_time);
    if ($email= $_SESSION['email']){

   while($stmt->fetch()){  ?> 
	
	<div class="comment_div"> 
  
	  <p class="name">Posted By:<?php echo $name;?></p>
      <p class="comment"><?php echo $comment;?></p>	
	  <p class="time"><?php echo $post_time;?></p>
	</div>

<?php 
}}}




else {
	$sql = ("SELECT id,first_name,last_name,major,email,rating,points,count,image FROM ulm_students");
	$stmt=$conn->prepare($sql);
	$stmt->execute();
	$stmt->bind_result($id,$first_name,$last_name,$major,$email,$rating,$points,$count,$image);
	while($stmt->fetch()) {
	 $email=trim($email);
	if(strcmp($_SESSION['email'],$email)==0){
		echo "<h1>Profile</h1>";
  				echo "<h2>".$first_name ." ".$last_name. "</h2>";
	        	echo "Major: ".$major;
	        	echo "</br>";
	        	echo "Email: ".$email;
	        	echo "</br>";
	        	echo "Points:". $points;
	        	echo "</br>";
	        	echo "Rating: ". $rating." out of 5"." (by ".$count." votes.)";
	        	echo "</br>";

	        	//displaying users profile image
	        	$final_image= strrchr($image,"upload");
	        	echo "<br>";
				echo '<img src="'.$final_image.' "height=200px width=200px "">';
				echo "<br>";


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

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/style_user.css">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<title></title>
</head>
<body>
<div class="stars">
  <form action="" method="post" >
    <input class="star star-5" id="star-5" type="radio" name="star" value="5" />
    <label class="star star-5" for="star-5"></label>
    <input class="star star-4" id="star-4" type="radio" name="star" value="4"/>
    <label class="star star-4" for="star-4"></label>
    <input class="star star-3" id="star-3" type="radio" name="star" value="3"/>
    <label class="star star-3" for="star-3"></label>
    <input class="star star-2" id="star-2" type="radio" name="star" value="2"/>
    <label class="star star-2" for="star-2"></label>
    <input class="star star-1" id="star-1" type="radio" name="star" value="1"/>
    <label class="star star-1" for="star-1"></label>
    <input type="submit" name="submit_2" value= "Rate"<?php $first_name?> >
  </form>
</div>
<br>

<form  method="POST" enctype="multipart/form-data" >
<div>
		(Profile Image)
		<input type ="file" name="image">
	</div>
<div>
			<input type="submit" name="submit_1" value= "Post" >		
	</div>	
	</form>
</body>
</html>

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
	include("comments.php");
	$comm = ("SELECT name,comment,post_time FROM comments WHERE person_id=? AND radio=?");
    $stmt=$conn3->prepare($comm);
    $stmt->bind_param('is',$_SESSION['id'],$_SESSION['radio']);
    $stmt->execute();
    $stmt->bind_result($name,$comment,$post_time);
    if ($email= $_SESSION['email']){

   while($stmt->fetch()){  ?> 
	
	<div class="comment_div"> 
  
	  <p class="name">Posted By:<?php echo $name;?></p>
      <p class="comment"><?php echo $comment;?></p>	
	  <p class="time"><?php echo $post_time;?></p>
	</div>

<?php 
}}}

	


?>





