<?php

$yil = 12 ;

switch($yil) {
    case 1:
        $rang = "yashil" ;
        $burj =  "sichqon" ;
        break ;
    case 2:
        $rang = "qizil" ;
        $burj =  "sigir" ;
        break ;
    
    case 3:
        $rang = "sariq" ;
        $burj =  "yo'lbars" ;
        break ;
    case 4:
        $rang = "oq" ;
        $burj =  "quyon" ;
        break ;
    case 5:
        $rang = "qora" ;
        $burj = "ajdar" ;
        break ;
    case 6:
        $rang = "yashil" ;
        $burj =  "ilon" ;
        break ;
    case 7:
        $rang = "qizil" ;
        $burj =  "ot" ;
        break ;
    case 8:
        $rang = "sariq" ;
        $burj =  "qo'y" ;
        break ;
    case 9:
        $rang = "oq" ;
        $burj =  "maymun" ;
        break ;
    case 10:
        $rang = "qora" ;
        $burj = "tovuq" ;
        break ;
    case 11:
        $rang = "yashil" ;
        $burj = "it" ;
        break ;
    case 12:
        $rang = "qizil" ;
        $burj =  "to'ng'iz" ;
        break ;
    default : 
        $rang = "Please enter your birth" ;
        $burj = "I couldn't find " ;

}
echo " $rang $burj yili" ;
?>