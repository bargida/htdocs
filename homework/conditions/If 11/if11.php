<?php

// $a = 12;

// $b = 6 ;

// if($a > $b)
//     $max = $a;

// elseif($a < $b)
//     $max = $b ;

// elseif($a == $b)
//     $max = 0;
// echo "A : $a ga teng <br> B $b ga teng <br> Max value : $max " ;


$n = 153 ;
$sum = 0 ;
$t = $n ;
while($n > 0){
    $a = $n/10 ;
    $sum =  $sum + ($a * $a * $a) ;
    $n = intval(($n/10)) ;
    if($t == $sum){
        echo('YES') ;
    }
    else{
        echo('NOT') ;
    }

}
?>