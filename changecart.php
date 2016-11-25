<html><body>
<?php
            $db = mysqli_connect('jtto224.netlab.uky.edu','root','dot.pan-79','Ecomm', 3306) or die('Error connecting to MySQL server.');
            include('session.php');
            $usr = $_SESSION['user_login'];
            echo "<h1> Change ".$usr."'s cart</h1>";
            $query = "SELECT `cartid` FROM `customer` WHERE `cid` = '$usr';";
            if(mysqli_query($db, $query)){

                  $result = mysqli_query($db, $query);
                  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                  $count = mysqli_num_rows($result);
                  if($count == 1){
                        $cartid = $row['cartid'];
                        $itemQuery = "SELECT `pname`, `in_cart`.`quantity`, `discount`, `price`, `Product`.`pid` FROM `in_cart` INNER JOIN `Product` ON (`Product`.`pid` = `in_cart`.`pid`) WHERE `in_cart`.`cid` = '$usr' AND `in_cart`.`cartid` = '$cartid';";
                        $result = mysqli_query($db, $itemQuery);
                        echo "<br><table border = '0' style='float: left'><tr><th>Image</th><th>Name</th><th>Original Price</th><th> Discounted Price</th> <th>Quantity</th> <th> New Quantity</th></tr>";
                        $sum = 0;
                        while($row = $result->fetch_assoc()){
                          $disPrice = $row['price'] * (1 - (.01 * $row['discount']));
                          $sum += $disPrice * $row['quantity'];
                          echo "<tr> <td> <img class='formel' src ='http://lorempixel.com/100/100/''></td> <td>".$row['pname']."</td> <td>".$row['price']."</td> <td>".$disPrice."</td> <td>".$row['quantity']."</td><td><form method='POST' action='updatecart.php'><input class='formel' type='text' name='upd'></td><td><button class = 'btn btn-lg btn-primary btn-block' value='".$row['pid']."' type = 'submit' name = 'add' >Change Quantity</button></td></form>
                                </tr>";
                        }
                        echo "<tr> <td></td><td></td><td>Total: </td><td>".$sum;


                  }


            }






?>

</td><td></td></tr> </table>
<h2><a href = "landing.php">Home</a></h2>
</body>
</html>
