<?php

$x = 3 ;

$y = 5 ;
 
$z = 12 ;

if($x > $y && $x > $z)
   $max = $x ;
elseif($y > $z and $y > $x)
    $max = $y ;
else
    $max = $z ;

if($x < $y && $x < $z)
    $min = $x ;
 elseif($y < $z and $y < $x)
     $min = $y ;
 else
     $min = $z ;

echo "Max value : $max <br>  Minimum value : $min" ;

?>