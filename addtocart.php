<?php
            $db = mysqli_connect('jtto224.netlab.uky.edu','root','dot.pan-79','Ecomm', 3306) or die('Error connecting to MySQL server.');
            include('session.php');
            $query = "SELECT `cid`, `cartid` FROM `customer` WHERE `cid` = '".$_SESSION['user_login']."'; ";
            if(mysqli_query($db, $query)){

                  $result = mysqli_query($db, $query);
                  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                  $count = mysqli_num_rows($result);
                  if($count == 1){
                        $checkquery = "SELECT * FROM `in_cart` WHERE `cid` = '".$_SESSION['user_login']."' AND `cartid` = '".$row['cartid']."' AND `pid` = '".$_POST['pid']."';";
                        $res1 = mysqli_query($db, $checkquery);
                        $row1 = mysqli_fetch_array($res1, MYSQLI_ASSOC);
                        if(mysqli_num_rows($res1)){
                          $newVal = $row1['quantity'] + 1;
                          $updateQ = "UPDATE `in_cart` SET `quantity` = $newVal WHERE `cid` = '".$_SESSION['user_login']."' AND `cartid` = '".$row['cartid']."' AND `pid` = '".$_POST['pid']."';";
                          //Update command
                        }else{
                          $insertQ = "INSERT INTO `in_cart` (`cid`, `pid`, `cartid`, `quantity`) VALUES ('".$row['cid']."', '".$_POST['pid']."', '".$row['cartid']."', 1); ";
                          $result = mysqli_query($db, $insertQ);
                          if($result){
                              header("location: success.php");
                          }
                        }
                  }


            }






?>
