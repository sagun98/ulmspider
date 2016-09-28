<?php
//error_reporting(0);
session_start();
include("conn.php");
include("search_box.php");

	
if ($_SESSION['staff']==true){

	$sql = ("SELECT id,first_name,last_name,degree,department,address,phone,email,rating,points,image FROM ulm_teachers");
	$stmt=$conn->prepare($sql);
	$stmt->execute();
	$stmt->bind_result($id,$first_name,$last_name,$degree,$department,$address,$phone,$email,$rating,$points,$image);
	while($stmt->fetch()) {
		
	 $email=trim($email);
	if(strcmp($_SESSION['email'],$email)==0){
				
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
	        	echo "Rating: ". $rating." out of 5"." (by ".$_SESSION['count']." votes.)";
	        	echo "<br>Thank you for rating!!!  ".$first_name." got ". $_SESSION['star']." stars from you.";
	        	echo "</br>";
	        	echo "</br>";

	        		//displaying users profile image
	        	$final_image= strrchr($image,"upload");
	        	echo "<br>";
				echo '<img src="'.$final_image.' "height=200px width=200px "">';
				echo "<br>";
				echo "<br>";
				$_SESSION['id']=$id;
				$_SESSION['radio']= "t";


	      
// Uploading the image into the upload folder.
	       if (isset($_POST['submit_image'])){
	        	
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
				header('Location: view_2.php');
			}
		else {
		    echo "Possible file upload attack!\n";
		}
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
}}
}

else {
	$sql = ("SELECT id,first_name,last_name,major,email,rating,points,image FROM ulm_students");
	$stmt=$conn->prepare($sql);
	$stmt->execute();
	$stmt->bind_result($id,$first_name,$last_name,$major,$email,$rating,$points,$image);
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
	        	echo "Rating: ". $rating." out of 5"." (by ".$_SESSION['count']." votes.)";
	        	echo "<br>Thank you for rating!!!  ".$first_name." got ". $_SESSION['star']." stars from you.";
	        	echo "</br>";


	        		//displaying users profile image
	        	$final_image= strrchr($image,"upload");
	        	echo "<br>";
				echo '<img src="'.$final_image.' "height=200px width=200px "">';
				echo "<br>";
				$_SESSION['id']=$id;
				$_SESSION['radio']="s";


	        	// Uploading the image into the upload folder.
	       if (isset($_POST['submit_image'])){
	        	
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
				header('Location: view_2.php');
			}
		else {
		    echo "Possible file upload attack!\n";
		}
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
}}
}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="view_2.php" method="POST" enctype="multipart/form-data" >
<div>
		(Profile Image)
		<input type ="file" name="image">
	</div>
<div>
			<input type="submit" name="submit_image" value= "Post" >		
	</div>	
	</form>
</body>
</html>