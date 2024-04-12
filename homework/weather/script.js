

const apikey ="799c103eb1ff564c772e8b3992c1fac3"
const apiurl ="https://api.openweathermap.org/data/2.5/weather?&units=metric&q="


const searchbox=document.querySelector(".search input");
const cityname= document.getElementById(".searchtxt");

const searchbtn=document.querySelector(".search button");
const  weather_icon=document.querySelector(".weather_icon");




async function showWeather(city){
    const response=await fetch(apiurl + city +`&appid=${apikey}`)
    const data=await response.json()

    console.log(data)

    document.querySelector(".city").innerHTML=`City: ${data.name}`
    document.querySelector(".temp").innerHTML=Math.round(data.main.temp)+"°C"


    if (data) {
        // console.log(data)
        const humidity = data.main.humidity;
        document.getElementById('humidity').innerText = `Humidity: ${humidity}`;
    } else {
        document.getElementById('humidity').innerText = 'Failed to fetch weather data';
    }
if (data.weather[0].main =="Clouds") {

    weather_icon.src = "img/cloud2.png"

} 
else if(data.weather[0].main=="Sun") 
{
    weather_icon.src="img/sun.png"
}
else if (data.weather[0].main=="Rain") 
{
    weather_icon.src="img/rain.png"
}

else if (data.weather[0].main=="Snow") 
{
    weather_icon.src="img/snow.png"
}
else{
    weather_icon.src="img/cloud2.png"
}


// document.querySelector(".weather").style.display = "block" ;

}

searchbtn.addEventListener("click",()=>{
    showWeather(searchbox.value);


});

showWeather("Basildon")

