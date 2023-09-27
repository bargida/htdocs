<?php

$x1 = $_POST["x1"];

$x2 = $_POST["x2"];

$y1 = $_POST["y1"];

$y2 = $_POST["y2"];

$d = sqrt((pow($x1, 2 - $x2, 2) + sqrt(pow($y1, 2 - $y2, 2))));

echo"Nuqtalar orasidagi masofa: $d";

?>