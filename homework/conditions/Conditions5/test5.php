<?php

$a = 6 ;

$b = 4 ;

$c =  1;

if($a >= $b and $b >= $c) {
    $a *= 2; 
    $b *= 2; 
    $c *= 2;
} else {
    $a = abs($a); 
    $b = abs($b); 
    $c = abs($c);
}
echo "Natijalar: a = $a, b = $b, c = $c";

?>