<?php
        $db = mysqli_connect('jtto224.netlab.uky.edu','root','dot.pan-79','Ecomm', 3306) or die('Error connecting to MySQL server.');
        session_start();
        $check = (isset($_SESSION['user_login']) ? $_SESSION['user_login'] : null);
        $quer = mysqli_query($db, "select `username` from `login` where `username` = '$check';");
        $row = mysqli_fetch_array($quer, MYSQLI_ASSOC);
        $sess = $row['username'];
        if(!isset($_SESSION['user_login'])){
          header("location: login.php");
        }
?>
