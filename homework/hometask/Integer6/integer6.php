<?php

$num = $_POST["num"] ;

$num1 = floor($num / 10) ;

$birlik = $num % 10;

echo"O'nliklar xonasidagi raqam: $num1 ga teng,<br> Birliklar xonasidagi raqam: $birlik ga teng" ;

?>