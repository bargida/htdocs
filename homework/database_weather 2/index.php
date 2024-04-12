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
                <input type="text" name="city" id="cityInput" placeholder="Enter the city name" spellcheck="false">
                <button type="submit"><img src="img/search.png"></button>
            </form>
        </div>
        <div class="weather">
            <h1 class="temp" id="temperature">Loading...</h1>
            <h1 class="city" id="cityName"></h1><br>
            <h2 id="desc"></h2>
        </div>
        <div id="localStorageData" style="margin-top: 20px;"></div>
    </div>
    <script>
    
        function fetchWeatherData(city) {
            const apiKey = "799c103eb1ff564c772e8b3992c1fac3";
            const url = `https://api.openweathermap.org/data/2.5/weather?q=${encodeURIComponent(city)}&units=metric&appid=${apiKey}`;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    const temperature = data.main.temp;
                    const description = data.weather[0].description;


                    document.getElementById('temperature').textContent = temperature + " °C";
                    document.getElementById('cityName').textContent = city;
                    document.getElementById('desc').textContent = "Description: " + description;

                    const weatherData = { city, temperature, description };
                    localStorage.setItem('weatherData_' + city, JSON.stringify(weatherData));

                    updateLocalStorageDisplay();
                })
                .catch(error => console.error('Error fetching weather data:', error));
        }

        function checkLocalStorage(city) {
            const cachedData = localStorage.getItem('weatherData_' + city);
            if (cachedData) {
                const weatherData = JSON.parse(cachedData);
                document.getElementById('temperature').textContent = weatherData.temperature + " °C";
                document.getElementById('cityName').textContent = weatherData.city;
                document.getElementById('desc').textContent = "Description: " + weatherData.description;
            }
        }

        // function updateLocalStorageDisplay() {
        //     const localStorageData = document.getElementById('localStorageData');
        //     localStorageData.innerHTML = "<h2>Weather Data in Local Storage:</h2>";
        //     for (let i = 0; i < localStorage.length; i++) {
        //         const key = localStorage.key(i);
        //         if (key.startsWith('weatherData_')) {
        //             const weatherData = JSON.parse(localStorage.getItem(key));
        //             const city = weatherData.city;
        //             const temperature = weatherData.temperature;
        //             const description = weatherData.description;
        //             localStorageData.innerHTML += `<p>City: ${city}, Temperature: ${temperature} °C, Description: ${description}</p>`;
        //         }
        //     }
        // }

        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            const city = urlParams.get('city');
            if (city) {
                checkLocalStorage(city);
            }
            updateLocalStorageDisplay();
        };

        document.querySelector('.search form').addEventListener('submit', function(event) {
            event.preventDefault();
            const cityInput = document.getElementById('cityInput').value;
            fetchWeatherData(cityInput);
        });
    </script>
</body>
</html>



