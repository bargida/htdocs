<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//************beginning of the integer part ************************
Route::get('/data1/{m}', function ($m,){
    $t = floor($m / 1000) ;

    return $t ;
});

//***** integer 2 *************
Route::get('/data2/{l}', function ($l,){
    $d = floor($l / 100) ;

    return $d ;
});

//***** integer 3 *************
Route::get('/data3/{hajm}', function ($hajm,){
   $kilobayt = floor($hajm / 1024) ;
    return $kilobayt;
});

//***** integer 4 *************
Route::get('/data4/{a}/{b}', function ($a, $b,){
    $result = floor($a / $b );
 
     return $result;
 });

 //***** integer 5 *************
Route::get('/data5/{a}/{b}', function ($a, $b,){
    $d = $a % $b ;
 
     return "Joylashmagan qismi: $d ";
 });

 //***** integer 6 *************
Route::get('/data6/{number}', function ($number,){
    $num1 = floor($number / 10) ;

    $birlik = $number % 10;

    return "O'nliklar xonasidagi raqam: $num1 ga teng,<br> Birliklar xonasidagi raqam: $birlik ga teng" ;
 });

 //***** integer 7 *************
Route::get('/data7/{num}', function ($num,){
    $num1 = floor($num / 10) ;

    $birlik = $num % 10;

    $res = $num1 + $birlik ;
    return "O'nliklar xonasi:$num1 ga teng <br> 
    Birliklar xonasi: $birlik ga teng<br>
    Raqamlar yig'indisi: $res ga teng" ;
   
 });

 //***** integer 8 *************
Route::get('/data9/{c}', function ($c,){

    $number = floor($c / 10) ;

    $birlik = $c % 10;

    $d= $number ;

    $number = $birlik;


    $birlik = $d ;
 
     return "birinchi raqam $number ga teng: <br>
     ikkinchi raqam  $birlik ga teng:";
 });

 //***** integer 9 *************
Route::get('/data9/{a}', function ($a,){

    $result = floor($a / 100) ;
    return "Yuzlar xonasidagi son: $result ga teng: " ;
 
 });

 //***** integer 10 *************
Route::get('/data10/{m}', function ($m,){

    $num2 = floor($m / 10) ;

    $num3 = $m % 10;
 
     return " O'nliklar xonasi:$num2 ga teng <br> 
     Birliklar xonasi: $num3 ga teng";
 });
//************beginning of the condition part ************************
Route::get('/condition1/{b}', function ($b,){

    $b = 0 ;

    if($b > 0)
        $b++;
    else
        $b ;
    
    return"$b" ;


});

//***** condition 2 *************
Route::get('/condition2/{c}', function ($c,){
    $c = 0 ;

    if($c > 0)
        $c++; 
    elseif($c < 0)
        $c = $c - 2 ;
    return "$c";

});

//***** condition 3 *************
Route::get('/condition3/{d}', function ($d,){
    $d = 0 ;

    if($d > 0) 
        $d++; 
    elseif($d < 0)
        $d = $d - 2 ;

    elseif($d == 0)
        $d = 10;
        return "$d";
    
});
//************condition 4************************
Route::get('/condition4/{a}/{b}/{c}', function ($a, $b, $c,){
    $n = 0 ;

    if ($a and $b > 0) 
        $n++;
    
    elseif($a and $c > 0)
        $n++;

    elseif($b and $c > 0)
        $n++;

    return "Musbat sonlar soni: $n" ;
    
});

//*************condition 6*********
Route::get('/condition6/{num1}/{num2}', function ($num1, $num2,){
    if($num1 > $num2) 
        $max = $num1 ;
    elseif($num1 < $num2)   
        $max = $num2 ;
    return "Eng katta son: $max " ;
    
});

//*************condition 7*********
Route::get('/condition7/{num1}/{num2}', function ($num1, $num2,){
    if($num1 > $num2) 
        $res = 2 ;
    else
        $res = 1 ; 
    return "Eng kichigi: $res" ;

    
});

//*************condition 8*********
Route::get('/condition8/{num1}/num2,}', function ($num1, $num2,){
    if($num1 > $num2){
        $res1 = $num1 ;
        $res2 = $num2 ;
    }else{
        $res1 = $num2 ;
        $res2 = $num1 ;
    }
    return "$res1 <br> $res2" ;
});

//*************condition 9*********
Route::get('/condition9/{a}/{b}', function ($a, $b,){
    
});

//************condition 10************************
Route::get('/condition10/{a}/{b}', function ($a, $b,){

    if($a != $b) 
        $c = ($a +$b) ;
    elseif($a == $b)
        $c = 0 ;
    return "A : $a ga teng <br> B $b ga teng <br> Natija: $c" ;
    
});


?>

 