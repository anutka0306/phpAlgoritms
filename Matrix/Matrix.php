<?php


class Matrix
{
    public $x;
    public $y;
    public $arr = [];

    public function __construct($x, $y, $arr=[])
    {
        $this->x = $x;
        $this->y = $y;
        $this->arr = $arr;
    }

    public function createMatrix()
    {
     $i = $this->y;
     while ($i > 0){
         $subarr = [];
         for($count = 1; $count <= $this->x; $count++){
             $subarr[] = 0;
         }
         $this->arr[] = $subarr;
         $i--;
     }
    // return $this->arr;
     return $this->fillMatrix($this->arr, $this->x, $this->y);
    }

    public function fillMatrix($arr, $x, $y)
    {
        $prefix = '';
        if($x * $y > 9){
            $prefix = 0;
        }
        $s = 1;
        for ($i = 0; $i < $x; $i++) {
            ((int)$s < 10) ? $arr[0][$i] = $prefix . $s : $arr[0][$i] = $s;
        $s++;
    }
         for ($j = 1; $j < $y; $j++) {
             ((int)$s < 10) ? $arr[$j][$x - 1] = $prefix . $s : $arr[$j][$x - 1] = $s;
         $s++;
     }
         if($y > 1) {
             for ($i = $x - 2; $i >= 0; $i--) {
                 ((int)$s < 10) ? $arr[$y - 1][$i] = $prefix . $s : $arr[$y - 1][$i] = $s;
                 $s++;
             }
         }
         if($x > 1) {
             for ($j = $y - 2; $j > 0; $j--) {
                 ((int)$s < 10) ? $arr[$j][0] = $prefix . $s : $arr[$j][0] = $s;
                 $s++;
             }
         }

       $c = 1;
        $d = 1;
        while($s < $x * $y){

            //Go Right
            while($arr[$c][$d+1] == 0){
                ((int)$s < 10) ? $arr[$c][$d] = $prefix . $s : $arr[$c][$d] = $s;
                $s++;
                $d++;
            }
            //Go Down
            while ($arr[$c+1][$d]==0){
                ((int)$s < 10) ? $arr[$c][$d] = $prefix . $s : $arr[$c][$d] = $s;
                $s++;
                $c++;
            }
            //Go Left
            while ($arr[$c][$d-1] == 0){
                ((int)$s < 10) ? $arr[$c][$d] = $prefix . $s : $arr[$c][$d] = $s;
                $s++;
                $d--;
            }
            //Go Up
            while ($arr[$c-1][$d] == 0){
                ((int)$s < 10) ? $arr[$c][$d] = $prefix . $s : $arr[$c][$d] = $s;
                $s++;
                $c--;
            }


        }

        for($i=0; $i < $y; $i++){
            for($j = 0; $j < $x; $j++){
                if($arr[$i][$j] == 0){
                    ((int)$s < 10) ? $arr[$i][$j] = $prefix . $s : $arr[$i][$j] = $s;
                }
            }
        }



        $result = "\n";
        foreach ($arr as $subarr){
            $subarr = implode(" ", $subarr);
            $result .= $subarr . "\n";
        }
        return $result;

    }
}