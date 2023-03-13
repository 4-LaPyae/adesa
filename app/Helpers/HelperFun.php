<?php
 function objToArr($arr){
    $arr1 = [];
    foreach ($arr as $item){
        $item->power_id == 1 ?  array_push($arr1,$item->value.'hp') :  array_push($arr1,$item->value.'kw')
       ;
    }
    return $arr1;
}