
<?php

	if 	($_SESSION['login_status']==true){
		
		header('Location: job/applicants.php');
	}
	else {
		header('Location: poster_applicants.php');
	}

?>