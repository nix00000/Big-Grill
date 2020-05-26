
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Status</title>
  </head>
  <body>
    <link rel="stylesheet" href="css/job_status.css">

    <?php

    if (isset($_GET['status'])) {
      if ($_GET['status'] == "success") {
        echo '
        <div class="status-wrap">
          <div class="status-logo">
          <img src="images/logo.png" alt="Logo">
          </div>

          <div class="positive">
            <h1>Application Received!</h1>
            <h3>Thank you for applying!</h3>
            <p>It may take a few weeks before we process you application</p>
            <button type="button" onclick="returnHome()" name="button">Return to Home</button>
          </div>
        </div>

        ';
      } else {
        echo '
        <div class="status-wrap">
          <div class="status-logo">
          <img src="images/logo.png" alt="Logo">
          </div>
          
          <div class="negative">
            <h1>Something went wrong...</h1>
            <h3>Sorry. We could not receive your application at the moment <br>Please try again later</h3>
            <button type="button" onclick="returnHome()" name="button">Return to Home</button>
          </div>

        </div>
      </div>
        ';
      }
    }


     ?>
     <script type="text/javascript">
     function returnHome(){
       window.location="index.php";
     }

     </script>
  </body>
</html>
