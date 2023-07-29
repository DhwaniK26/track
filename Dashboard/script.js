// const mobile_nav = document.querySelector('.icon-div');
// const head = document.querySelector('.header');

// const togglefunc = () =>{
//     head.classList.toggle('ifactive')
// }
// mobile_nav.addEventListener("click",() => togglefunc());


// function loc(){
//              window.location.assign('/Tracking/Signup')
//           }

          function loc(){
            //window.location.assign('/Tracking/Signup')
            window.location.href="/Tracking/Profile";
        }
        

//Date-------------------------------------------
var today = new Date();
var datee = today.getDate();
var month = today.getMonth() + 1; 
var year = today.getFullYear();
document.getElementById('thedate').innerHTML=datee + "/" + month + "/" + year;

//mapp----------------------------------------------------------

const successCallback =async (position) => {
    console.log(position);
    console.log(position.coords);
    console.log(position.coords.latitude, position.coords.longitude);

   

//leaflet js------------------------------------------------------
var map = L.map('map', {
    center: [position.coords.latitude, position.coords.longitude],
    zoom: 13
})
    
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map)



var lat = position.coords.latitude // Example latitude
var lng = position.coords.longitude // Example longitude

//Lat long---------------------
document.getElementById('mylat').innerHTML = lat;
document.getElementById('mylong').innerHTML = lng


var url = `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lng}`;

//Promise chaining
fetch(url)
  .then(function(response) {
    return response.json();
  })
  .then(function(data) {
    var address = data.display_name;
    
    console.log(address); // Display the address in the console or use it as needed
    var stradd = String(address)
    L.marker([position.coords.latitude, position.coords.longitude]).addTo(map)
    .bindPopup(stradd)
    .openPopup();
  })
  .catch(function(error) {
    console.log('Error:', error);
  });

//weather---------------------------
var key = "9006914d7d981088160fd5ba9aba9c37";
var wurl = `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lng}&appid=${key}`;

await fetch(wurl)
    .then(function(response){
      return response.json();
    }).then(function(data){
      var kelvin = Math.round(data.main.temp);
      var cel = kelvin - 273.15;
      console.log(data);
      console.log("temp:",Math.round(data.main.temp),"K");
      console.log("celcius:",Math.round(cel));
      document.getElementById('temp').innerHTML=Math.round(cel) + " <sup>o</sup>"+"C"

      console.log("weather:",data.weather[0].main);
      document.getElementById('weather').innerHTML=data.weather[0].main;

      console.log("wind",data.wind.speed,"km/h");
      document.getElementById('wind').innerHTML= data.wind.speed + " m/s"

      console.log("humidity",data.main.humidity,"%");
      document.getElementById('humidity').innerHTML=data.main.humidity + "%"
    })


}

navigator.geolocation.getCurrentPosition(successCallback);






//search loc-------------

// function startloc(){
            
//   var placeName = document.getElementById('inp').value;

//   var url = `https://nominatim.openstreetmap.org/search?format=json&q=${placeName}`;

//   fetch(url)
//     .then(function(response){
//        return response.json();
//     }).then(function(data){
//        if(data.length > 0){
//           var lat = data[0].lat
//           var long = data[0].lon

//           console.log("Latitude:", lat);
//           console.log("Longitude:", long);

//           var map = L.map('map', {
//           center: [lat, long],
//           zoom: 13
//           })

//           L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
//           attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
//           }).addTo(map)

//           L.marker([lat,long]).addTo(map)
//          .bindPopup(placeName)
//          .openPopup();

//        }else{
//           console.log("place not found")
//        }
//     })
//     .catch(function(err){
//          console.log("hhhhhhhhhhhhhhhhhhhh",err)
//     }) 
   
// }

// form = document.getElementById('form')
// form.addEventListener('click',start)

// mybutton = document.getElementById('locse')
// mybutton.addEventListener('click',startloc)

