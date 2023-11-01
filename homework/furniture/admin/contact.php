<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include "assets/contact.php" ?>
    <form action="" method="post">
        <input type="text" name="text" placeholder="fname">
        <input type="email" name="text" placeholder="email">
        <input type="number" name="phoneNumber" placeholder="phone number">
        <input type="text" name="massage" placeholder="massage">
        <input type="submit" name="s1" value="send">
    </form>

<?php

if(isset($_POST["s1"]))
{
    $con = mysqli_connect("localhost","root","","furnitures") or die("not working");

    $fname = $_POST["fname"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["phoneNumber"];
    $massage = $_POST["massage"];

    $sql = "insert into contact(fname, email, phone number, massage) values('($fname)', '($email)','($phoneNumber)','($massage)')" ; 

    $result = mysqli_query($con, $sql) ;

    if($result)
        echo "Succesfull";
    else
        echo "Error";
}
?>


</body>
</html>