<?php
require_once '..\classes\dbh.class.php';
require_once '..\classes\menus.class.php';
$q = new Menus;

if (isset($_POST['value'])) {

  $res = $q->getAll();
  $val = (int)$_POST['value'];



  switch ($val) {
    case 1:
      foreach ($res as $row) {
        if ($row['popular'] == "popular"){
          echo '
          <div class="products">
            <img src="'.$row['image'].'" alt="Tasty image">
            <h3>'.$row['name'].'</h3>
            <p class = "descr">'.$row['description'].'</p>
            <p class = "price">'.$row['price'].'</p>
            <input type="number" class="quantity" name="quantity" min="1" max="50"  step="1" value="1" required>
            <button class = "addToCart" type="button" name="button">Add to Cart</button>
          </div>
          ';

        }
      }
      break;

    case 2:
      foreach ($res as $row) {
        if ($row['category'] == "burgers"){
          echo '
          <div class="products">
            <img src="'.$row['image'].'" alt="Tasty image">
            <h3>'.$row['name'].'</h3>
            <p class = "descr">'.$row['description'].'</p>
            <p class = "price">'.$row['price'].'</p>
            <input type="number" class="quantity" name="quantity" min="1" max="50"  step="1" value="1" required>
            <button class = "addToCart" type="button" name="button">Add to Cart</button>
          </div>
          ';
        }
      }
      break;

    case 3:
    foreach ($res as $row) {
      if ($row['category'] == "pizzas"){
        echo '
        <div class="products">
          <img src="'.$row['image'].'" alt="Tasty image">
          <h3>'.$row['name'].'</h3>
          <p class = "descr">'.$row['description'].'</p>
          <p class = "price">'.$row['price'].'</p>
          <input type="number" class="quantity" name="quantity" min="1" max="50"  step="1" value="1" required>
          <button class = "addToCart" type="button" name="button">Add to Cart</button>
        </div>
        ';
      }
    }
      break;
    case 4:
    foreach ($res as $row) {
      if ($row['category'] == "sandwishes"){
        echo '
        <div class="products">
          <img src="'.$row['image'].'" alt="Tasty image">
          <h3>'.$row['name'].'</h3>
          <p class = "descr">'.$row['description'].'</p>
          <p class = "price">'.$row['price'].'</p>
          <input type="number" class="quantity" name="quantity" min="1" max="50"  step="1" value="1" required>
          <button class = "addToCart" type="button" name="button">Add to Cart</button>
        </div>
        ';
      }
    }
      break;
    case 5:
    foreach ($res as $row) {
      if ($row['category'] == "bevrages"){
        echo '
        <div class="products">
          <img src="'.$row['image'].'" alt="Tasty image">
          <h3>'.$row['name'].'</h3>
          <p class = "descr">'.$row['description'].'</p>
          <p class = "price">'.$row['price'].'</p>
          <input type="number" class="quantity" name="quantity" min="1" max="50"  step="1" value="1" required>
          <button class = "addToCart" type="button" name="button">Add to Cart</button>
        </div>
        ';
      }
    }
      break;
    case 6:
    foreach ($res as $row) {
      if ($row['category'] == "salads"){
        echo '
        <div class="products">
          <img src="'.$row['image'].'" alt="Tasty image">
          <h3>'.$row['name'].'</h3>
          <p class = "descr">'.$row['description'].'</p>
          <p class = "price">'.$row['price'].'</p>
          <input type="number" class="quantity" name="quantity" min="1" max="50"  step="1" value="1" required>
          <button class = "addToCart" type="button" name="button">Add to Cart</button>
        </div>
        ';
      }
    }
      break;
    case 7:
    foreach ($res as $row) {
      if ($row['category'] == "snacks"){
        echo '
        <div class="products">
          <img src="'.$row['image'].'" alt="Tasty image">
          <h3>'.$row['name'].'</h3>
          <p class = "descr">'.$row['description'].'</p>
          <p class = "price">'.$row['price'].'</p>
          <input type="number" class="quantity" name="quantity" min="1" max="50"  step="1" value="1" required>
          <button class = "addToCart" type="button" name="button">Add to Cart</button>
        </div>
        ';
      }
    }
      break;
  }

}
