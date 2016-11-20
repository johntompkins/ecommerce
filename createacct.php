<?php
$db = mysqli_connect('jtto224.netlab.uky.edu','root','dot.pan-79','Ecomm', 3306) or die('Error connecting to MySQL server.');
?>
<html>
<body>
  <form method="POST">
    <h4> Create Username/password:</h4>
    <input type="text" name="username">
    <input type="password"  name="password" required>
    First name: <input type = "text" name="FirstName" ><br>
    Last name: <input type = "text" name="LastName"> <br>
    <button class = "btn btn-lg btn-primary btn-block" type = "submit"
             name = "login">Create</button>
  </form>
 <?php
      if($_SERVER["REQUEST_METHOD"] == "POST"){
          $sql = "INSERT INTO `login` (`username`, `password`) VALUES ('".$_POST['username']."', '".$_POST['password']."');";
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
