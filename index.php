<?php

spl_autoload_register('autoLoader');
function autoLoader($class){
  $path = "classes/";
  $ext = ".class.php";
  $fullpath = $path.$class.$ext;

  require_once $fullpath;

}

include 'includes/header.inc.php';
?>
<link rel="stylesheet" href="css/home.css">

<div class="header">
  <img src="images/menu/burger.jpg" alt="food">
  <div class="head-txt">
    <h1>Welcome to Big Grill</h1>
    <h2>Try our delicious meals today.</h2>
    <a href="menu.php">Check out our menu --></a>
  </div>
</div>

<div class="account-suggest">
  <p><b>Make an account</b> to be able to track your orders</p>
</div>

<div class="best">
  <div class="best-wrap">
    <div class="burger-img">
      <img src="images/menu/food.jpg" alt="burger">

    </div>
    <div class="best-txt">
      <h2>The Best Food in Town</h2>
      <h4>Our burgers consist of 100% pure meat.
      We ourselves do not line processed meat and would not
      make the same for our customers. We value good food</h4>
      <h4>We also have vegetarian options!</h4>
      <h4>Explore all our options by visiting our <a href="menu.php">menu</a></h4>
    </div>

  </div>

</div>

<?php
include 'includes/footer.inc.html';
?>
