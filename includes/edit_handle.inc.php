<?php
require_once '..\classes\dbh.class.php';
require_once '..\classes\edit.class.php';

if (!isset($_POST['test'])) {
  header("Location:../index.php");
}

$edit = new Edit;


if (isset($_POST['menu'])) {
  $menu = $_POST['menu'];

  if ($menu == 0) {
    $items = $edit->products();
    foreach ($items as $item) {
      echo '<div class="item">';
      echo '<h4> --'.$item['category'].'-- '. $item['name']." $".$item['price'] ." / " .$item['popular'].'</h4>
      <p>'.$item['description'].'</p>';
      if ($item['popular'] == "popular") {
        echo '<button class="action" type="button" name="button" value="depop"><img src="images\star.png" alt="pop"> </button>';
      }else{
        echo '<button class="action" type="button" name="button" value="pop"><img src="images\star.png" alt="pop"> </button>';
      }
      echo '
      <button class="action" type="button" name="button" value="edit"><img src="images\pencil.png" alt="edit"> </button>
      <button class="action" type="button" name="button" value="delete"><img src="images\criss-cross.png" alt="del"> </button>
      <input class = "item-select" type="hidden" value="'.$item['name'].'">
      </div>
      ';

    }
  }
}
  if (isset($_POST['action'])) {
    $act = $_POST['action'];
    $name = $_POST['name'];

    if ($act == 0) {
      if (isset($_POST['opt'])) {
        if ($_POST['opt'] == "depop") {
          $res = $edit->updateDepop($name);
          if ($res == -1) {
            echo "Failed";
          }else{
            echo "Set to Not Popular";
          }
        }else{
          $res = $edit->updatePop($name);
          if ($res == -1) {
            echo "Failed";
          }else{
            echo "Set to Popular";
          }
        }
      }



    }else if ($act == 1){
      if (isset($_POST['descr'])) {
        $descr = $_POST['descr'];
        $res = $edit->updateDescr($name,$descr);
        if ($res !== -1) {
          echo "Description updated successfully!";
        }else{
          echo "Failed to update description";
        }
      }
    }else if($act == 2){
      $res = $edit->delete($name);
      if ($res !== -1) {
        echo "Item deleted!";
      }else{
        echo "Failed to Delete!";
      }
    }


    // if ($act = 2) {


  }
