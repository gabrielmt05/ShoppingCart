<?php

namespace app\model;
use app\model\Read;

class User extends Read
{
    public $table = ['name' => 'gabriel', 'email' => 'gabrilopesmt@gmail.com', 'password' => '123'];
    public static function user(){
       $instance = new self();
       return $instance->getTable(); 
    }

}