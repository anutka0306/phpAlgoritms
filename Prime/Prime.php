<?php


class Prime
{

    public function __construct()
    {

    }

  private function isPrime($number)
    {
        if ($number%2==0) {
            return false;
        }
        $i=3;
        $max_factor = (int)sqrt($number);
        while ($i<=$max_factor){
            if ($number%$i == 0)
                return false;
            $i+=2;
        }
        return true;
    }

   public function getPrimes($primeCount){
        $primes = new SplStack();
        $primes->push(2);
        for($i=3, $count=1; $count < $primeCount; $i+=2){
            if($this->isPrime($i)){
                $primes->push($i);
                $count++;
            }
        }
        return $primes->top();
    }

}