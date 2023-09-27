<?php

$x = 4 ;

$y = 6 ;
 
$z = 9 ;

if($x > $y and $x > $z)
   $max = $x ;
elseif($y > $z and $y > $x)
    $max = $y ;
else
    $max = $z ;
echo $max ;

?>