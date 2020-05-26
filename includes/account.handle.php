<?php
session_start();
require_once '..\classes\dbh.class.php';
require_once '..\classes\accounts.class.php';


$acc = new Accounts;

if (isset($_POST['register'])) {
  $name = strip_tags($_POST['name']);
  $email = strip_tags($_POST['email']);
  $pass = strip_tags($_POST['password']);

  $acc->register($name,$email,$pass);

  if ($acc !== -1) {
    header("Location:../regstatus?reg=success");
  }else{
    header("Location:../regstatus?reg=failed");
  }

}else if(isset($_POST['login'])){
  $email = strip_tags($_POST['email']);
  $pass = strip_tags($_POST['password']);
  $acc->login($email,$pass);

  if($acc == -1){
    header("Location:../index?failed");
  }else{
    header("Location:../index?sucess");
  }

}else{
  header("Location:../index?failed");
}
