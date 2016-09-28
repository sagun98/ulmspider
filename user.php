
<?php

session_start();

if (isset($_SESSION['login_status']))
{
	echo "Hello " .$_SESSION['username'];
	
}

else {
	header("Location:index.php");

}
?>



<a style="float: right;" href= "logout.php">Log out </a>

<?php 
include ("job/post_a_job.php");
echo "<br>";
include ("job/view_applicants_box.php");
echo "<br>";
echo "<br>";
include ("job/job_div.php");
?>
<html>
 <head><title>Informo</title>
 <link rel="stylesheet" type="text/css" href="css/style_user.css">
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
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
 <div class="formbox">
      <h1>Search who ?</h1>
      
   	<form method="post">
		<div class="ui-widget" >
         Staffs 
         <label for="name"> Name </label>
		   <input type="text" name="name" id="name">
		   <input type="submit"  value= "Submit" >      
    </form>
     
      <form method="post">
         Students
         <label for="name1"> Name </label>
         <input type="text" name="name1" id="name1">
         <input type="submit"  value= "Submit" >      
      </div>   

      </form>
  
   </div>
   </body>
</html>




<?php

include ("conn.php");




if (!empty($_POST)){
	if (isset($_POST['name']) || isset($_POST['name1']) ) {
		$name = strtolower(trim(($_POST['name'])));
      $name1 = strtolower(trim(($_POST['name1'])));

	
      $_SESSION['name']=$name;
      $_SESSION['name1']=$name1;

				header ('Location: info.php');
				die();
			
			}}

   
?>
</form>
</body>
</html>