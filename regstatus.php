<?php
include 'includes/header.inc.php';

$res = $_GET['reg'];

if ($res == 'success') {
  echo '
  <div class="reg-message">
    <h1>Registration Successful!</h1>
    <h3>Thank you for joining Big Grill<br>We grill for you!</h3>
    <a href="menu.php"><button type="button" name="button">Menu</button></a>
  </div>
  ';

}else{
  echo '
  <div class="reg-message">
    <h1>Registration Failed...</h1>
    <h3>Looks like something went wrong <br> Please try again later...</h3>
    <a href="menu.php"><button type="button" name="button">Menu</button></a>
  </div>

  ';

}
?>

<script>
  $(document).ready(function(){
    $(".acc").hide();
  });

</script>
