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
				<span>Spread the WEB <span class="bp-icon bp-icon-about" data-content="Post a job"></span></span>
				<h1>ULM Spider</h1>

				<div class="menu" style="background: #47a3da; float: right; border-radius: 3px;margin-right: 80px;">
			<h3>
				<?php $new_location= dirname("/test/job") . PHP_EOL;
				
				  ?>
				<a style="float: right; margin-right: 30px; color: white; " href="view_applicants_box.php">Applicants for the job </a> 
				<a style="float: right;  margin-right: 30px; color: white; " href="post_a_job.php">Post A Job </a>  &nbsp &nbsp
				<a style="float: right;  margin-right: 30px; color: white;" href="<?echo $new_location?>">Home </a> &nbsp &nbsp
			</h3> </div>


	

		
			</header>	

				<!search box>


 


<! sign in sign up>


<div class="sign_in" style="float: left; margin-left: 150px; margin-top: 20px;" >
<h2>Login to post a job</h2>

<h2 style="float: left;">Sign In:</h2>

	<form action= "" method="post">
		<div class="field" style="margin-right: 300px;  float: left;">
			<label for="username"> Username </label>
			<input type="text" name="username1" id="username1" autocomplete="off">
		 <br>
			<label for="password"> Password </label>
			<input style="margin-left: 4px;" type="password" name="password1" id="password1" autocomplete="off">
		<br>
			<input type="submit"  value= "Login" >		
		</div>	


	</form>
</div>

<!sign up>
<div class="sign_up" style="float:right; margin-right: 150px; margin-top: 50px; ">
	<h3>SIGN UP </h3>
	<form action= "" method="post">
		<div class="field">
			<label for="username"> Username </label>
			<input type="text" name="username" id="username" autocomplete="off" style="margin-left: 64px;">
		</div>	

		<div class="field">
			<label for="email"> Email Id </label>
			<input type="text" name="email" id="email" autocomplete="off" style="margin-left: 80px;">
		</div>	

		<div class="field">
			<label for="password"> Password </label>
			<input type="password" name="password" id="password" autocomplete="off" style="margin-left: 68px;">
		</div>	

		<div class="field">
			<label for="confpassword"> Conform Password </label>
			<input type="password" name="confpassword" id="confpassword" autocomplete="off" style="margin-left: 2px;">
		</div>	

		<div>		
			<input type="submit"  value= "Sign up" style="border-radius: 3px; color:#47a3da; width: 75px; margin-top: 6px;">		
		</div>	

	</form>
	</div>

</body>

<?php
//signin
session_start();
include ("connect.php");
if (!empty($_POST)) {
	if (isset($_POST['username1'],$_POST['password1']))
	{

		$username1    = strtolower(trim($_POST['username1']));
		$password1 	  = strtolower(trim($_POST['password1']));


		if (!empty($username1)  && (!empty($password1)) )
		{	
			$sql = "SELECT id,username,password FROM signup WHERE username=? AND password=?" ; 
			$stmt= $db->prepare($sql);
			$stmt-> bind_param('ss',$username1,$password1);
			$stmt-> execute();
			$stmt-> bind_result($id,$username,$password);

			if($stmt->fetch()) {
				$_SESSION['username'] = $username;
				$_SESSION['user_id'] = $id;
				$_SESSION['login_status']= true;

				header ('Location:description.php');


			}	
			else {
				?> <div style="margin-left: 150px; margin-top: 10px; color: red;"><?php echo "User credential not found"; ?></div>
				<?php
			}	

		}
		else {
			?> <div style="margin-left: 150px;margin-top: 10px; color: red;"><?php echo "Field empty"; ?></div>
				<?php
			 }

		}
	}	


?>


<?php
ob_start();
//signup
include ("security.php");
include ("connect.php");


if (!empty($_POST)) {
	if (isset($_POST['username'],$_POST['email'],$_POST['password'],$_POST['confpassword'])){

		$username    = strtolower(trim($_POST['username']));
		$email       = strtolower(trim($_POST['email']));
		$password 	 = strtolower(trim($_POST['password']));
		$confpassword= strtolower(trim($_POST['confpassword']));

		$data_u=true;
		$data_e=true;
		$sqll = ("SELECT id,username,email FROM signup");
		$stmtt=$db->prepare($sqll);
		$stmtt->execute();
		$stmtt->bind_result($data_id,$data_username,$data_email);
		while($stmtt->fetch()) {
			if ($data_username==$username ){
				
				$data_u=false;
			}   
			if ($data_email==$email){
				
				$data_e=false;
			}
		}
		if (!empty($username)) {

				if (!empty($email)) {

					if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

						if (!empty($password)) {

							if (!empty($confpassword)) {


								if ($password==$confpassword){

									if ($data_u==true){

											if ($data_e==true){
	
			$insert= $db->prepare("INSERT INTO signup(username,email,password,confpassword) VALUES (?,?,?,?)");
			$insert->bind_param ('ssss', $username,$email,$password,$confpassword);
			
			if($insert->execute())
			{
					?><div style=" margin-left: 770px;"><?php echo "Successfully created new credential.";?></div>
										<?php

				
							}
								}
										else{
											?><div style="color:red; margin-left: 770px;">This email has already been registered</div><?php
										}
									}
										else{
											?><div style="color:red; margin-left: 770px;">This username is already taken</div><?php
										}
									}
									else {
										?><div style="color: red; margin-left: 770px;"><?php echo "Password not matched.";?></div>
										<?php
										 }
								}
								else {
									?><div style="color: red; margin-left: 770px;"><?php echo "Enter conform password";?></div>
										<?php
									 }		
							}

							else {
								?><div style="color: red; margin-left: 770px;"><?php echo "Enter password.";?></div>
										<?php
								 }

						}
						else {
							?><div style="color: red; margin-left: 770px;"><?php echo "Enter a valid email.";?></div>
										<?php
							 }
					}
					else {
						?><div style="color: red; margin-left: 770px;"><?php echo "Enter a email.";?></div>
										<?php
						 }
				}
			else {
				?><div style="color: red; margin-left: 770px;"><?php echo "Enter a username.";?></div>
										<?php
				 }

		}
	}
?>



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



