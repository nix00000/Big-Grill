<?php
require_once '..\classes\dbh.class.php';
require_once '..\classes\menus.class.php';

// POST CHECK;
if (isset($_POST['value'])) {
  $val = $_POST['value'];
  $orders = new Menus;
  $res = $orders->allOrders();
  $ordnums = array();
  // Start
  switch ($val) {
    case 0:
      foreach ($res as $arr) {
        if (!in_array($arr['order_id'],$ordnums) && $arr['sent'] == 0) {
          array_push($ordnums,$arr['order_id']);
        }
      }
      break;
    case 1:
      foreach ($res as $arr) {
        if (!in_array($arr['order_id'],$ordnums) && $arr['sent'] == 1) {
          array_push($ordnums,$arr['order_id']);
        }
      }
      break;

    default:
      foreach ($res as $arr) {
        if (!in_array($arr['order_id'],$ordnums)) {
          array_push($ordnums,$arr['order_id']);
        }
      }
      break;
    }
    rsort($ordnums);

    echo '<div class="orders-container">';
    foreach ($ordnums as $ord) {
      $addr = array();
      echo '
        <div class="ord-wrap">
        <h3>'.$ord.'</h3>
        <div class="order-items">
        ';
      $status = "";
      $paid = "";
      $total = 0;
      $data='';
      $remarks = '';
      $btns = '<div class="snd-del-btns"><button class="send-btn" type="button" name="button" value="0">Send Order</button>
            <button class="del-btn" type="button" name="button" value="1">Delete Order</button>';

      foreach ($res as $r) {

        if (!in_array($r['address'],$addr) && in_array($r['order_id'],$ordnums)){
          $addr[] = array($r['address'], $r['post_code']);
        }
        if ($r['order_id'] == $ord) {
            $total += $r['tot_price'];

            if ($r['sent'] == 1) {
              $status = "Sent";
              $btns = '<div class="snd-del-btns"><button class="disabledbtn" type="button" name="button" disabled>Sent</button>
                    <button class="del-btn" type="button" name="button" value="1">Delete Order</button>';
            }else{
              $status = "Pending";
            }
            if ($r['paid'] == 1) {
              $paid = "Paid";
            }else{
              $paid = "Not paid";
            }
            echo '<p> -- '.$r['prod_name'].' x '.$r['qty'].' = $'.$r['tot_price'].'</p>';

        $date=explode(" ",$r['dates']);
        $date[0] = date("d-m-Y",strtotime($date[0]));
        if ($data == '') {
          $data =  '<p class = "total"><b>Delivery To:</b> '.$r['address'].' / '.$r['post_code']. '/'
          .'<br> <b>Contact:</b> '.$r['email'].' / '.$r['phone_number'].
          '<br><br><b>Date: </b>'.$date[0].'
          <br><b>Time: </b> '.$date[1].' </p>';
        }
        if ($remarks =='') {
          $remarks = $r['remarks'];
        }

        }
      } // END OF FOR EACH LOOP
      echo $data;
      echo '<p class = "total"><b>Total:</b> $'. $total.'<br>
            <b>Status:</b> '. $status.'<br>
            <b>Paid:</b> '.$paid.'<br>'.
            '<b>Remarks:</b> '.$remarks.'</p>';


      echo $btns;
      echo '<input class ="ord_num" type="hidden" value="'.$ord.'"></div>';
      echo '</div>';
      echo '</div>';

        }
        echo '</div>';

  }
