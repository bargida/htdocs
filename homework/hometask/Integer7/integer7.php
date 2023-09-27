<?php

$num = $_POST["number"] ;

$num1 = floor($num / 10) ;

$birlik = $num % 10;

$total = $num1 + $birlik ;

echo "O'nliklar xonasi:$num1 <br>";

echo "Birliklar xonasi: $birlik <br>";

echo "Raqamlar yig'indisi: $total ga teng";


?>