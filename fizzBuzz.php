<?php

$_FIZZ = "fizz";
$_BUZZ = "buzz";
$_FIZZ_BUZZ = "fizzBuzz";

function fizzBuzz($num){
    global $_FIZZ;
    global $_BUZZ;
    global $_FIZZ_BUZZ;
    if ($num % 3 === 0  && $num % 5 === 0){
        return $_FIZZ_BUZZ;
    }
    if ($num % 3 === 0){
        return $_FIZZ;
    }
    if ($num % 5 === 0){
        return $_BUZZ;
    }
    return $num;

}

function test(){
    global $_FIZZ;
    global $_BUZZ;
    global $_FIZZ_BUZZ;
    if (fizzBuzz(3) === $_FIZZ){
        echo "fizzBuzz(3) -> $_FIZZ : OK";
    } else {
        throw new Exception("should fizzBuzz return $_FIZZ");    
    }

    if (fizzBuzz(15) === $_FIZZ_BUZZ){
        echo "fizzBuzz(15) -> $_FIZZ_BUZZ : OK";
    } else {
        throw new Exception("should fizzBuzz return $_FIZZ_BUZZ");    
    }

    if (fizzBuzz(2) === 2){
        echo "fizzBuzz(2) -> 2 : OK";
    } else {
        throw new Exception("should fizzBuzz return 2");    
    }

    if (fizzBuzz(5) === $_BUZZ){
        echo "fizzBuzz(5) -> $_BUZZ : OK";
    } else {
        throw new Exception("should fizzBuzz return $_BUZZ");    
    }
}

function main(){
    // test();
    for ($i=1; $i < 101 ; $i++) { 
        echo fizzBuzz($i);
        echo "\n";
    }
}

main();