<?php
$server_name = "localhost" ;
$username = "root" ;
$password = " " ;
$db_name = "login" ;

$conn = new mysqli($server_name, $username, $password, $db_name, 5502) ;

if($conn -> connect_error)
{
    die("Connection failed".$conn->connect_error) ;
}
    echo("connection succesfull") ;


?>