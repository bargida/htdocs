<!-- 

// for($i = 0 ; $i >= 100 ; $i += 5) { //5ga karrali sonlar

// }
//     echo $i."<br>" ;

// $n = 30 ;

// $s = 0 ;

// for($i = 1 ; $i >= $n ; $i ++) { 
//     if ($n % $i == 0){
//     $s += $i ;
//     }
// }
// echo $s."<br>"; 

// $n = 7 ;

// for($i = 7; $i >= ; $i++) {

//     if($n >= 7 && $n >= 185) {
//         $n+= $i ;
//     }
// echo $n ;
// }

//N6
//  $n = 6 ;

//  $s = 0 ;

//  for ($i = 1 ; $i <= $n ; $i ++){

//     if($n % $i == 0 )
//     $s ++ ;
// }
// if($s == 2)
// echo "TUB" ;
// else
// echo"tub emas" ;

// $n = 8 ;

// $s = 0 ;

// for($i = 1; $i <= $n; $i++) {
//     $s += (2 * $i - 1) ;
//     echo $s."<br>" ;
// } 




//while operatori:
// $a = 12;

// $b = 5;
 
// $i = 0 ;

// while($a > $b) {
//     $a -= $b ;
    
// }
// echo" $a <br> " ;

// $n = 10 ;

// $i = 0 ;
// do{
//     $i++ ;

// echo"$n" ;

// }while($i >= $n) ;


//3 dan ngacha  bolgacha sonLAR ORASIDA 5 yoki 3ga bolinadigan sonlar


// $num = 149 ;

// $s = 3 ;

// do{
//     if($s % 3 == 0 or $s % 5 == 0) ;
//          echo"$s<br>" ;
//         $s++ ;
// }while($num > $s ) ; -->

<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$name =$_POST["username"] ;
$pass =$_POST["password"] ;
if(empty($name)<5)
{
    echo"username field shouldn't be less than 5 characters <br><br>";
}
if(empty($pass)<6)
{
    echo"username field shouldn't  be less than 5 characters <br><br>";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="test.php" method="POST">
       
        <input type="text" name="username" placeholder="Enter your name"><br><br>
        <span><?php if(isset($message))  echo $message; ?></span>

        <input type="text" name="password" placeholder="Enter your password"><br><br>
        <span><?php if(isset($message))  echo $message; ?></span>
        <input type="submit">

    </form>
</body>
</html>

