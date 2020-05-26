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
<link rel="stylesheet" href="css/edit.css">
<div class="wrap">
  <div class="menu">
    <div class="menu-nav">
      <h2>Cart Items</h2>
      <h4 class = "fb">
        <?php
        if (isset($_GET['$err'])) {
          $err = $_GET['$err'];
          echo $err;
        }

         ?>

      </h4>
    </div>
    <div class="menu-items">
    </div>
    <div class="menu-add">
      <form action="includes/add_products.inc.php" method ="post" enctype="multipart/form-data">
      <table>
        <tr>
          <td><label for="category">Select Category:</label> </td>
          <td><select class="categ" name="category">
            <option value="burgers">Burgers</option>
            <option value="pizzas">Pizzas</option>
            <option value="sandwiches">Sandwiches</option>
            <option value="bevrages">Bevrages</option>
            <option value="salads">Salads</option>
            <option value="snacks">Snacks</option>
          </select></td>
        </tr>
        <tr>
          <td><label for="name">Name:</label> </td>
          <td><input type="text" name="name"></td>
        </tr>
        <tr>
          <td><label for="price">Price($) : </label> </td>
          <td><input type="number" step="0.01" name="price"></td>
        </tr>
        <tr>
          <td><label for="image">Description : </label> </td>
          <td><input type="text" name ="descr"></td>
        </tr>
        <tr>
          <td><label for="image">Product Image : </label> </td>
          <td><input type="file" name="images"></td>
        </tr>

      </table>
        <button class ="add-prod" type="submit" name="add-prod">Add Product</button>

      </form>
    </div>

  </div>


  <div class="jobs">
    <div class="jobs-wrap">
      <h2>Jobs</h2>
      <h4 class = "job-msg"></h4>
      <div class="job-list">

      </div>
      <div class="add-job">
        <form action="includes/jobs_handle.inc.php" method="post">
        <table>
          <tr>
            <td><label for="">Title: </label></td>
            <td><input type="text" name="title"></td>
          </tr>

          <tr>
            <td><label for="">Summary: </label></td>
            <td><input type="text" name="sum"></td>
          </tr>

          <tr>
            <td><label for="">Description: </label></td>
            <td><textarea name="desc" rows="3" cols="30"></textarea> </td>
          </tr>

          <tr>
            <td><label for="">Requirements(commas): </label></td>
            <td><textarea name="req" rows="3" cols="30"></textarea></td>
          </tr>
        </table>
        <button type="submit" name="add-job">Add Job Opening</button>
        </form>

      </div>

      <div class="applicants">
        <div class="header">
          <button class="return-list" type="button" name="button">Back</button>
          <h4>Applicants</h4>
        </div>

        <div class="app-list">

        </div>
      </div>



    </div>
  </div>


</div>

<script src="js/edit.js"></script>

  </body>
</html>
