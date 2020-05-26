<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Big Grill restaurant. We serve great food.">
    <meta name="keywords" content="Pizza,veggie options, burgers, beverages,salads, fries, popcorn">
    <meta name="author" content="Nikola Grubor">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Big Grill</title>
    <link rel="stylesheet" href="css/header.css">
    <script src="jquery/jquery.js"></script>
    <script src = 'js/header.js'></script>
  </head>
  <body>
    <div class="nav">
      <div class="logo-container">
        <div class="logo-image">
          <p><img src="images/logo.png" alt="Big Grill"></p>
        </div>
        <div class="logo-text">
          <h1>Big Grill</h1>
        </div>
      </div>

      <div class="nav-links">
        <?php
        $admin = '
        <ul>
        <a href="index"><li><p>Home</p></li></a>
        <a href="menu"><li><p>Menu</p></li></a>
        <a href="locations"><li><p>Locations</p></li></a>
        <a href="about"><li><p>About</p></li></a>
        <a href="jobs"><li><p>Jobs</p></li></a>
        <a href="edit"><li><p>Edit</p></li></a>
        <a href="orders"><li><p>Orders</p></li></a>
        </ul>
        ';
        $user = '
        <ul>
        <a href="index"><li><p>Home</p></li></a>
        <a href="menu"><li><p>Menu</p></li></a>
        <a href="locations"><li><p>Locations</p></li></a>
        <a href="about"><li><p>About</p></li></a>
        <a href="jobs"><li><p>Jobs</p></li></a>
        <a href="contact"><li><p>Contact</p></li></a>
        </ul>
        ';

        if (isset($_SESSION['person'])) {
          if ($_SESSION['person'][2] == 1) {
            echo $admin;
          }else{
            echo $user;
          }
        }else{
          echo $user;
        }
         ?>
      </div>

      <div class="acc">
        <?php
        if (!isset($_SESSION['person'])) {
          echo '
          <ul>
            <li><a id = "login-form">Login</a> </li>
            <li><a id = "register-form">Register</a> </li>
          </ul>
          ';
        }else {
          echo '
          <a href="account">
              <h3>'.$_SESSION['person'][1].'</h3>
          </a>
          ';
        }
         ?>


      </div>

    </div>


    <?php

    if (!isset($_SESSION['person'])) {
      echo '
      <!-- login -->
      <div class="login-wrap">
        <div class="login">
          <h2>My Account</h2>
          <button class= "exit" type="button" name="exit">X</button>
          <table>
            <form  method="post" action="includes/account.handle.php">

              <tr>
                <td><label for="email">Email</label></td>
                <td><input type="email" name="email"></td>
              </tr>
              <tr>
                <td><label for="password">Password</label></td>
                <td><input type="password" name="password"></td>
              </tr>
          </table>
            <button class = "login-submit" type="submit" name="login">Log In</button>
            <small><p>Don\'t have an account? Click <a class="tt" href="#">here</a> to sign up </p></small>

          </form>


        </div>


      </div>


      <!-- Register -->
      <div class="register-wrap">
        <div class="register">
          <h2>My Account</h2>
          <button class= "exit" type="button" name="exit">X</button>
          <table>
            <form  method="post" action="includes/account.handle.php">
              <tr>
                <td><label for="name" >Name</label></td>
                <td><input type="text" name="name" required></td>
              </tr>
              <tr>
                <td><label for="username">Email</label></td>
                <td><input type="email" name="email" required></td>
              </tr>
              <tr>
                <td><label for="password">Password</label></td>
                <td><input type="password" name="password" required></td>
              </tr>
          </table>
            <button class = "register-submit" type="submit" name="register">Sign Up</button>
            <small><p>Have an account? Click <a href="#" class="tt">here</a> to log in</p></small>

          </form>


        </div>


      </div>
      ';
    }
     ?>
