<?php
        $db = mysqli_connect('localhost','root','dot.pan-79','BankAssign3') or die('Error connecting to MySQL server.');
?>


<html>
<body>
<h3>John Tompkins CS405G assignment 3</h3>

<h4>Problem a:</h4>
<?php
$sql = "SELECT `person-name` FROM `Works`
        WHERE `BankID` IN (SELECT `BankID`
                        FROM `Company`
                        Where `company-name` = 'First bank');";

$result = mysqli_query($db, $sql) or die('Error');
if($result->num_rows > 0){
  while($row = $result->fetch_assoc()){
    echo $row["person-name"]."<br>";
  }
}else{
  echo "0 results";
}
 ?>
<h4>Problem b:</h4>
<?php
$sql = "SELECT `Works`.`person-name`, `Employees`.`city` FROM `Works`, `Employees`
        WHERE `Employees`.`person-name` = `Works`.`person-name` AND `BankID` IN (SELECT `BankID`
                        FROM `Company`
                        Where `company-name` = 'First bank');";

$result = mysqli_query($db, $sql) or die('Error');
if($result->num_rows > 0){
  while($row = $result->fetch_assoc()){
    echo $row["person-name"]." ".$row["city"]."<br>";
  }
}else{
  echo "0 results";
}



?>
<h4>Problem c:</h4>
<?php
$sql = "SELECT `Works`.`person-name` , `Employees`.`street`, `Employees`.`city` FROM `Works`, `Employees`
        WHERE `Employees`.`person-name` = `Works`.`person-name` AND `Works`.`salary` > 10000 AND`BankID` IN (SELECT `BankID`
                        FROM `Company`
                        Where `company-name` = 'First bank');";

$result = mysqli_query($db, $sql) or die('Error');
if($result->num_rows > 0){

  while($row = $result->fetch_assoc()){

   echo "Name: ".$row["person-name"]." Street:".$row["street"]." City:".$row["city"]."<br>";
  }
}else{
  echo "0 results";
}


?>

<h4>Problem d:</h4>
<?php
$sql = "SELECT DISTINCT `Works`.`person-name`
        FROM `Employees`, `Company` INNER JOIN `Works` ON (`Works`.`BankID` = `Company`.`BankID`)
        WHERE `Employees`.`person-name` = `Works`.`person-name` AND `Employees`.`city` = `Company`.`City`;";

$result = mysqli_query($db, $sql) or die('Error');
if($result->num_rows > 0){

  while($row = $result->fetch_assoc()){

   echo "Name: ".$row["person-name"]."<br>";
  }
}else{
  echo "0 results";
}
?>

<h4>Problem e:</h4>
<?php
$sql = "SELECT DISTINCT `company-name`
        FROM `Company` C
        WHERE NOT EXISTS (SELECT `city`
                          FROM `Company`
                          WHERE `company-name` = 'First bank'
                          AND `city` NOT IN (SELECT `city`
                               		           FROM `Company` D
                                             WHERE C.`company-name` = D.`company-name`)
                        );";




$result = mysqli_query($db, $sql) or die('Error in  E');
if($result->num_rows > 0){

  while($row = $result->fetch_assoc()){

   echo "Company: ".$row["company-name"]."<br>";
  }
}else{
  echo "0 results";
}

 ?>


<h4>Problem f:</h4>
<?php
$sql = "SELECT `person-name`
        FROM `Works` INNER JOIN `Company` ON (`Works`.`BankID` = `Company`.`BankID`)
        GROUP BY `person-name`
        HAVING COUNT(`company-name`) > 2;";




$result = mysqli_query($db, $sql) or die('Error in  F');
if($result->num_rows > 0){
  while($row = $result->fetch_assoc()){

   echo "Person: ".$row["person-name"]."<br>";
  }
}else{
  echo "0 results";
}

 ?>




 <h4>Problem g:</h4>
 <?php




 $sql = "UPDATE `Works`
         SET `salary` = 1.1 * salary
         WHERE `BankID` IN (SELECT `BankID`
                           FROM `Company`
                           WHERE `company-name` = 'First bank');";




 $result = mysqli_query($db, $sql) or die('Error in  G');
 if($result){
   echo "Update completed successfully <br>";
 }



?>




 <h4>Problem h:</h4>
 <?php
 $sql = "UPDATE `Works` SET `salary` = 1.03 * `salary`  WHERE `salary` * 1.1 > 100000;";

$result = mysqli_query($db, $sql) or die('Error in  H1');
if($result){
  echo "Update completed successfully <br>";
}

 $sql = "UPDATE `Works`
         SET `salary` = 1.1 * `salary`
         WHERE 1.1 * `salary` <= 100000;";
$result = mysqli_query($db, $sql) or die('Error in  H2');
if($result){
  echo "Update completed successfully";
}





?>


 <h4>Problem i:</h4>
 <?php
 $sql = "DELETE FROM `Works` WHERE BankID IN (SELECT BankID
                                              FROM `Company`
                                              Where `company-name` = 'small bank corporation');";

$result = mysqli_query($db, $sql) or die('Error in  I');
if($result){
  echo "Delete completed successfully <br>";
}






 $db->close(); ?>


















<body>
</html>
