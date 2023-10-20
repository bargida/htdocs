
<?php
// setcookie("login", "bargida25");
// setcookie("password", "qwerty");

// setcookie("login", "dreamy");
// setcookie("password", "zara18");

// setcookie("login", "shoh97");
// setcookie("password", "shoh_14");

// setcookie("login", "assi_king");
// setcookie("password", "123456");

// setcookie("login", "lutfullo");
// setcookie("password", "qwerty123");


$students = [
    [
        'id' => 1,
        "name" => "Bargida", 
        "login" => "bargida25",
        "password" => "qwerty",
    ],
        
    [
        'id' => 2,
        "name" => "Zarnigor", 
        "login" => "dreamy",
        "password" => "zara18",
    ],
    [
        'id' => 3,
        "name" => "Shahzod", 
        "login" => "shoh97",
        "password" => "shoh_14",
    ],
    [
        'id' => 4,
        "name" => "Asilbek", 
        "login" => "assi_king",
        "password" => "123456",
    ],
    [
        'id' => 5,
        "name" => "Lutfullo", 
        "login" => "lutfullo",
        "password" => "qwerty123",
    ],
        
] ;




if(isset($_POST["s1"])){
    $login = $_POST["login"] ;
    $password = $_POST["password"] ;

if($_COOKIE["login"] == $login and $_COOKIE["password"] ==  $password){ 

foreach($students as $student ){
    if($student["login"] == $login and $student["password"] == $password){
        echo("home page");
     
    }
}

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>project</title>
    </head>
    <body>
        <h1>Home page</h1>
    </body>
    </html>

<?php 
        }
    }
    else
{
?>
        <form action="" method="post">
            <label for="login">Login</label>
            <input type="text" name="login" placeholder="Login"><br><br>
    
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password"> <br><br>

            <input type="submit" name="s1" value="Log in"> 
        </form>
<?php
    }
?>






