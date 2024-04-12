<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather_database</title>
</head>
<body>
    <div class="container">
        <div class="search">
            <input type="text" placeholder="Enter the city name" spellcheck="false">
            <button id="btn" type="submit">Search</button>
        </div>
    </div>
    <br>
<?php
    if(isset($_POST["btn"])){
        include "database.php" ;
    }
?>
    <script src="/script.js"></script>
</body>
</html>