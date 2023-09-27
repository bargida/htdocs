<?php

$a = 235 ;

$res1 = floor($a /100) ;

$res2 = floor($a /10) % 10 ;

$res3 = floor($a /10) ;

$total = (($res1 <= $res2) and ($res1 <= $res3 ) and($res2 <=$res3)) ;


echo "Total : $total" ;

?>