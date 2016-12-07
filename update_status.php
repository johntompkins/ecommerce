<?php
            $db = mysqli_connect('jtto224.netlab.uky.edu','root','dot.pan-79','Ecomm', 3306) or die('Error connecting to MySQL server.');
            include('session.php');          
	if(isset($_POST["status"])){

		$checkquant = "Select * from `in_cart` inner join `Product` 
on (`in_cart`.pid=`Product`.pid) 
where `in_cart`.cartid=".$_POST['status']."  and `in_cart`.quantity>`Product`.quantity ";

		if(mysqli_query($db, $checkquant)){

			$result1 = mysqli_query($db, $checkquant);
			$count = mysqli_num_rows($result1);

			if($count != 0) {
			echo "<h2>The following items in this order do not have enough in stock to fill the order:  </h2> ";			

			 echo "<br><table border = '0' style='float: left'><tr><th>Image</th><th>Name</th><th>Original Price</th> <th>Quantity</th></tr>";
              while($row = $result1->fetch_assoc()){
               
 echo "<tr> <td> <img class='formel' src ='http://lorempixel.com/100/100/''></td> <td>".$row['pname']."</td> <td>".$row['price']."</td> <td>".$row['quantity']."</td> </tr>";
              }
              echo "</table>";
			} //end of if for count = 0
			
			else{//this is where you want to update status of items that are not greater
			echo "ready to update to shipped";
              $checkquery = "UPDATE `orders` set `status`=1  WHERE `cartid`=".$_POST['status']." ";
                        $result = mysqli_query($db, $checkquery);
                       if($result)
                      {
                              echo "update success";
                              header("location: staff_ship_orders.php");
                      }
                      else
                      { echo "update failed"; }
       
			}// end of else for count = 0
	
            }
            else{
              echo "<br><p> Error in query!</p>";
            }
		}
	else{
		echo "no click";
	}                
?>
