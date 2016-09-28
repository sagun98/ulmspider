
<?php
	if 	($_SESSION['login_status']==true){
		header('Location: job/description.php');
	}
	else {
		header('Location: poster.php');
	}

?>