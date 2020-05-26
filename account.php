<?php
require_once 'includes/header.inc.php';

if (!isset($_SESSION['person'])) {
  header("Location:index");
}

 ?>
 <link rel="stylesheet" href="css/account.css">

  <div class="profile-wrap">
    <h2>My Account</h2>
    <div class="btns2">
      <button class ='btns2-btn' type="button" name="button" value="1">Account Info</button>
      <button class ='btns2-btn' type="button" name="button" value="2">Orders</button>
    </div>
    <hr>
    <div class="info">

    </div>
  </div>

  <script src="js/account.js"></script>
  </body>
</html>
