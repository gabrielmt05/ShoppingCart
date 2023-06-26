<?php
// session_start();

namespace app\classes;
use app\interface\Cartinterface;

class Cart implements Cartinterface
{
    public function add($product){
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = [];
        }
        (!isset($_SESSION['cart'][$product]))?
            $_SESSION['cart'][$product] = 1 :
            $_SESSION['cart'][$product] += 1;
    }
    public function remove($product){
        if(isset($_SESSION['cart']) && isset($_SESSION['cart'][$product])){
            if($_SESSION['cart'][$product] > 1){
                $_SESSION['cart'][$product] -= 1;
            } else {
                unset($_SESSION['cart'][$product]);
            }
            return true; // Indica que a quantidade do produto foi removida com sucesso
        }
        return false; // Indica que o produto não foi encontrado ou o carrinho está vazio
    }
    
    public function quantity($product, $quantity){
        if(isset($_SESSION['cart'][$product])){
            if($quantity === 0 || $quantity === ''){
                $this->remove($product);
                return true; // Indica que a quantidade do produto foi removida com sucesso
            }
            $_SESSION['cart'][$product] = $quantity;
            return true; // Indica que a quantidade do produto foi atualizada com sucesso
        }
        return false; // Indica que o produto não foi encontrado no carrinho
    }
    
    public function clear(){
        if(isset($_SESSION['cart'])){
            unset($_SESSION['cart']);
        }
    }
    public function cart(){
        if(isset($_SESSION['cart'])){
            return $_SESSION['cart'];
        }
        return [];
    }
    public function dump(){
        if(isset($_SESSION['cart'])){
            print_r($_SESSION['cart']);
        }
    }
}