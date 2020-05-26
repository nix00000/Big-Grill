<?php

require_once '..\classes\dbh.class.php';
require_once '..\classes\jobs.class.php';


if (isset($_POST['add-job'])) {
  $title = strip_tags($_POST['title']);
  $sum = strip_tags($_POST['sum']);
  $desc = strip_tags($_POST['desc']);
  $req = strip_tags($_POST['req']);


  $jobs = new Jobs;
  $res = $jobs->addJob($title,$sum,$desc,$req);
  if ($res == -1) {
    header("Location:../edit?job=failed");

  }else{
    header("Location:../edit?job=success");

  }

}else{
  header("Location:../index");
}
