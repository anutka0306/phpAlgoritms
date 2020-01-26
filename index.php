<?php
include_once 'numberGenerator.php';

generateNumbers();
function readNum($fileName, $length){
    $lines = [];
    $numArray = [];
    $result = [];
    $transfer = 0;
    //если есть файл, то достаем строки в массив
    if($fileName){
     $lines = file($fileName);
     if(count($lines) == 3){
         unset($lines[2]);
     }
    }
    //если не одинаковое количество цифр, то добавляем нули вперед числа, где меньше цифр
    if(strlen($lines[0]) != strlen($lines[1])) {
        $diff = abs(strlen($lines[0]) - strlen($lines[1]));
        $string = '';
        while($diff != 0){
            $string .= '0';
            $diff--;
        }
        if(strlen($lines[0]) - strlen($lines[1]) > 0){
            $lines[1] = $string . $lines[1];
        }else{
            $lines[0] = $string . $lines[0];
        }
    }
    for($i = 0; $i < count($lines); $i++){
        $numArray[] = str_split($lines[$i], 4);
    }

    for($i = count($numArray[0])-1; $i>=0; $i--){
        $sum = (string)((int)$numArray[0][$i] + (int)$numArray[1][$i] + $transfer);
        if(strlen($sum) != strlen((string)$numArray[0][$i])){
            if($i == 0){
                $result[] = (string)$sum;
            }else {
                $sum = substr($sum, 1);
                $result[] = $sum;
                $transfer = 1;
            }
        }else {
            $result[] = (string)$sum;
            $transfer = 0;
        }
    }
    $result = array_reverse($result);
    array_push($lines, implode($result));
    file_put_contents($fileName, '');
    for($i = 0; $i <= count($lines) - 1; $i++){
        file_put_contents($fileName, $lines[$i].PHP_EOL, FILE_APPEND);
    }
    $lines =[];
   // return $numArray[1][0];
    return $result;
    //return ceil(log10($numArray[0][250]));
}

var_dump(readNum("chisla.txt", 4));
