<html>
<?php
  $db = mysqli_connect('jtto224.netlab.uky.edu','root','dot.pan-79','Ecomm', 3306) or die('Error connecting to MySQL server.');
  include('session.php');
 ?>
<head></head>
<style>

  .formel{
    display: block;
    float: left;

  }
</style>

<body>
  <h1>Hello! Account <?php  echo $_SESSION['user_login']?>'s page</h1>
  <div>
  <form method="POST">
    <h4> Search for items</h4><br>
    <input class="formel" type="text" name="pname">
    <div class="formel" >
      <table>
      <tr><td><input type="radio"  class="formel" name="btype" value="1"> Book </td></tr>
      <tr><td><input type="radio" class="formel" name="btype" value="2" > Game </td></tr>
      <tr><td><input type="radio" class="formel" name="btype" value="0" checked> Both</td></tr>
      </table>
    </div>
    <div class="formel" >
      <input type="radio" name="price" value="10" > 0-10 <br>
      <input type="radio" name="price" value="25"> 0-25 <br>
      <input type="radio" name="price" value="50" > 0-50 <br>
      <input type="radio" name="price" value="0" checked> Any price<br>
    </div>

    <button class = "btn btn-lg btn-primary btn-block formel" type = "submit"
             name = "search">Search</button>
  </form>
  </div>


<?php
    

    if($_SERVER["REQUEST_METHOD"] == "POST"){

            $name = $_POST['pname'];
            $type = $_POST['btype'];
            $price = $_POST['price'];
            $whereQuer= "SELECT * FROM `Product`";
            if($name || $type || $price){
              $whereQuer .= " WHERE ";
              if($name){
                $whereQuer .= "`pname` = '".$name."' AND ";
              }
              if($price){
                $whereQuer.="`price` <= ".$price;
              }
              else{
                $whereQuer.="`price` >= ".$price;
              }
              if($type != "0"){
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
                      <td><form method='POST' action ='addtocart.php'><button class = 'btn btn-lg btn-primary btn-block' value='".$row['pid']."' type = 'submit' name = 'pid' >Add to Cart</button></form> </td> </tr>";
              }
              echo "</table>";
            }
            else{
              echo "<br><p> Error in query!</p>";
            }


    }

?>




</body>
</html>
