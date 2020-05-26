<?php
session_start();
require_once '..\classes\dbh.class.php';
require_once '..\classes\menus.class.php';

$carts = new Menus;
if (!isset($_POST['token'])) {
  header("Location:index.php");
}
// unset($_SESSION['cart']);
function printcart(){
  if (isset($_SESSION['cart'])) {
    foreach($_SESSION['cart'] as $cart) {
      echo '
      <div class="cart-item">
        <p class="name">'. $cart['name'] .'</p>
        <p class="prs"> '. $cart['price'] .'</p><br>
        <p class="qty">'. $cart['price'].'</p>
        <p> x '. $cart['qty'] .' = '. number_format((float)$cart['total'], 2, '.', '')  .'</p>
        <button type="button" class="delete">X</button>
      </div>
      ';

      }
    }
  }

if (isset($_POST['func'])) {
  if (isset($_SESSION['cart'])) {
    printcart();

  }else{
    $_SESSION['cart'] = array();
  }
  // END OF IF
}else if(isset($_POST['qty']) && isset($_POST['name']) &&isset($_POST['price'])){
  $name = $_POST['name'];
  $price = $_POST['price'];
  $qty = $_POST['qty'];
  $res = $carts->checkCart($name,$price);

  if (!empty($_SESSION['cart'])) {
    $_SESSION['cart'] = array_values($_SESSION['cart']);
    $exists = 0;

    for ($i=0; $i < count($_SESSION['cart']) ; $i++) {

      if ($_SESSION['cart'][$i]['name'] == $name) {
        $_SESSION['cart'][$i]['qty'] += $qty;
        if ($exists == 0) {
          $exists = 1;
        }

        $_SESSION['cart'][$i]['total'] = $_SESSION['cart'][$i]['qty'] * $_SESSION['cart'][$i]['price'];
        break;
      }else {
        $exists = 0;
      }


    }


    if ($exists !== 1) {
      $res['qty'] = $qty;
      $res['total'] = $res['price'] * $qty;
      $_SESSION['cart'][] = $res;
    }


  }else{
    $res['qty'] = $qty;
    $res['total'] = $res['price'] * $qty;
    $_SESSION['cart'][] = $res;

  }
  printcart();
}else if(isset($_GET['dname'])){
  $delete = $_GET['dname'];

  $_SESSION['cart'] = array_values($_SESSION['cart']);

  for ($i=0; $i < count($_SESSION['cart']) ; $i++) {
    if ($_SESSION['cart'][$i]['name'] == $delete) {
      unset($_SESSION['cart'][$i]);
    }
  }
}else if(isset($_POST['total'])){
  $total = 0;
  if (isset($_SESSION['cart'])) {
    foreach($_SESSION['cart'] as $cart) {
      $total += $cart['total'];

      }
    }
  echo number_format((float)$total, 2,'.','');
}else if(isset($_POST['val'])){
  unset($_SESSION['cart']);
  $total = 0;
  // echo $total;
  echo number_format((float)$total, 2, '.', '');
}
