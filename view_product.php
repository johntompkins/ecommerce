<?php

$db = mysqli_connect('jtto224.netlab.uky.edu','root','dot.pan-79','Ecomm', 3306) or die('Error connecting to MySQL server.');


// Check connection
if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
}

$sql = "select * 
	from Product";
echo $sql;
echo "<br>";


// perform the query
echo "<br>";
        $result = $conn->query($sql);
         
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
