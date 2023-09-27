<?php
$math = $_POST["math"] ;

$fnco = $_POST["fnco"] ;

$cass = $_POST["cass"] ;

$problem_solving = $_POST["problem_solving"] ;

$history = $_POST["history"] ;

$web = $_POST["web"] ;

$english = $_POST["english"] ;

$geography = $_POST["geography"] ;

$total = ($math + $fnco + $cass + $problem_solving + $history + $web + $english + $geography
) / 8;


$percentage = ($total / 5) * 100;
//foizini topishda 100 ga bolamiz ballni topishda 5 ga bolamiz

echo "<b>Math</b>: $math <br>" ;
echo "<b>FNCO</b> : $fnco <br>" ;
echo "<b>CASS</b>: $cass <br>" ;
echo "<b>Problem Solving</b>: $problem_solving <br>" ;
echo "<b>History</b>: $history <br>" ;
echo "<b>Web</b>: $web <br>" ;
echo "<b>English</b>: $english <br>" ;
echo "<b>Geography</b>: $geography <br>" ;

echo "<b>Grade</b>: $total <br>" ;
echo "<b>Percentage</b>: $percentage%" ;
?>