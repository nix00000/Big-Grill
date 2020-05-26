<?php
spl_autoload_register('autoLoader');
function autoLoader($class){
  $path = "classes/";
  $ext = ".class.php";
  $fullpath = $path.$class.$ext;

  require_once $fullpath;

}
include 'includes/header.inc.php';
 ?>
 <link rel="stylesheet" href="css/jobs.css">

 <h1 class = "title">Join Our Team!</h1>

 <div class="jobs-listing">

 </div>


 <script src="js/jobs.js"></script>
