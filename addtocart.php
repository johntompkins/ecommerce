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
                  			if(isset($_POST["add"])){
                                          	$pidUser = $_POST["add"];
                                            $checkquery = "SELECT * FROM `in_cart` WHERE `cid` = '$usr' AND `cartid` = '$cartid' AND `pid` = '$pidUser';";
                                            $res1 = mysqli_query($db, $checkquery);
                                            $row1 = mysqli_fetch_array($res1, MYSQLI_ASSOC);
                                            if(mysqli_num_rows($res1)){
                                              $newVal = $row1['quantity'] + 1;
                                              $updateQ = "UPDATE `in_cart` SET `quantity` = $newVal WHERE `cid` = '$usr' AND `cartid` = '$cartid' AND `pid` = '$pidUser';";
                                              $result = mysqli_query($db, $updateQ);
                                              if($result){
                                                  header("location: cart.php");
                                              }
                                              //Update command
                                            }else{
                                              $insertQ = "INSERT INTO `in_cart` (`cid`, `pid`, `cartid`, `quantity`) VALUES ('$usr', '$pidUser', '$cartid', 1); ";
                                              $result = mysqli_query($db, $insertQ);
                                              if($result){
                                                  header("location: cart.php");
                                              }
                                              else{
                                                  header("location: login.php");
                                              }
                                            }
                  			}
                        else{
                          header("location: no.html");
                        }

                  }


            }
?>
