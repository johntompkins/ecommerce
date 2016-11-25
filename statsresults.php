
<html>
<?php
  $db = mysqli_connect('jtto224.netlab.uky.edu','root','dot.pan-79','Ecomm', 3306) or die('Error connecting to MySQL server.');
 ?>
<head></head>
<style>
  .formel{
    display: block;
    float: left;
  }
</style>

<h2><a href = 'landing_manager.php'> Return to manager options </a></h2>
<h2><a href = 'logout.php'> Logout </a></h2>
<body>
  <div>
  <form method="POST" action="statsresults.php">
    <h4> View items/history</h4><br>
    <div class="formel" >
      <table>
      <tr><td><input type="radio"  class="formel" name="btype" value="1"> Week </td></tr>
      <tr><td><input type="radio" class="formel" name="btype" value="2" > Month </td></tr>
      <tr><td><input type="radio" class="formel" name="btype" value="0" checked> Year</td></tr>
      </table>
    </div>
    <button class = "btn btn-lg btn-primary btn-block formel" type = "submit"
             name = "search">View</button>
  </form>
  </div>

<?php 
            $type = $_POST['btype'];
           // $price = $_POST['price'];
            $whereQuer= " select p.`pid`, p.`pname`, p.`ptype`, p.`price`, o.`date`
from Product p, in_cart i, orders o
where i.`pid`=p.`pid`
and i.`cartid`=o.`cartid`  ";
            if($type){
            
              if($type == "1"){
                $whereQuer.= " AND o.`date` BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()";
              }
		
		elseif ($type == "2") {
		$whereQuer.= " AND o.`date` BETWEEN DATE_SUB(NOW(), INTERVAL 1 MONTH) AND NOW()";
		}

		elseif ($type == "0") {
		$whereQuer.= " AND o.`.date` BETWEEN DATE_SUB(NOW(), INTERVAL 1 YEAR) AND NOW()";
		}
		else{
		echo "type failed";
		}

            }

            $whereQuer .= ";";
            if(mysqli_query($db, $whereQuer)){
              $result = mysqli_query($db, $whereQuer);
              echo "<br><table border = '0' style='float: left'><tr><th> Image </th><th>PID</th><th>Product Name</th><th>Product Type</th><th> Price</th> <th> Dates</th></tr>";
              while($row = $result->fetch_assoc()){
                //$disPrice = $row['price'] * (1 - (.01 * $row['discount']));
                echo "<tr> <td> <img class='formel' src ='http://lorempixel.com/100/100/''></td><td>".$row['pid']."</td> <td>".$row['pname']."</td><td>".$row['ptype']." </td> <td>".$row['price']."</td> <td>".$row['date']."</td>
                </tr>";
              }
              echo "</table>";
            }
            else{
              echo "<br><p> Error in query!</p>";
            }
?>

</body>
</html>
