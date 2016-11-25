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
  <form method="POST" action="searchresults.php">
    <h4> Search for items</h4><br>
    <input class="formel" type="text" name="pname">
    <div class="formel" >
      <table>
      <tr><td><input type="radio"  class="formel" name="btype" value="1"> Book </td></tr>
      <tr><td><input type="radio" class="formel" name="btype" value="2" > Game </td></tr>
      <tr><td><input type="radio" class="formel" name="btype" value="0" checked> Both</td></tr>
      </table>
    </div>
    <div class="formel" >
      <input type="radio" name="price" value="10" > 0-10 <br>
      <input type="radio" name="price" value="25"> 0-25 <br>
      <input type="radio" name="price" value="50" > 0-50 <br>
      <input type="radio" name="price" value="0" checked> Any price<br>
    </div>

    <button class = "btn btn-lg btn-primary btn-block formel" type = "submit"
             name = "search">Search</button>
  </form>
  </div>
</body>
</html>
