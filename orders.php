<?php
spl_autoload_register('autoLoader');
function autoLoader($class){
  $path = "classes/";
  $ext = ".class.php";
  $fullpath = $path.$class.$ext;

  require_once $fullpath;
}

include 'includes/header.inc.php';


if (!isset($_SESSION['person'])) {
    header("Location:index");
}
if ($_SESSION['person'][2] != 1) {
    header("Location:index");
}
?>
<link rel="stylesheet" href="css/orders.css">
<div class="btns3">
  <button class = "btn3" type="button" name="button" value="0">Pending Orders</button>
  <button class = "btn3" type="button" name="button" value="1">Sent Orders</button>
  <button class = "btn3" type="button" name="button" value="2">All Orders</button>
</div>
<h2 class="page"></h2>
<h4 id ="feed"></h4>

<div class="show">
</div>


<script src="js/orders.js"></script>
</body>
</html>
