<?php

$num = 1;


$odd = 0;
$even = 0;


do {
   
   if ($num % 2 == 0) {
      echo $num . " is even\n";
      $even++;
    } 
   else {
      echo $num . " is odd\n";
      $odd++;
   }
   $num++;

} 
while ($num <= 25);
   $num_odd += $odd;
   $num_even += $even;


echo "Total odd : " . $odd_odd. "\n";
echo "Total even : " . $even_even . "\n";



?>