<?php
$db = mysqli_connect('jtto224.netlab.uky.edu','root','dot.pan-79','Ecomm', 3306) or die('Error connecting to MySQL server.');
?>
<html>
<body>
  <form method="POST">
    <h4> Create Username/password:</h4>
    Username: <input type="text" name="username"><br>
    Password: <input type="password"  name="password" required><br>
    Full  name: <input type = "text" name="name"> <br>
    Address: <input type = "text" name="address"> <br>
    Payment: <input type = "text" name="payment"> <br>
    Type: <select>
    <option value="customer">Customer</option>
    <option value="staff">Staff</option>
    <option value="manager">Manager</option>
    </select>
    <button class = "btn btn-lg btn-primary btn-block" type = "submit"
             name = "login">Create</button>
  </form>
 <?php
      if($_SERVER["REQUEST_METHOD"] == "POST"){
          $sql = "INSERT INTO `customer` (`cid`, `password`, `name`, `address`, `payment`) VALUES ('".$_POST['cid']."', '".$_POST['password']."', '".$POST['name']."', '".$POST['address']."', '".$POST['payment']."');";
          $result = mysqli_query($db, $sql);

          $count = mysqli_num_rows($result);
          if($result){
            header("location: login.php");
          }
          else{
            echo "CREATE ACCOUNT FAILED";
          }
      }

   ?>
</body>
</html>
