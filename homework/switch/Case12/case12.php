<?php

$radius = 4 ;

$condition = 3 ;

switch($condition) {
    case 1 :

        $res= 2 * $radius ;

        $res1 = floor(2 * pi() * $radius );

        $res2 = floor( pi() * pow($radius, 2) ) ;

        break ;

    case 2 :

        $result = $radius ;

        $res1 = floor(2 * pi() * $radius );

        $res2 = floor( pi() * pow($radius, 2) ) ;

        break ;

    case 3 :
        $result = $radius ;

        $res = 2 * $radius ;

        $res2 = floor(2 * pi() * pow($radius, 2) );

        break ;

    case 4 :

        $result = $radius ;

        $res = 2 * $radius ;

        $res1 = floor(2 * pi() * $radius );


        

        break ;
    default :

    $result = "Not found" ;
}
 echo "Radiusi : $radius berilgan <br> Result are >>>>>>>>> <br> Diametri is $res <br> Uzunligi : $res1 <br> Doiraning yuzi $res2 " ;