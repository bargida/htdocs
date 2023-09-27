<?php

$num = $_POST["num"] ;

$num1 = floor($num / 100) ;

$num2 = floor($num / 10);

$birlik = $num % 10;

$total = $num1 + $num2 + $birlik ;

echo "Yuzliklar xonasi:$num1 <br>";

echo "O'nliklar xonasi:$num2 <br>";

echo "Birliklar xonasi: $birlik <br>";

echo "Raqamlar yig'indisi: $total ga teng";


?>