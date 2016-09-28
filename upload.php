<html>
<head>
	<title>Submission From</title>
</head>
<body>
	<h2>Submission Form</h2>

<form action="upload.php" method="POST" enctype="multipart/form-data" >

	<div>
		(Copy 1)
		<input type ="file" name="upload1">
	</div>
	<br>
	<br>
	<div>
			<input type="submit"  value= "Submit" >		
	</div>	
</form>	
</body>
</html>
<?php 
include ("conn.php");



session_start();

		$uploaddir = 'upload/';
		define ('SITE_ROOT', realpath(dirname(__FILE__)));
		$uploadfile = SITE_ROOT.'/upload/'. basename($_FILES['upload1']['name']);
		$uploadfile=str_replace(' ','|',$uploadfile);
		$upload1 = $uploadfile;


		if (move_uploaded_file($_FILES['upload1']['tmp_name'], $uploadfile)) {
		    echo "work is donw pimp";
		} else {
		    echo "Possible 1 file upload attack!\n";
		}


?>



