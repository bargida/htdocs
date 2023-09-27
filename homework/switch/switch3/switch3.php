<?php

$seasons = 3 ;

switch($seasons){
    case 1 :
        $m = "Winter" ;
        $month = "December" ; 
        $month1 = "January" ; 
        $month2 = "February" ;
        break ;
    case 2:
        $m = "Spring" ;
        $month = "March" ;
        $month1 = "April" ; 
        $month2 = "May" ;
        break ;
    case 3 :
        $m = "Summer" ;
        $month = "Juny" ; 
        $month1 = "July" ; 
        $month2 = "August" ;
        break ;
    case 4 : 
        $m = "Autumn" ;
        $month = "September" ;
        $month1 = "October" ; 
        $month2 = "November" ;
        break ;
    default :
        $m = "There isn't this month" ;
    
}
echo "Months of $m : <br> $month <br> $month1 <br> $month2 " ;