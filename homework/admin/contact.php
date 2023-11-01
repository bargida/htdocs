<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="fName" placeholder="Name">
        <input type="email" name="email" placeholder="email">
        <input type="number" name="phoneNumber" placeholder="phone number">
        <input type="text" name="message" placeholder="message">
        <input type="submit" name="s1" value="send">
    </form>

<?php

if(isset($_POST["s1"]))
{
    $con = mysqli_connect("localhost","root","root","furnitures") or die("not working");

    $fname = $_POST["fName"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["phoneNumber"];
    $message = $_POST["message"];

    $sql = "insert into contact(fName, email, phoneNumber, message) values('{$fName}','{$email}','{$phoneNumber}','{$message}')" ; 
    
    $result = mysqli_query($con, $sql) ;

    if($result)
        echo "Succesfull";
    else
        echo "Error";
}
?>


</body>
</html>