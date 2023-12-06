<?php 
session_start() ;
if($_SESSION["started"] == true){
    header("location:index.php") ;
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="login" name="login" placeholder="Login"/><br><br>
        <input type="password" name="password"  placeholder="Password" /><br><br>
        <input type="submit" name="s1" style="font-weight:300;" value="Log in">
    </form>
</body>
</html>

<?php
$connection = mysqli_connect("localhost", "root", "root", "jajji") or die("Error connectiong db");
$query = "SELECT * FROM admins";
$res = mysqli_query($connection, $query);

    if (isset($_POST['s1'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];
        while($data = mysqli_fetch_assoc($res)){
            echo $data['name'];
        if($login == $data['username'] && $password == $data['password']){
            if($data['role'] == "1"){
            $_SESSION ['role']= 1 ; 
        }else{
            $_SESSION ['role']= 0 ; 
        }
            $_SESSION["started"] = true;
            echo"Succes";
            header("location:index.php");
            exit();
            }
            
    }


        }

?>