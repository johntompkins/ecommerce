<html><body>
<?php
            $db = mysqli_connect('jtto224.netlab.uky.edu','root','dot.pan-79','Ecomm', 3306) or die('Error connecting to MySQL server.');
            include('session.php');
            $usr = $_SESSION['user_login'];
            echo "<h1>".$usr."'s orders</h1>";
            $query = "SELECT * FROM `orders` WHERE `cid` = '$usr' ORDER BY `date`;";
            $sum = 0;
            if(mysqli_query($db, $query)){

                  $result = mysqli_query($db, $query);


                  echo "<br><table border = '0' style='float: left'><tr><th>Order Date</th><th>Price</th><th>Status</th><th> View Order</th></tr>";

                  while($row = $result->fetch_assoc()){
                          $status = "Pending";
                          if($row['status']){
                            $status = "Shipped";
                          }

                          echo "<tr><td>".$row['date']."</td> <td>".$row['total']."</td><td>".$status."</td> <td> <form method='POST' action='vieworder.php'> <button class = 'btn btn-lg btn-primary btn-block' value='".$row['cartid']."' type = 'submit' name = 'cart' > View Order</button> </form></td></tr>";
                        }


            }






?>
</table>
<h2><a href = "logout.php">Sign Out</a></h2>
<h2><a href = "landing.php">Home</a></h2>
</body>
</html>
