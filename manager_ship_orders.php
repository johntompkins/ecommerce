

<?php
    $db = mysqli_connect('jtto224.netlab.uky.edu','root','dot.pan-79','Ecomm', 3306) or die('Error connecting to MySQL server.');
    session_start();
     $whereQuer = "select i.`cid`, i.`pid`, o.`total`, o.`status`, i.`cartid`
FROM in_cart i, orders o, Product p
WHERE o.`cartid`=i.`cartid`
and o.`cid`=i.`cid`
and p.`pid`=i.`pid`
group by `cid`,`cartid`  ";
            if(mysqli_query($db, $whereQuer)){
              $result = mysqli_query($db, $whereQuer);
              echo "
<h2><a href ='landing_manager.php'>Return to manager options</a></h2>
<br><table border = '0' style='float: left'><tr><th>Customer ID</th><th>Cart ID </th></th><th>Products</th><th> Total Price</th> <th>Status</th></tr>";
              while($row = $result->fetch_assoc()){

//              if($row['status'] = 0){

                //$disPrice = $row['price'] * (1 - (.01 * $row['discount']));
                echo "<tr> <td> ".$row['cid']." <td> ".$row['cartid']."</td><td> <form method='POST' action='vieworder_manager.php'> <button class = 'btn btn-lg btn-primary btn-block' value='".$row['cartid']."' type = 'submit' name = 'cart' > View Order</button> </form> </td> <td>".$row['total']."</td> <td>".$row['status']."</td>

                <td><form method= 'POST' action='update_status.php'> <button type='submit' name='status' value='".$row['cartid']."'>Ship It </button></form>
 </td>
   </tr>";
              }//}
              echo "</table> <br> ";
            }
            else{
              echo "<br><p> Error in query!</p>";
            }
?>

