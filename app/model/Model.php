<?php

namespace app\model;

use app\database\Connect;
use ReflectionClass;

abstract class Model
{   
    protected $table = null;
    protected $connect;
    public function __construct(){
        $this->connect = Connect::connect();
        // $this->table = (new ReflectionClass($this))->getShortName();
    }
    public function __set($attributes, $value){
        $this->table[$attributes] = $value;
    }
    public function __get($value){
        return $this->table[$value];
    }
    public function getTable(){
        return $this->table;
    }
}