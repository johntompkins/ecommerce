
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
           // $name = $_POST['pname'];
            $type = $_POST['btype'];
           // $price = $_POST['price'];
            $whereQuer= "SELECT * FROM `Product`";
            if( $type ){
              $whereQuer .= " WHERE ";
              //if($name){
               // $whereQuer .= "`pname` = '".$name."' AND ";
             // }
             // if($price){
              //  $whereQuer.="`price` <= ".$price;
             // }
             // else{
              //  $whereQuer.="`price` >= ".$price;
             // }
              if($type == "1"){
                $whereQuer.= " AND `ptype` = ".$type;
              }
		
		else if ($type == "2") {
		$whereQuer.= " AND `ptype` = ".$type;
		}

		else ($type == "0") {
		$whereQuer.= " AND `ptype` = ".$type;
		}

            }

            $whereQuer .= ";";
            if(mysqli_query($db, $whereQuer)){
              $result = mysqli_query($db, $whereQuer);
              echo "<br><table border = '0' style='float: left'><tr><th>Image</th><th>Name</th><th>Original Price</th><th> Discounted Price</th> <th>Quantity</th></tr>";
              while($row = $result->fetch_assoc()){
                $disPrice = $row['price'] * (1 - (.01 * $row['discount']));
                echo "<tr> <td> <img class='formel' src ='http://lorempixel.com/100/100/''></td> <td>".$row['pname']."</td> <td>".$row['price']."</td> <td>".$disPrice."</td> <td>".$row['quantity']."</td>
                      <td><form method='POST' action ='addtocart.php'><button class = 'btn btn-lg btn-primary btn-block' value='".$row['pid']."' type = 'submit' name = 'add' >Add to Cart</button></form> </td> </tr>";
              }
              echo "</table>";
            }
            else{
              echo "<br><p> Error in query!</p>";
            }
?>


<h2><a href = "logout.php">Sign Out</a></h2>
<h2><a href = "landing_manager.php">Manager options</a></h2>
</body>
</html>
