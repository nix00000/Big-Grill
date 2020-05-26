<?php
session_start();
require_once '..\classes\dbh.class.php';
require_once '..\classes\accounts.class.php';


if (isset($_POST['param'])) {
  $acc = new Accounts;
  $id = $_SESSION['person'][0];
  if ($_POST['param'] == 1) {
    $info = $acc->userInfo($id);
    echo '
      <div class="basic">
        <table>
          <tr>
            <td><h4>Name: </h4> </td>
            <td><h4>'. $info['name'] .' </h4></td>
          </tr>
          <tr>
            <td><h4>Email:  </h4></td>
            <td><h4>'. $info['email'] .'</h4></td>
          </tr>
        </table>
      </div>
      <hr>
      <div class="change-password">
        <h3>Change Password</h3>
        <form class ="test-class" action="change.php" method="post">
          <input class = "old-pass" type="password" name="oldpass" placeholder="Old Password"><br>
          <input class = "new-pass" type="password" name="newpass" placeholder="New Password"><br>
          <input class = "re-pass" type="password" name="repass" placeholder="Retype new Password"><br>
          <button class ="change" type="button" name="logout">Change Password</button>
        </form>
        <div class="response"></div>
      </div>
      <hr>
      <form action="includes/logout.inc.php" method="post">
        <button id="logout" type="submit" name="logout">Log Out</button>
      </form>
    ';
  }else{
    $orders = array();
    $res = $acc->userOrders($id);
    foreach ($res as $arr) {
      if (!in_array($arr['order_id'],$orders)) {
        array_push($orders,$arr['order_id']);
      }
    }
    rsort($orders);
    echo '<div class="ord-container">';
    foreach ($orders as $ord) {
      $addr = array();
      echo '
        <div class="ord-wrap">
        <h3>'.$ord.'</h3>
        <div class="order-items">
        ';
      $status = "";
      $total = 0;
      foreach ($res as $r) {
        if (!in_array($r['address'],$addr)){
          $addr[] = array($r['address'], $r['post_code']);
        }
        if ($r['order_id'] == $ord) {
          $total += $r['tot_price'];
          if ($r['sent'] == 1) {
            $status = "Sent";
          }else{
            $status = "Pending";
          }
          echo '<p>'.$r['prod_name'].' x '.$r['qty'].' = $'.$r['tot_price'].'</p>';
        }
      }
      echo '<p class = "total">Total: $'. $total.'<br>
            Status: '. $status.'</p>';
      echo '</div>';
      echo '</div>';
    }
    echo '</div>';


  }
}else{
  header("Location:../index");
}
