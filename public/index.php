<?php

session_start();

require realpath(dirname(__FILE__, 2) . "/vendor/autoload.php");

use app\model\User;
use app\classes\Cart;
use app\classes\CartProducts;
use app\database\DataBase;
use app\model\Read;
use app\model\Model;

$cart = new Cart;
$read = new Read;
$products = $read->all('products');
?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css"> 
    <title>Cart</title>
</head>
<body>
<header class="cabecalho">
    <img class="logo" src="../css/kabum.png">
</header>
<nav class="navegacao">
    <h1 class="titulo-nav"><a href="cart.php">Cart <?php echo count($cart->cart()) ?></a> | Home</h1>
</nav>
<main class="principal">
<div id="conteiner">
    <ul>
    <?php foreach($products as $product):?>
        <li>
            <?php echo $product->name;?> | R$ <?php echo number_format($product->price, 2,',','.'); ?>
            | <a href="add.php?id=<?php echo $product->id ?>">add to cart </a>
            <hr>
        </li>
    <?php endforeach?>
    </ul>
</div>
</main>
<footer class="rodape">
    <p>rodapé</p>
</footer>
</body>
</html>

