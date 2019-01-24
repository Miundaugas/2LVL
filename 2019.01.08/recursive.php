<?php
    
$array = [2, 6, 7, 8,[6,8,'5g'],6,[1,['k6']],'h'];

function numbers($array, $sum = 0){
    if(is_array($array)){
        foreach($array as $value) {
            $sum += numbers($value);
        }    
    } elseif (is_integer($array)) {
        $sum += $array;
    }
    return $sum;
}     

echo numbers($array);

