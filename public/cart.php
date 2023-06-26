<?php

session_start();

require realpath(dirname(__FILE__, 2) . "/vendor/autoload.php");
use app\classes\CartProducts;
use app\classes\Cart;

$cart = new CartProducts(new Cart);
$products = $cart->products();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Cart | <a href="index.php">Home</a></h1>
    <h2>PRODUCTS IN CART</h2>
    <div id="continer">
    <?php if(count($products['products']) <= 0): ?>
    <h3>nenhum produto no carrinho</h3>    
    <?php else: ?>
        <ul>
    <?php foreach($products['products'] as $product):?>
        <li>
        <?php echo $product['product']; ?>
        <form action="quantity.php" method="get">
            <input type="text" name="qty" value="<?php echo $product['qty'] ?>" id="cart-input-qty">
            <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
        </form> x <?php echo number_format($product['price'], 2,',','.') ?>
        <a href="remove.php?id=<?php echo $product['id'] ?>">remove</a>
        </li>
        <?php endforeach ?>
        </ul>
        <div>
            <span>
                Total R$ <?php echo number_format($products['total'], 2,',','.') ?>
            </span>
        </div>
        <div class="cart-clear">
            <a href="clear.php?id=<?php echo $product['id'] ?>">clear Cart</a>
        </div>
        <?php endif ?>
    </div>
</body>
</html>
