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
<link rel="stylesheet" href="css/contact.css">
<div class="contact">
  <div class="mail">
    <h3>Contact Us</h3>
    <hr>
    <form action ="includes/contact.inc.php" method="post">
      <input type="text" name="name" placeholder="Name" required><br>
      <input type="text" name="email" placeholder="Email" required><br>
      <textarea name="msg" rows="5" cols="37" placeholder="Your message..." required></textarea><br>
      <button type="submit" name="send" >SEND</button>

    </form>

  </div>
  <div class="info">
    <h3>Our Information</h3>
    <hr>

    <h4>For Business enquiries</h4>
    <p>business@biggrill.com</p>
    <h4>Phone</h4>
    <p>+44 657564546</p>
  </div>
</div>

<?php
include 'includes/footer.inc.html';
?>
