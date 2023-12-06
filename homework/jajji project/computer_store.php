<?php

$con = mysqli_connect("localhost", "root", "root", "computer_store") or die("Error")  ;

$sql = "SELECT models.id, models.name as model, models.year, brand.name as brand FROM models LEFT JOIN brand ON models.brand_id = brand.id";

$result = mysqli_query($con,$sql) or die(mysqli_error($con));
echo var_dump($result) ;


while ($row = mysqli_fetch_assoc($result)) { 
    echo $row["id"]." . ". $row["model"] ." - ". $row["year"] ."<br>";

}



?>
