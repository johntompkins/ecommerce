<?php
        $db = mysqli_connect('localhost','root','dot.pan-79','Ecomm') or die('Error connecting to MySQL server.');
         include('session.php');
?>
<html>
   <head>
      <title>Books and Games store : account page</title>
   </head>
   <body>
      <h1>Hello! Account <?php  echo $_SESSION['user_login']?>'s page</h1>
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>

</html>
