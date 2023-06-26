<?php

namespace app\classes;
use app\interface\Cartinterface;

class CartProducts{

    public function __construct(private Cartinterface $cartinterface)
    {    
    }
    public function products(){
        $productsInCart = $this->cartinterface->cart();
        $productsInDataBase = require realpath(dirname(__FILE__, 2) . '/helpers/products.php');
        $products = [];
        $total = 0;
        
        foreach($productsInCart as $productId => $quantity){
            $product = $productsInDataBase[$productId];
            $productsData = [
                'id' => $productId,
                'product' => $product['name'],
                'price' => $product['price'],
                'qty' => $quantity,
                'subtotal' => $quantity * $product['price']
            ];
            array_push($products, $productsData);
            $total += $productsData['subtotal'] + $quantity;
        }
        return ['products' => $products, 'total' => $total];
    }
}