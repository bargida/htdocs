<?php

$a = 5 ;

$b = 9 ;

$condition = 7 ;

switch($condition){

    case 1 :
        $res = $a + $b ;
        break ; 
    case 2 :
        $res = $a - $b ;
        break ; 
    case 3 :
        $res = $a / $b ;
        break ; 
    case 4 :
        $res = $a * $b ;
        break ; 
    default :
        $res = "please enter your condition" ;
}
echo"Number A: $a <br> Number B: $b <br> Result is : $res " ;

?>