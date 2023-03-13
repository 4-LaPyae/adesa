<?php
namespace App\Operation;

class HpKwOperation{
    private $arr;
    public function __construct($arr)
    {
        $this->arr = $arr;
    }

    public function objToArr(){
        $arr1 = [];
        foreach ($this->arr as $item){
            array_push($arr1,$item->name);
        }
        return $arr1;
    }
}


