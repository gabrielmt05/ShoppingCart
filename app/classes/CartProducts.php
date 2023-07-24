<?php

namespace app\classes;
use app\interface\Cartinterface;
use app\model\Read;

class CartProducts extends Read{
    protected $productsInCart;
    protected $productsInDataBase;
    public function __construct(Cartinterface $cartinterface){
        $this->productsInCart = $cartinterface->cart();
        $this->productsInDataBase = (new Read)->all("products");
    }
    public function products(){
        $productsData = [];
        $total = 0;
        foreach($this->productsInCart as $productId => $quantity){
            $product = array_values(array_filter($this->productsInDataBase, fn ($product) => (int)$product->id === $productId));
            if (!empty($product)) {
                $productData = [
                    'id' => $productId,
                    'name' => $product[0]->name,
                    'price' => $product[0]->price,
                    'qty' => $quantity,
                    'subtotal' => $quantity * $product[0]->price
                ];

                $productsData[] = $productData;
                $total += $productData['subtotal'];
            }
        }
        return ['products' => $productsData, 'total' => $total];
    }
}

