<?php

function connectToDatabase() {
    $conn = mysqli_connect('localhost', 'root', 'root', 'projects') or die("Couldn't connect to database");
    return $conn;
}

function fetchWeatherData($city, $apikey) {
    $url = "https://api.openweathermap.org/data/2.5/weather?q=" . urlencode($city) . "&units=metric&appid=" . $apikey;
    $json = file_get_contents($url);
    return json_decode($json, true);
}



function isWeatherDataUpToDate($conn, $city) {
    $sql = "SELECT * FROM weather WHERE city = '{$city}' AND weather_when >= NOW() - INTERVAL 2 HOUR";
    $result = mysqli_query($conn, $sql);
    return $result->num_rows > 0;
}
if (isset($_GET['city'])) {
    $city = $_GET['city'];
    if (isWeatherDataUpToDate($conn, $city)) {
        $sql = "SELECT * FROM weather WHERE city = '{$city}'";
        $result = mysqli_query($conn, $sql);
        $weatherData = mysqli_fetch_assoc($result);
        $temperature = $weatherData['temperature'];
        $description = $weatherData['weatherType'];
    } else {
        $weatherData = fetchWeatherData($city, $apikey);
        $temperature = $weatherData['main']['temp'];
        $description = $weatherData['weather'][0]['description'];
        insertWeatherData($conn, $city, $temperature, $description);
    }

    // Output weather data as JSON
    echo json_encode([
        'temperature' => $temperature,
        'description' => $description
    ]);

    exit(); 

function insertWeatherData($conn, $city, $temperature, $weatherType) {
    $sql = "INSERT INTO weather (city, temperature, weatherType) VALUES ('{$city}', '{$temperature}','{$weatherType}')";
    $stmt = $conn->prepare($sql);
    mysqli_query($conn, $sql);
}

$apikey = "799c103eb1ff564c772e8b3992c1fac3";
$conn = connectToDatabase();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Database</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="search">
            <form action="" method="get">
                <input type="text" name="city" placeholder="Enter the city name" spellcheck="false">
                <button type="submit"><img src="img/search.png"></button>
            </form>
        </div>
        <div class="weather">
            <?php if (isset($_GET['city'])){ ?>
                <h1 class="temp"><?php echo isset($temperature) ? $temperature . " °C" : "Loading..."; ?></h1>
                <h1 class="city"><?php echo $_GET['city'] ?></h1><br>
                <h2 id="desc"><?php echo isset($description) ? "Description: " . $description : ""; ?></h2>
            <?php } ?>
        </div>
    </div>

</body>
</html>