<?php
            $db = mysqli_connect('jtto224.netlab.uky.edu','root','dot.pan-79','Ecomm', 3306) or die('Error connecting to MySQL server.');
            include('session.php');
            $usr = $_SESSION['user_login'];
            $query = "SELECT `cid`, `cartid` FROM `customer` WHERE `cid` = '$usr';";
            if(mysqli_query($db, $query)){

                  $result = mysqli_query($db, $query);
                  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                  $count = mysqli_num_rows($result);
                  if($count == 1){
                        $cartid = $row['cartid'];
                  			$newQuant = $_POST['upd'];
                        $newpid = $_POST['add'];
                        if($newQuant <= 0){
                          $quer = "DELETE FROM `in_cart` WHERE `cid` = '$usr' AND `pid`= $newpid AND `cartid` = $cartid;";
                        }else{
                          $quer = "UPDATE `in_cart` SET `quantity` = $newQuant WHERE `cid` = '$usr' AND `pid`= $newpid AND `cartid` = $cartid;";
                        }
                        $result = mysqli_query($db, $quer);
                        if($result){
                          header("location: cart.php");
                        }
                        else{
                          header("location: no.html");
                        }

                  }


            }
?>
