<?php

$month = 6 ;

switch($month){
    case 1 :
    case 2 :
    case 12 :
        $m = "Winter" ;
        break ;
    case 3:
    case 4 :
    case 5 :
        $m = "Spring" ;
        break ;
    case 6 :
    case 7 :
    case 8 :
        $m = "Summer" ;
        break ;
    case 9 :
    case 10 :
    case 11 :
        $m = "Autumn" ;
        break ;
    default :
        $m = "There isn't this month" ;
    
}
echo "Month is : $m " ;