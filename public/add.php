<?php

session_start();

require realpath(dirname(__FILE__, 2) . "/vendor/autoload.php");

use app\classes\Cart;

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_ENCODED);

$cart = new Cart;
$cart->add($id);

header('location:index.php');