<?php

namespace app\model;

use app\database\Connect;
use app\model\Model;

class Read extends Model
{
    public function all($table, $filters = '*'){
        try{
            $connect = Connect::connect();
            $query = $connect->query("SELECT {$filters} FROM {$table}");
            $query->execute();
            return $query->fetchALL();
        }catch(\Throwable $th){
            var_dump($th->getMessage());
        }
    }
}