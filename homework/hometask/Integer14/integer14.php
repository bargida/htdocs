<?php

$n = $_POST["n"] ;

$num1 = floor($n / 100) ; 

$num2 = ($n / 10) % 10 ; 

$birlik = $n % 10 ;

$c = $birlik ;

$d = $num1 ;

$birlik = $d;


echo "birinchi raqam $c ga teng: <br>";

echo "ikkinchi raqam  $num2 ga teng: <br>";

echo "uchinchi raqam  $birlik ga teng:";

?>