<?php

$month = 1 ;

switch($month) {
    case 1:
        $a =  "January" ;
        break ;
    case 2:
        $a =   "February" ;
        break ;
    
    case 3:
        $a =   "March" ;
        break ;
    case 4:
        $a =  "April" ;
        break ;
    case 5:
        $a = "May" ;
        break ;
    case 6:
        $a =   "Juny" ;
        break ;
    case 7:
        $a = "July" ;
        break ;
    case 8:
        $a = "August" ;
        break ;
    case 9:
        $a = "September" ;
        break ;
    case 10:
        $a = "October" ;
        break ;
    case 11:
        $a =   "November" ;
        break ;
    case 12:
        $a =   "December" ;
        break ;
    default : 
        $a = "This month isn't available" ;
}
echo $a ;
?>