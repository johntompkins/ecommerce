<?php
            $db = mysqli_connect('jtto224.netlab.uky.edu','root','dot.pan-79','Ecomm', 3306) or die('Error connecting to MySQL server.');
            include('session.php');
          
          
	if(isset($_POST["status"])){
              $checkquery = "UPDATE `orders` set `status`=1  WHERE `cartid`=".$_POST['status']." ";
                        $result = mysqli_query($db, $checkquery);
                        if($result)
			{
				echo "update success";
				header("location: staff_ship_orders.php");
			}
			else
			{ echo "update failed"; }
			
        }
	else{
		echo "no click";
	}
                       
                  
            
?>
