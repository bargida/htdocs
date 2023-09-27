<?php

$month = 2 ;

switch($month) {
    case 1:
        $m = "Januay" ;
        $day =  "31" ;
        break ;
    case 2:
        $m = "February" ;
        $day = "28" ;
        break ;
    
    case 3:
        $m = "March" ;
        $day =   "31" ;
        break ;
    case 4:
        $m = "April" ;
        $day =  "30" ;
        break ;
    case 5:
        $m = "May" ;
        $day = "31" ;
        break ;
    case 6:
        $m = "Juny" ;
        $day =   "30" ;
        break ;
    case 7:
        $m = "July" ;
        $day = "31" ;
        break ;
    case 8:
        $m = "August" ;
        $day = "31" ;
        break ;
    case 9:
        $m = "September" ;
        $day = "30" ;
        break ;
    case 10:
        $m = "October" ;
        $day = "31" ;
        break ;
    case 11:
        $m = "November" ;
        $day =   "30" ;
        break ;
    case 12:
        $m = "December" ;
        $day = "31" ;
        break ;
    default : 
        $day = "I couldn't calculate it" ;
}
echo "There is $day day in $m month" ;
?>