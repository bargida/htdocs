<?php
// echo "<pre>" "</pre>" print_r  masssivni chiroyli qilib chiqarish uchun


$students =[
    [

    "id" => 1 ,
    "name" => "Bargida" ,
    "surname" => "Tilyakova" ,
    "age" => 26 , 
    "profession" => "Data Sciene"
    
    "region" => "Surkhandarya",

    ],

    [
    "id" => 2 ,
    "name" => "Moxira" ,
    "surname" => "Mirzakariyeva" ,
    "age" => 21 , 
    "region" => "Andijan",
    ],

    
    [
    "id" => 3 ,
    "name" => "Shohida" ,
    "surname" => "Tilyakova" ,
    "age" => 23 , 
    "region" => "Surkhandarya",

    ],
   
    [
    "id" => 4 ,
    "name" => "Go'zal" ,
    "surname" => "Lyutova" ,
    "age" => 19 , 
    "region" => "Namangan",
    ],
    
];

foreach($students as $student)
    if($students > 20 )
    echo $student["region"]."<br>";

?>