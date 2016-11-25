

<html>
<?php
  $db = mysqli_connect('jtto224.netlab.uky.edu','root','dot.pan-79','Ecomm', 3306) or die('Error connecting to MySQL server.');
 ?>
<head></head>
<style>
  .formel{
    display: block;
    float: left;
  }
</style>

<body>
  <div>
  <form method="POST" action="statsresults.php">
    <h4> View items/history</h4><br>
    <div class="formel" >
      <table>
      <tr><td><input type="radio"  class="formel" name="btype" value="1"> Week </td></tr>
      <tr><td><input type="radio" class="formel" name="btype" value="2" > Month </td></tr>
      <tr><td><input type="radio" class="formel" name="btype" value="0" checked> Year</td></tr>
      </table>
    </div>
  

    <button class = "btn btn-lg btn-primary btn-block formel" type = "submit"
             name = "search">View</button>
  </form>
  </div>
  <h2><a href = "logout.php">Sign Out</a></h2>
</body>
</html>
