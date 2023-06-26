<?php

namespace app\classes\database;
class DataBase
{
    public array $products = [];
    public function __construct(array $products){
        $this->products = $products;
    }
    public function __set($products, $index){
        $this->products = $index;
    }
    public function __get($products){
        return $this->products;
    }
    public function LoadFromArray(array $products){
        if($products){
            foreach($products as $index){
                return print_r($index);
            }
        }
    }
}