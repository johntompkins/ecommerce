

<?php
    $db = mysqli_connect('jtto224.netlab.uky.edu','root','dot.pan-79','Ecomm', 3306) or die('Error connecting to MySQL server.');
    session_start();
     $whereQuer = "SELECT * FROM Product";
            if(mysqli_query($db, $whereQuer)){
              $result = mysqli_query($db, $whereQuer);
              echo "
<h2><a href ='landing_manager.php'>Return to manager options</a></h2>

<br><table border = '0' style='float: left'><tr><th>Image</th><th>Name</th><th>Original Price</th><th> Discounted Price</th> <th>Quantity</th></tr>";
              while($row = $result->fetch_assoc()){
                $disPrice = $row['price'] * (1 - (.01 * $row['discount']));
                echo "<tr> <td> <img class='formel' src ='http://lorempixel.com/100/100/''></td> <td>".$row['pname']."</td> <td>".$row['price']."</td> <td>".$disPrice."</td> <td>".$row['quantity']."</td>
                    
		<td><form method= 'POST' action='update_stock_manager.php ' > Update quantity:<input = 'text' name = 'quant'> <button class = 'btn btn-lg btn-primary btn-block formel' type = 'submit' name='pid' value='".$row['pid']."'>Update </button></form>
 </td>
   </tr>";
              }
              echo "</table>";
            }
            else{
              echo "<br><p> Error in query!</p>";
            }

?>
