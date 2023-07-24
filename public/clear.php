<?php

session_start();

require realpath(dirname(__FILE__, 2) . "/vendor/autoload.php");
require 'add.php';

use app\classes\Cart;

$cart = new Cart();
$cart->clear();

header('location:cart.php');