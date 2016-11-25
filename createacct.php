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
    Type: <select name="typeSelect">
    <option value="customer">Customer</option>
    <option value="staff">Staff</option>
    <option value="manager">Manager</option>
    </select>
    <button class = "btn btn-lg btn-primary btn-block" type = "submit"
             name = "login">Create</button>
  </form>
 <?php
      if($_SERVER["REQUEST_METHOD"] == "POST"){

	if($_POST['typeSelect'] == "customer")
	{
    $query = "SELECT MAX(`cartid`) as maxID FROM `in_cart`;";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $newID = $row['maxID'] + 1;
    $usr = $_POST['username'];
    $pw = $_POST['password'];
    $name = $_POST['name'];
    $addr = $_POST['address'];
    $pay = $_POST['payment'];
	$cust = "INSERT INTO `customer` (`cid`, `password`, `name`, `address`, `payment`, `cartid`) VALUES ('$usr', '$pw', '$name', '$addr', '$pay', $newID );";

	mysqli_query($db, $cust);

	}
	//$sql_staff = "INSERT INTO `staff` (`sid`, `pw`, `sType`) VALUES (;".$_POST['cid']."', '".$_POST['password']."', '".$_POST['typeSelect']."');";

 	$sql = "INSERT INTO `login` (`username`, `password`,`type`) VALUES ('".$_POST['username']."', '".$_POST['password']."', '".$_POST['typeSelect']."');";
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
