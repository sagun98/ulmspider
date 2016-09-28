
<?php

include ("security.php");
include ("connect.php");


if (!empty($_POST)) {
	if (isset($_POST['username'],$_POST['email'],$_POST['password'],$_POST['confpassword'])){
		
		$username    = strtolower(trim($_POST['username']));
		$email       = strtolower(trim($_POST['email']));
		$password 	 = strtolower(trim($_POST['password']));
		$confpassword= strtolower(trim($_POST['confpassword']));
		$password_length=strlen($password);

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

									if ($password_length>=6) {

										if ($data_u==true){

											if ($data_e==true){
	
			$insert= $db->prepare("INSERT INTO signup(username,email,password,confpassword) VALUES (?,?,?,?)");
			$insert->bind_param ('ssss', $username,$email,$password,$confpassword);
			
			if($insert->execute())
			{
				$_SESSION['user_name']=$username;
				$_SESSION['email']=$email;
				echo "You have sucessfully registered.";
				
			}
										}
										else{
											?><div style="color:red; margin-left: 70px;">This email has already been registered</div><?php
										}
									}
										else{
											?><div style="color:red; margin-left: 70px;">This username is already taken</div><?php
										}
									}
										else{
											?><div style="color:red; margin-left: 70px;">Password must be atleast 6 character.</div><?php
										 
										}
									}
									else {
										?><div style="color:red; margin-left: 100px;">Password not matched.</div><?php
										 }
								}
								else {
								?><div style="color:red; margin-left: 100px;">Enter Conform Password</div><?php
									 }		
							}

							else {
							?><div style="color:red; margin-left: 100px;">Enter Password.</div><?php
								 }

						}
						else {
							?><div style="color:red; margin-left: 100px;">Enter Valid Email.</div><?php
							 }
					}
					else {
						?><div style="color:red; margin-left: 100px;">Enter a Email.</div><?php
						 }
				}
			else {
				?><div style="color:red; margin-left: 100px;">Enter the Username.</div><?php
				 }

		}
	}




?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="sign_up">
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

<br>
<br>	
</form>
</div>
</body>
</html>