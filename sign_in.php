<!DOCTYPE html>

<html>
	<head>
		<title>The Spider</title>
		 <link rel="stylesheet" type="text/css" href="style.css">
	</head>
<body>
<div class="sign_in">

	
	<form action= "" method="post">
		<div class="field">
		<h3 style="margin-left: 250px;">SIGN IN</h3>
		
			<label for="username"> Username </label>
			<input type="text" name="username1" id="username1" autocomplete="off">
			&nbsp &nbsp &nbsp &nbsp
			<label for="password"> Password </label>
		    <input type="password" name="password1" id="password1" autocomplete="off" style="margin-left: 4px;">
		&nbsp &nbsp 
			<input type="submit"  value= "Login" style="border-radius: 3px; color:#47a3da; width: 60px; margin-top: 10px; ">		
		</div>	


	</form>
</div>
</body>
</html>

<?php

session_start();
include ("connect.php");

if (!empty($_POST)) {
	if (isset($_POST['username1'],$_POST['password1']))
	{

		$username1    = strtolower(trim($_POST['username1']));
		$password1 	  = strtolower(trim($_POST['password1']));


		if (!empty($username1)  && (!empty($password1)) )
		{	
			$sql = "SELECT id,email,username,password FROM signup WHERE username=? AND password=?" ; 
			$stmt= $db->prepare($sql);
			$stmt-> bind_param('ss',$username1,$password1);
			$stmt-> execute();
			$stmt-> bind_result($id,$email,$username,$password);

			if($stmt->fetch()) {
				$_SESSION['username'] = $username;
				$_SESSION['email'] = $email;
				$_SESSION['user_id'] = $id;
				$_SESSION['login_status']= true;

				header ('Location:login_index.php');


			}	
			else {

			 ?> <div="message" style="color: red;margin-right: 300px; margin-left: 378px;margin-top:10px;float:right;">User Not Found</p>
		<?php
			}	

		}
		else {?>
			<div="message" style="color: red;margin-right: 300px; margin-left: 378px;margin-top:10px;float:right;">Field Empty</p>
			<?php }

		}
	}	


?>

