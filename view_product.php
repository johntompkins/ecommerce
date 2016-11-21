<?php

$db = mysqli_connect('jtto224.netlab.uky.edu','root','dot.pan-79','Ecomm', 3306) or die('Error connecting to MySQL server.');


$sql = "select * 
	from `Product`;";

// perform the query
echo "<br>";
        $result = $mysqli_query($db, $sql);
         
$row = $result->fetch_assoc();

           echo "<tr>";
           echo "<td>" . $row["pName"] . "</td>";
           echo "<td>" . $row["ptype"] . "</td>";
           echo "<td>" . $row["price"] . "</td>";
           echo "<td>" . $row["discount"] . "</td>";
           echo "<td>" . $row["quantity"] . "</td>";
          
           echo "</tr>";
        
	$conn->close();
?>
