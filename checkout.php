<?php

include 'includes/header.inc.php';
if (!isset($_SESSION['cart'])) {
  header("Location:menu.php");
}
?>

<!-- Stays -->
<link rel="stylesheet" href="css/checkout.css">

<?php
if (isset($_GET['status'])) {
  $msg = $_GET['status'];
  if ($msg = -1) {
    echo "<h4 class = 'message'>Woops something went wrong...<br>
    Please check your address input</h4>";
  }
  else if ($msg = -2) {
    echo "<h4 class = 'message'>Woops something went wrong...<br>
    Please check your email or phone number</h4>";
  }
}

?>
<div class="wrap-checkout">

    <div class="user-data-container">
      <form class="user-data" action="includes/checkout.handle.php" method="post">
        <h1>Delivery Details</h1>
        <hr>
        <div class="add-address">
          <input type="text" name="address" placeholder = "Address" required>
          <input type="text" name="postc" placeholder = "Postal Code" required>
          <input type="text" name="city" placeholder = "City" required>
        </div>
        <hr>
        <div class="add-details">
        <input type="text" name="name" placeholder = "Name">
        <input type="text" name="email" placeholder = "Email" required>
        <input type="text" name="phone" placeholder = "Phone" required>
        </div>
        <textarea name="remarks" rows="8" cols="74" placeholder = "Remarks"></textarea>

        <h3>How will you pay?</h4>
        <hr>
        <p>options here</p>
        <button type="submit" id = "chbtn" name="orderNow">Order Now</button>
        <a href="menu.php"><button id = "rtrbtn" type="button" name="button">Back to Cart</button></a>

      </form>

    </div>
    <div class="cart">
      <div class="cart-items">
      </div>
      <div class="action">
        <h4 class = "total"><p>Total: </p>
          <p class ='checkout'>
        </p></h4>
        <button id="clear-cart" type="button" name="clr" value = "clr">Clear</button><br>
      </div>
    </div>

    <script src="js/checkout.js"></script>
  </div>
  </body>
</html>
