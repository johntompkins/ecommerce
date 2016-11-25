
<?php
    $db = mysqli_connect('jtto224.netlab.uky.edu','root','dot.pan-79','Ecomm', 3306) or die('Error connecting to MySQL server.');
    session_start();
     $whereQuer = "select i.`cid`, i`.pid`, o.`total`, o.`status` 
FROM in_cart i, order o, Product p
WHERE o.`cartID`=i.`cartid` 
and p.`pid`=i.`pid` ";
            if(mysqli_query($db, $whereQuer)){
              $result = mysqli_query($db, $whereQuer);
              echo "
<h2><a href ='landing_staff.php'>Return to staff options</a></h2>
<br><table border = '0' style='float: left'><tr><th>Customer ID</th></th><th>Products</th><th> Total Price</th> <th>Status</th></tr>";
              while($row = $result->fetch_assoc()){
                $disPrice = $row['price'] * (1 - (.01 * $row['discount']));
                echo "<tr> <td> ".$row['cid']." <td>".$row['pid']."</td> <td>".$row['total']."</td> <td>".$row['status']."</td>
                    
		<td><form method= 'POST' action='update_status.php ' > <button class = 'btn btn-lg btn-primary btn-block formel' type = 'submit' name='status' value='".$row['status']."'>Ship It </button></form>
 </td>
   </tr>";
              }
              echo "</table> <br> ";
            }
            else{
              echo "<br><p> Error in query!</p>";
            }

?>
