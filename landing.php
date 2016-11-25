<?php
        $db = mysqli_connect('jtto224.netlab.uky.edu','root','dot.pan-79','Ecomm', 3306) or die('Error connecting to MySQL server.');
         include('session.php');
?>
<html>
   <head>
      <title>Books and Games store : account page</title>
   </head>
   <body>
      <h1>Hello! Account <?php  echo $_SESSION['user_login']?>'s page</h1>
      <h2><a href = "logout.php">Sign Out</a></h2>
      <table>
      <tr><th>Customer Options:</th><tr>
	<tr><td><form action="search.php"><input type="submit" value="Search store"/></form></td></tr>
	<tr><td><form action="cart.php"><input type="submit" value="View cart/submit orders"/></form></td></tr>
  <tr><td><form action="orderhistory.php"><input type="submit" value="View orders"/></form></td></tr>
	</table>

   </body>

</html>
