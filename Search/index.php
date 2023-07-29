<?php
// require "script.php";
session_start();
if (!isset($_SESSION['username'])) {
   header('location:../Login/index.php');
}
?>
<html>

<head>

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="stylesheet" href="https://unpkg.com/@geoapify/leaflet-address-search-plugin@^1/dist/L.Control.GeoapifyAddressSearch.min.css" />
   <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
   <link type="text/css" rel="stylesheet" href="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.css" />
   <link type="text/css" rel="stylesheet" href="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest-maps.css" />
   <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZ">
   <link rel="stylesheet" href="https://unpkg.com/@geoapify/leaflet-address-search-plugin@^1/dist/L.Control.GeoapifyAddressSearch.min.css" />
   <style>
      .flex-contain {
         display: flex;
         flex-wrap: wrap;
         justify-content: space-around;

      }

      .flex-item {
         padding: 20;
         border: 2px solid #FF6000;
         border-radius: 10px;
         margin: 20;
         box-shadow: 5px 2px 5px grey;
      }

      .para {
         color: orange;

      }
   </style>

</head>

<body>

   <div class="p-2" style="background-color:#454545;">
      <form name="form" id="form" method="POST">
         <input type="text" id="search" name="search" style="width:300px" placeholder="City name, Country" />
         <input type="submit" name="submit" value="submit" id="submit" style="background-color:#FFA559; width:100px; border:1px solid #FF6000; border-radius: 5px;" />
         <button onClick="window.location.reload();">Refresh Page</button>
      </form>
   </div>


   <div id="map" style="height: 570px; width: 100%">

   </div>
   <br>
   <h3 style="text-align:center">Place to Visit near <span id="placese"></span></h3>


   <div class="flex-contain" style="border:2px solid grey" id="data-container">

   </div>



   <!------------------------------>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.js"></script>
   <script src="https://www.mapquestapi.com/sdk/leaflet/v2.2/mq-map.js?key=S8d7L47mdyAG5nHG09dUnSPJjreUVPeC"></script>
   <script src="https://www.mapquestapi.com/sdk/leaflet/v2.2/mq-routing.js?key=S8d7L47mdyAG5nHG09dUnSPJjreUVPeC"></script>
   <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

   <script src="https://unpkg.com/@geoapify/leaflet-address-search-plugin@^1/dist/L.Control.GeoapifyAddressSearch.min.js"></script>

   <script>
      // $(document).ready(function() {
      //    start();
      // });
      //   window.onload=function() {
      //      mymap(20.6019745,72.926586);
      //   };

      function userData() {
         var xmlHttp = new XMLHttpRequest();
         xmlHttp.onreadystatechange = () => {
            if(this.status === 200 && this.readyState === 4) {
               console.log(this.responseText);
            }
           
         }

         xmlHttp.open("GET", "script.php?search=" + document.form.search.value , true);
         xmlHttp.send();
      }

      var map = L.map('map', {
         center: [20.6019745, 72.926586],
         zoom: 13
      })
      L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
         attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(map)


      function start() {
         var placeName = document.getElementById('search').value;
         document.getElementById('placese').innerHTML = placeName

         var url = `https://nominatim.openstreetmap.org/search?format=json&q=${placeName}`;

         fetch(url)
            .then(function(response) {
               return response.json();
            }).then(function(data) {
               if (data.length > 0) {
                  var lat = data[0].lat
                  var long = data[0].lon

                  console.log("Latitude:", lat);
                  console.log("Longitude:", long);

                  var map = L.map('map', {
                     center: [lat, long],
                     zoom: 13
                  })

                  L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                  }).addTo(map)

                  L.marker([lat, long]).addTo(map)
                     .bindPopup(placeName)
                     .openPopup();

                  var placeurl = `https://api.geoapify.com/v2/places?categories=tourism.attraction&bias=proximity:${long},${lat}&limit=20&apiKey=5f6fb496905d46b6badfae7ae1417cbb`
                  fetch(placeurl).then(async function(mydata) {
                     myloc = await mydata.json()
                     return myloc
                  }).then(function(result) {
                     console.log("result:", result);

                     const container = document.getElementById('data-container');

                     for (var i = 0; i < 8; i++) {
                        const item = document.createElement('div');
                        item.style.width = "400px"

                        const para1 = result.features[i].properties.name !== undefined ? result.features[i].properties.name : placeName;
                        const mypara = document.createElement('p');



                        item.classList.add('flex-item');

                        item.innerHTML = para1 + "<hr>" + "Address: " + result.features[i].properties.address_line2 +
                           "<br>" + "County: " + result.features[i].properties.county + "<br>";

                        container.appendChild(item);
                     }

                     // result.features.map(element => {
                     // const item = document.createElement('div');
                     // item.style.width = "400px"

                     // const para1 = element.properties.name !== undefined ? element.properties.name : "Valsad";
                     // item.classList.add('flex-item');

                     // item.innerHTML = para1  +"<br>" + "Address: " + element.properties.address_line2 +
                     // "<br>" +"County: " + element.properties.county +"<br>" ; 



                     // container.appendChild(item);
                     //  })
                  })


               } else {
                  document.getElementById('map').innerHTML = "Place not found"
               }
            })
            .catch(function(err) {
               console.log(err)
            })

      }


      function submitform(event) {
         //window.location.reload()
         userData();
         event.preventDefault();
         map.remove();

         start();
      }

      const form = document.getElementById('form');
      form.addEventListener('submit', submitform);
   </script>

</body>

</html>