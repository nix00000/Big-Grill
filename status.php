<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/status.css">
  </head>

  <body>

    <?php

    if (isset($_GET['st'])) {
      if ($_GET['st'] == "success") {
        echo '
        <div class="status-wrap">
          <div class="status-logo">
          <img src="images/logo.png" alt="Logo">
          </div>

          <div class="positive">

            <h1>Order received!</h1>
            <h3>Thank you for ordering at Big Grill. We value your meat.</h3>
            <p>Your order can take up to 45 mins <br> Please make an account in order to track the status of delivery</p>
            <button type="button" onclick="returnHome()" name="button">Return to Home</button>
          </div>
        </div>

        ';
      } else {
        echo '
        <div class="negative">
          <h1>Something went wrong...</h1>
          <h3>Sorry. We could not receive your order at the moment <br>Please try again later</h3>
          <button type="button" onclick="returnHome()" name="button">Return to Home</button>
        </div>
        ';
      }
    }


     ?>
    <!-- Include Header -->

      <script type="text/javascript">
      function returnHome(){
        window.location="index.php";
      }

      </script>
    <!-- Include Footer -->

  </body>
</html>
