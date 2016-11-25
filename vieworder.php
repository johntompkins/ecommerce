<html><body>
<?php
            $db = mysqli_connect('jtto224.netlab.uky.edu','root','dot.pan-79','Ecomm', 3306) or die('Error connecting to MySQL server.');
            include('session.php');
            $usr = $_SESSION['user_login'];
            echo "<h1>".$usr."'s order</h1>";
            $cartid = $_POST['cart'];
            $itemQuery = "SELECT `pname`, `in_cart`.`quantity`, `discount`, `price` FROM `in_cart` INNER JOIN `Product` ON (`Product`.`pid` = `in_cart`.`pid`) WHERE `in_cart`.`cartid` = '$cartid';";
            $result = mysqli_query($db, $itemQuery);
            echo "<br><table border = '0' style='float: left'><tr><th>Image</th><th>Name</th><th>Original Price</th><th> Discounted Price</th> <th>Quantity</th></tr>";
            $sum = 0;

            while($row = $result->fetch_assoc()){
                          $disPrice = $row['price'] * (1 - (.01 * $row['discount']));
                          $sum += $disPrice * $row['quantity'];
                          echo "<tr> <td> <img class='formel' src ='http://lorempixel.com/100/100/''></td> <td>".$row['pname']."</td> <td>".$row['price']."</td> <td>".$disPrice."</td> <td>".$row['quantity']."</td>
                                </tr>";
                  }










?>

</td><td></td></tr> </table>
<h2><a href = "logout.php">Sign Out</a></h2>
</body>
</html>
