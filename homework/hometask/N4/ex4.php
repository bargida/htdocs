<?php

//N4
$a = $_POST["a"] ;

$c = $_POST["c"] ; 

$b = round( sqrt (pow($c, 2) - pow($a, 2)));

$r = round(($a + $b + $c) / ($a * $b));

echo "Uchburhakning ikkinchi kateti: $b<br>";
echo"Ichki chizilgan aylana radiusi: $r";

?>