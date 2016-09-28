 <html>
 <head><title>Informo</title>

 <link rel="stylesheet" type="text/css" href="css/search.css">
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



  <section class="main">
   <form class="search" method="post" >
 
     <input type="text" name="name" id="name" placeholder="Search ULM staffs" />
     &nbsp &nbsp &nbsp &nbsp
     <input type="text" name="name1" id="name1" placeholder="Search ULM students" />
    <input type="submit"  value= "Search " style="border-radius: 3px; color:#47a3da; width: 80px; margin-top: 10px;" >    
   </form>
</section>
  
 
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

				header ('Location: info_info.php');
				die();
			
			}}
?>






