<html>
  <body>
    <?php
          $db = mysqli_connect('jtto224.netlab.uky.edu','root','dot.pan-79','Ecomm', 3306) or die('Error connecting to MySQL server.');
          session_start();
          if($_SERVER["REQUEST_METHOD"] == "POST"){
              $currusername = $_POST['username'];
              $currpass = $_POST['password'];
              $sql = "SELECT `type`, `username` FROM `login` WHERE `username`='".$currusername."' and `password`='".$currpass."';";
              $result = mysqli_query($db, $sql);
              $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
              $count = mysqli_num_rows($result);

	      if($row['type'] == "customer")
	      {
		$header = "location: landing.php";
		}
	      else if ($row['type'] == "manager")
		{
		$header = "location: landing_manager.php";
		}	
              else{
		$header = "location: landing_staff.php";
		}	      

              if($count ==1){
                $_SESSION['user_login'] = $row['username'];
                header($header, true);
              }
              else{
                echo "INVALID PASSWORD/USERNAME COMBO";
              }
          }
    ?>
    <form method="POST">
      <h4> Login Username/password</h4>
      <input type="text" name="username"><br>
      <input type="password"  name="password" required><br>
      <button class = "btn btn-lg btn-primary btn-block" type = "submit"
               name = "login">Login</button>
    </form>
    <form method="link" ACTION="createacct.php">
      <input type="submit" VALUE="Create New Account">
      </form>

  </body>


</html>
