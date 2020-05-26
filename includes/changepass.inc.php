<?php
session_start();
require_once '..\classes\dbh.class.php';
require_once '..\classes\accounts.class.php';


$change = new Accounts;
if (isset($_POST['oldpass']) && isset($_POST['newpass']) && isset($_POST['repass'])) {
  if ($_POST['oldpass'] !=="" && $_POST['newpass'] !=="" && $_POST['repass'] !==""){
    if($_POST['newpass'] == $_POST['repass']){
      $oldpass = strip_tags($_POST['oldpass']);
      $newpass = strip_tags($_POST['newpass']);
      $email = $_SESSION['person'][1];
      $res = $change->changePass($email,$oldpass,$newpass);

      if ($res == -2){
        echo "<p class='response-text-neg'>Wrong old password</p>";
      }else if ($res == -1){
        echo "<p class='response-text-neg'>Something went wrong...</p>";
      }else {
        echo "<p class='response-text-pos'>Password is Changed</p>";
      }
    }else{
      echo "<p class='response-text-neg'>passwords do not match</p>";
    }

  }else{
    echo "<p class='response-text-neg'>Please fill in all the fields!</p>";
  }
}
