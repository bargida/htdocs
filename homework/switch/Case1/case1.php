<?php

$weekdays = 7 ;

switch($weekdays) {
    case 1:
        $a =  "Monday" ;
        break ;
    case 2:
        $a =  "Tuesday" ;
        break ;
    
    case 3:
        $a =   "Wednesday" ;
        break ;
    case 4:
        $a =  "Thursday" ;
        break ;
    case 5:
        $a = "Friday" ;
        break ;
    case 6:
        $a =   "Saturday" ;
        break ;
    case 7:
        $a = "Sunday" ;
        break ;
    default:
        $a =  "There isn't such as weekday" ;
    }
        echo "Today is : $a " ;