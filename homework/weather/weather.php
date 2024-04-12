<?php

if(isset($_POST["s1"]))
{
    $con = mysqli_connect("localhost","root","root","weather");

    $username = $_POST["username"];
    $password = $_POST["password"];
    
    // echo $username.$password;

    $sql = "INSERT INTO `login` (username, password,) VALUES ('$username', '$password')"; 

    $result = mysqli_query($con, $sql) ;

    if($result){
        echo "Succesfull";
    }
    else{
        echo "Error";

    }

}

?>