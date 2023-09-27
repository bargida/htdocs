<?php

$n = $_POST["n"] ;

$num1 = floor($n / 100) ; 

$num2 = $n / 10 ; 

$birlik = $n % 10 ;

$c = $num1 ;

$d = $num2 ; 

$num1 = $birlik ;

$num2 = $d ;

$birlik = $c ;

echo "birinchi raqam $birlik ga teng: <br>";

echo "ikkinchi raqam  $num2 ga teng: <br>";

echo "uchinchi raqam  $num1 ga teng:";

?>