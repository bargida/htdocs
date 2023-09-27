<?php

$katet = 12 ;

$gipotenuza = floor( $katet * sqrt(2) );

$condition = 2 ;

switch($condition) {
    case 1 :

        $gipotenuza = floor( $katet * sqrt(2) );

        $g_balandlik = $gipotenuza / 2;

        $yuzasi = ( $gipotenuza * $g_balandlik ) / 2;

        break ;

    case 2 :

        $res = $katet ;

        $g_balandlik =  $gipotenuza / 2  ;

        $yuzasi = ( $gipotenuza * $g_balandlik ) / 2 ;

        break ;

    case 3 :
        $res = $katet ;

        $gipotenuza = floor( $katet * sqrt(2) );

        $yuzasi = ($gipotenuza * $g_balandlik ) / 2;

        break ;

    case 4 :

        $res = $katet ;

        $gipotenuza = floor( $katet * sqrt(2) );

        $g_balandlik = $gipotenuza / 2;

        break ;

    default :

    $res = "Not found" ;
}
 echo "Katet : $katet berilgan <br> Result are >>>>>>>>> <br> Gipotenuzasi is $gipotenuza <br> Balandligi : $g_balandlik <br> Yuzasi :  $yuzasi ga teng " ;