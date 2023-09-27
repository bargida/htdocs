<?php
$n = 120;

$sekund = ($n / 60);

echo "$sekund sekund utdi, ";

$n = 7260;

$hours = floor($n / 3600);

$minutes = floor(($n -($hours*3600))/60);

echo "$hours soatu $minutes minut utdi";


?>
