
<?php
            $db = mysqli_connect('jtto224.netlab.uky.edu','root','dot.pan-79','Ecomm', 3306) or die('Error connecting to MySQL server.');
            include('session.php');
            $usr = $_SESSION['user_login'];
            echo "<h1>".$usr."'s cart</h1>";
            $query = "SELECT `cartid` FROM `customer` WHERE `cid` = '$usr';";
            if(mysqli_query($db, $query)){

                  $result = mysqli_query($db, $query);
                  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                  $count = mysqli_num_rows($result);
                  if($count == 1){
                        $crtid = $row['cartid'];

                        $price = $_POST['change'];
                        $insQuer =  "INSERT INTO `orders` (`cartid`, `date`, `status`, `cid`, `total`) VALUES ($crtid, NOW(), 0, '$usr', $price); ";
                        $crtid++;
                        $updQuer = "UPDATE `customer` SET `cartid` = $crtid WHERE `cid` = '$usr';";
                        $res1 = mysqli_query($db, $insQuer);
                        if($res1){
                          $res2 = mysqli_query($db, $updQuer);
                          if($res2){
                            header("location: cart.php");
                          }
                          else{
                            header("location: a.html");
                          }
                        }else{
                          header("location: no.html");
                        }


                  }


            }






?>
