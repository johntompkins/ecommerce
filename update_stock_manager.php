<?php
            $db = mysqli_connect('jtto224.netlab.uky.edu','root','dot.pan-79','Ecomm', 3306) or die('Error connecting to MySQL server.');
            include('session.php');
          
                        $checkquery = "UPDATE `Product` set `quantity`='".$_POST['quant']."'  WHERE `pid` = '".$_POST['pid']."';";
                        $result = mysqli_query($db, $checkquery);
                        if($result)
			{
				echo "update success";
			}
			else
			{ echo "update failed"; }
			
                          if($result){
                              header("location: manager_restock_store.php");
                          }
                       
                  
            
?>
