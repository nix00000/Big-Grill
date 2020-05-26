<?php
require_once '..\classes\dbh.class.php';
require_once '..\classes\menus.class.php';

if (isset($_POST['func']) && isset($_POST['order'])) {
  $act = new Menus;
  $order = $_POST['order'];
  if ($_POST['func'] == "0") {
    $res = $act->updateSent($order);
    echo $res;

  }else if($_POST['func'] == "1"){
    $res = $act->deleteOrder($order);
    echo $res;
  }
  else{
    echo 'Failed';
  }

}else{
  header("Location:../orders");
}
