<?php

namespace app\files;

class FilesData
{
    private $file;
    public function __construct(array $file = []){
        $this->file= $file;
    }
    public function sizeFile(){
        if(isset($this->file['size'])){
            try{
                if($this->file['size'] <= 2097152){
                    print_r($this->file['size']);
                }
            }catch(\Exception $e){
                var_dump('Arquivo muito grande!');
            }
        }
    }
    
}