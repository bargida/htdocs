<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post" style="margin-top: 40px; margin-left:60px;">
    <p>Name:</p>
    <input type="text" name="name" placeholder="John Doe"><br>
    <p>Photo</p>
    <input type="text" name="photo" placeholder="Name of the photo"><br>
    <p>Message</p>
    <input type="text" name="message" placeholder="You can write smth here.."><br><br>

    <input type="submit" name="s1" value="SEND">

</form>
<?php

if(isset($_POST["s1"])){
    $con = mysqli_connect("localhost", "root", "root", "jajji") or die("Error")  ;
    $fname = $_POST["name"] ;
    $photo = $_POST["photo"] ;
    $message = $_POST["message"] ;
   
    $sql = "INSERT INTO yutuq(name, photo, message ) VALUES('{$fname}', {$photo}', '{$message}')" ;
   
    $result = mysqli_query($con, $sql) ;
   
    if($result){
        echo"Success";
        header("location:git/home.php");
    }else
        "Error";
}
?>
</body>
</html>