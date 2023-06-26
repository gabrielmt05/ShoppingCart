<?php

session_start();

require realpath(dirname(__FILE__, 2) . "/vendor/autoload.php");

use app\classes\Cart;
use app\classes\CartProducts;
use app\database\DataBase;

$products = require realpath(dirname(__FILE__, 2) . "/app/helpers/products.php");
$cart = new Cart;

?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<body>
<h1><a href="cart.php">Cart</a> | Home</h1>
<div id="conteiner">
    <ul>
    <?php foreach($products as $index => $product):?>
        <li>
            <?php echo $product['name'];?> | R$ <?php echo number_format($product['price'], 2,',','.');?>
            | <a href="add.php?id=<?php echo $index ?>">add to cart </a>
        </li>
    <?php endforeach?>
</div>
</body>
</html>
<?php 
