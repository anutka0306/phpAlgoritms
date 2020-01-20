<?php
function biggestPrime($num){
    $primes = [];
    $primes = getPrimes($num, $primes, $i = 2);
    return $primes;
}

function getPrimes($num, $primes, $i)
{

    while(!isPrime($num)) {
        if (gmp_div_r("$num", "$i") == 0) {
            $primes[] = $i;
            $num = $num / $i;
        }
        $i++;
    }
    $primes[] = $num;
    return $primes;
}


function isPrime($num){
    if($num < 2 || $num % 2 == 0 && $num !== 2){
        return false;
    }
    $max = gmp_sqrt("$num") + 1;
    $start = 3;
    while ($start < $max){
        if($num % $start == 0){
            return false;
        }
        $start += 2;
    }
    return true;
}

//var_dump(biggestPrime(600851475143));
echo "The biggest number is: ".max(biggestPrime(600851475143));





