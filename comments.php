<html>
<head>
<link rel="stylesheet" type="text/css" href="css/comment_style.css">
</head>
<body>
<div style="height:400px;width:1000px ; ">
  <form method='post' action="">
   <input type="text" id="username" name="username" placeholder="Your Name" style="margin-left: 20px;">
   <br>
   <br>
  <textarea id="comment" name="comment" placeholder="Write Your Comment Here....." style="margin-left: 20px;"></textarea>
  <br>
  <input type="submit" name="submit" value="Post Comment">
  </form>
  </div>

  <div id="all_comments">
  </div>

</body>
</html>


<?php
include_once('conn.php');
if(isset($_POST['comment']) && isset($_POST['username'])){
  if (isset($_POST['submit'])){
  $comment=$_POST['comment'];
  $name=$_POST['username'];

    $insert= $conn2->prepare("INSERT INTO comments(person_id,radio,name,comment,post_time) VALUES (?,?,?,?,?)");
    $insert->bind_param ('issss', $_SESSION['id'],$_SESSION['radio'],$name,$comment,$CURRENT_TIMESTAMP);
    $insert->execute();
}
}
?>


