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
    <link rel="stylesheet" href="css/menu.css">

<div class="wrap">

  <div class="buttons-container">
    <ul>

      <button class = "btns" type="button" name="button" value = '1'><li>Most Popular ></li></button>
      <button class = "btns" type="button" name="button" value = '2'><li>Burgers ></li></button>
      <button class = "btns" type="button" name="button" value = '3'><li>Pizzas ></li></button>
      <button class = "btns" type="button" name="button" value = '4'><li>Sandwishes ></li></button>
      <button class = "btns" type="button" name="button" value = '5'><li>Bevrages ></li></button>
      <button class = "btns" type="button" name="button" value = '6'><li>Salads ></li></button>
      <button class = "btns" type="button" name="button" value = '7'><li>Snacks&sides ></li></button>

    </ul>

  </div>


  <div class="products-containter">

  </div>
<form class="" action="checkout.php" method="post">
  <div class="cart">
    <div class="cart-items">
    </div>
    <div class="action">
      <h4 class = "total"><p>Total: </p>
        <p class ='checkout'>
      </p></h4>
      <button class = 'checkout-submit' type="submit" name="chek-submit">Checkout</button><br>
      <button id="clear-cart" type="button" name="clr" value = "clr">Clear</button><br>
    </div>
  </form>

  </div>
</div>



  <script src="js/menu.js"></script>
  <?php
  include 'includes/footer.inc.html';
  ?>
