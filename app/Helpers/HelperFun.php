<?php
 function objToArr($arr){
    $arr1 = [];
    foreach ($arr as $item){
        $item->power_id == 1 ?  array_push($arr1,$item->value.'hp') :  array_push($arr1,$item->value.'kw')
       ;
    }
    return $arr1;
}

function engineObjToArr($arr){
    $arr2=[];
    foreach($arr as $a){
        array_push($arr2,$a->value . 'cc');
    }
    return $arr2;
}