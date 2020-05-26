<?php
session_start();
require_once '..\classes\dbh.class.php';
require_once '..\classes\menus.class.php';

if (!isset($_POST['orderNow'])){
  header("Location:menu");
}


$order = new Menus;


if (isset($_POST['address']) && isset($_POST['postc']) && isset($_POST['city']) && isset($_POST['name'])&& isset($_POST['email'])&& isset($_POST['phone'])) {
  $add = strip_tags($_POST['address']);
  $ptcd = strip_tags($_POST['postc']);
  $city = strip_tags($_POST['city']);
  $name = strip_tags($_POST['name']);
  $email = strip_tags($_POST['email']);
  $phone = strip_tags($_POST['phone']);
  $rems = strip_tags($_POST['remarks']);


  if (isset($_SESSION['person'])) {
    $uid = $_SESSION['person'][0];
  }else{
    $uid = NULL;
  }
  // CHECKS
  if (!ctype_alnum($add)) {
    header("Location:checkout?status=-1");
  }
  if (!ctype_alnum($ptcd)) {
    header("Location:checkout?status=-1");
  }
  if (!ctype_alpha($city)) {
    header("Location:checkout?status=-1");
  }

  if (!ctype_alpha($name)) {
    header("Location:checkout?status=-1");
  }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location:checkout?status=-2");
  }

  // END OF CHECKS
  $res = $order->order($uid,$add,$ptcd,$city,$phone,$email,$rems);

  if ($res != -1) {
    // Get the assigned order id
    $oid = $order->getProdId($add,$email);
    if ($oid) {
      foreach($_SESSION['cart'] as $cart){
        $details = $order->orderDetails($oid,$cart['prod_id'],$cart['name'],$cart['qty'],$cart['total']);
        if ($details == -1) {
          exit(header("Location:../status?st=failedthis"));
        }
      }
      unset($_SESSION['cart']);
      header("Location:../status?st=success");
    }else{
      header("Location:../status?st=failhere");

    }


  }else{
    header("Location:../status?st=failed");
  }
}else{
  header("Location:checkout?empty");
}
