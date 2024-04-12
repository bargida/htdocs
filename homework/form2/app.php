<?php

if(isset($_POST["s1"]))
{
    $con = mysqli_connect("localhost","root","root","clients");

    $fname = $_POST["name"];
    $phone = $_POST["phone"];
    $phone = $_POST["address"];
    
  

    $sql = "INSERT INTO `users` (name, phone,address) VALUES ('$name', '$phone', '$address'))"; 

    $result = mysqli_query($con, $sql) ;

    if($result){
        echo "Succesfull";
    }
    else{
        echo "Error";

    }

   
}
?>


