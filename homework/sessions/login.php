<?php session_start() ;
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
        <input type="submit" name="s1"style="font-weight:300;" value="Log in">
    </form>
</body>
</html>

<?php
    if (isset($_POST['s1'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];
        include "users.php";
        $c = 0;
        foreach($users as $user ){
            if($user["login"] == $login && $user["password"] == $password){
              $_SESSION["login"] = $login;
              $_SESSION["password"] = $password;
              $_SESSION["started"] = true;
             header("location:index.php");
            }
            $c++;
        }
        if($c = count($users) ){
            ?>
            <p>Invalid Log in details try again!</p>
            <?php
        }
    }
?>

