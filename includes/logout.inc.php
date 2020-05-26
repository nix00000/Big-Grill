<?php
session_start();
unset($_SESSION['person']);
unset($_SESSION['cart']);

header("Location:../index");
