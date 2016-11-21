<html>
<style>

  .formel{
    display: block;
    float: left;

  }
</style>

<body>
  <form method="POST">
    <h4> Search for items</h4><br>
    <input class="formel" type="text" name="pname">
    <div class="formel" >
      <input type="checkbox"  class="formel" name="btype" value="book" checked="checked"> Book <br>
      <input type="checkbox" class="formel" name="btype" value="game" checked="checked"> Game<br>
    </div>
    <div class="formel" >
      <input type="radio" name="price" value="10" > 0-10 <br>
      <input type="radio" name="price" value="25"> 0-25 <br>
      <input type="radio" name="price" value="50" > 0-50 <br>
      <input type="radio" name="price" value="-1"> Any price<br>
    </div>

    <button class = "btn btn-lg btn-primary btn-block formel" type = "submit"
             name = "search">Search</button>
  </form>



<?php
    $db = mysqli_connect('jtto224.netlab.uky.edu','root','dot.pan-79','Ecomm', 3306) or die('Error connecting to MySQL server.');
    session_start();

?>




</body>
</html>
