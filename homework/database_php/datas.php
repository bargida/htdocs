<?php
    include "database.php";
    $city=$_GET["city"] ;
    $city=$_GET["temperature"] ;
    $weatherType=$_GET["weather"] ;

    $fetch_query="SELECT * FROM weather WHERE city='{$city}'" ;
    $res=mysqli_query($con, $fetch_query) ;

    if(mysqli_num_rows($res)==0){
        $insert="INSERT INTO weather(`city`, `temperature`, `weatherType`) VALUES ('{$city}','{$temperature}',{$weatherType}',)" ;
        mysqli_query($con, $insert) ;
    }
    else
    {
        $update = "UPDATE weather SET
                            temperature ='{$temperature}'
                            weatherType ='{$weatherType}'
                            WHERE
                            city ='{$city}'
                        ";
        mysqli_query($con, $update) ;
    }
    function display($city)
    {
        include "database.php" ;
        $fetch_query="SELECT * FROM weather WHERE city='{$city}'" ;
        $result=mysqli_query($con, $fetch_query) ;
        $row = mysqli_fetch_array($res) ;




        include "index.php" ;


        echo "<div class='weather'>
        <div id='res'>{$row["city"]}</div> 
        <h1 class='temp'>{$row["temperature"]}</h1>
        <h1 class='city'>{$row["weatherType"]}</h1>
        
</div>"; 

    }
    display($_GET["city"])
?>