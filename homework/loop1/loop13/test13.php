<?php

$n = 4 ;

$s = -1.2 ;

for($i = 1; $i <= $n; $i++) {
    $s = $s + $i ;
    echo $s."<br>" ;
    for($i = 1; $i <= $n; $i++) {
        $s = $s - $i ;
        echo $s."<br>" ;
    }
} 

?>