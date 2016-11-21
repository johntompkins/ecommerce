<?php
        $db = mysqli_connect('jtto224.netlab.uky.edu','root','dot.pan-79','Ecomm', 3306) or die('Error connecting to MySQL server.');
         include('session.php');
?>
<html>
   <head>
      <title>Employee page</title>
   </head>
   <body>
      <h1>Hello! Account <?php  echo $_SESSION['user_login']?>'s page</h1>
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>

      <h4> Employee's have ability to :</h4>
    <form method="link" ACTION="staff_search_store.php">
      <input type="submit" VALUE="Check Inventory">
      </form>

	<form method="link" ACTION="staff_restock_store.php">
      <input type="submit" VALUE="Restock store">
      </form>

        <form method="link" ACTION="all_orders.php">
      <input type="submit" VALUE="View all orders">
      </form>

	   <form method="link" ACTION="staff_ship_orders.php">
      <input type="submit" VALUE="Ship orders to customers">
      </form>


</html>
