<?php
$arr = [1, 2 ,3, 4, 5, 6, 7, 8, 9, 10, 12, 13, 14, 15, 16];

function findLost($arr){
    while(count($arr) > 3){
        $left = array_slice($arr, 0, count($arr)/2);
        $right = array_slice($arr, count($arr)/2);

        if((end($left) - $left[0] + 1) == count($left)){
            $arr = $right;
            if((end($arr) - $arr[0] + 1) == count($arr)){
                return $arr[0] - 1;
            }
        }
        else{
            $arr = $left;
            if((end($arr) - $arr[0] + 1) == count($arr)){
                return $arr[0] + 1;
            }
        }
    }
    if($arr[1] - $arr[0] == 1){
        return $arr[1] + 1;
    }else{
        return $arr[1] - 1;
    }

}

echo "Lost element is: " .findLost($arr);


?>
