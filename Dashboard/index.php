<?php 
session_start();
// if(isset($_SESSION['username'])){
//     if((time() - $_SESSION['last_activity']) > 60){   //time--time everytime the page is refreshed
//                                                       //last-activity--time from login
//         session_destroy();
       
//         header("location:../Login/index.php");
//     }else{
        
//         $_SESSION['last_activity'] = time();         //set the time to refreshing time
//     } 
// }else{
    
//     header("location:../Login/index.php");   
// }



?>

<html>
    <head>
      <link rel="stylesheet" href="style.css"/>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
        <link type="text/css" rel="stylesheet" href="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.css"/>
        <link type="text/css" rel="stylesheet" href="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest-maps.css"/>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZ">
        <link rel="stylesheet" href="https://unpkg.com/@geoapify/leaflet-address-search-plugin@^1/dist/L.Control.GeoapifyAddressSearch.min.css" />
        <style>
           .mybtn{
              float: right;
              margin-top:20;
              margin-right: 20;
              color: #FFA559;
            }
            .mp{
             height: 670px; 
             width: 750px;
             margin-left: 180;
             border-radius: 10px; 
            }

            .hrr{
           
            height: 40px;
            width: 60;
            animation: expand 2s linear forwards;
              
            }

            @keyframes expand {
          0% {
             width: 60;
    
           }
         100% {
           width: 400px;}
            }

          .infodiv{
              height: 150;
              width: 450;
              border-radius: 5px;
              border: solid 1px #454545;
              box-shadow: 5px 2px 5px 2px  #9F8170
            
            } 
            .navbar-ul{
              list-style-type: none;
              font-size: 18px;
              margin-top: 27;
            }
  
            .navbarr{
              /* display:none;*/
              height:100%;
              width:200px;;    
              background:#FFE6C7;
              position: absolute;
              display: flex;
              top:0;
              left:0; 
              
            /*fill the screen completely */
            }

            .maindiv{
               background-color:#FF6000;
               height: 50;
               width: 100%;
      
              }

              .weather-div{
                background-image:linear-gradient(#89CFF0,#40E0D0);
                height: 320;
              width: 450;
              border-radius: 5px;
              border: solid 1px #454545;
              box-shadow: 5px 2px 5px 2px  #9F8170

              }
  
            @media only screen and (max-width:1000px){
              .mp{
             height:580px; 
             width:100%; 
             margin-left: 200;
             margin-right: 10;

            }

            .infodiv{
              height: 150;
              width: 100%;
              border-radius: 5px;
              border: solid 1px #454545;
              box-shadow: 5px 2px 5px 2px  #9F8170;
              margin-top: 20;
             }
            
            }
        </style>
        
    </head>

    <body>
    <script>
      function loc(){
          //window.location.assign('/Tracking/Signup')
          window.location.href="/Tracking/Profile";
      }
    </script>


     <div class="maindiv">
     <!-- <form name="form" id="form" >
     <input type="submit" value="search" id="locse" name="locse" class="mybtn" onclick="startloc()"/>
     <input type="text" class="inputt" name="inp" placeholder="Search your location" />
     </form>   -->
          <div class="p-1 m-1" style="height:40; width:100; float:right; border: 2px solid white; cursor:pointer" 
            onclick="loc()">
            <img src="https://vectorified.com/images/person-icon-white-16.png"
            style="height:30; width:30;"/><span class="p-1" style="color:white; font-size:15">Profile</span>
            <a href="https://www.geeksforgeeks.org/"></a>
          </div>
       <div class="header">
        
            <nav class="navbarr">
              
                <ul class="navbar-ul" >
                   <li><h2 class="menutxt">Menu</h2></li><hr>
                   <li><a class="navbar-links" href="#">Home</a></li><br>
                   <li><a class="navbar-links" href="../Routing/index.php">Routing</a></li><br>
                   <li><a class="navbar-links" href="">Tracking</a></li><br>
                   <li><a class="navbar-links"  href="../Search/index.php">Loaction Search</a></li><br>
            
                </ul>
            </nav>
          </div>
        <div class="icon-div">
          <ion-icon name="menu-outline" class="mobile-nav-icon"></ion-icon>
          <ion-icon name="close-outline" class="mobile-nav-icon"></ion-icon>
        </div>
      </div>
    </div>

    <div> 
    
    </div>

    <!--boxes------------------------------------------------------------------------------------->
    
    <div class="d-flex justify-content-around pt-3 flex-wrap " >
      
      <div id="map" class="mp"></div><br>


    <div class=" ml-0">
       <div class="infodiv p-3">

        <h4 style="text-align:center">Your Information</h4><hr class="hrr">
        <p><b>Name:</b> <?php
               $conn = new mysqli('localhost','root','','tracking');
               $sql = 'SELECT * FROM signup WHERE Vehicleno = "'.$_SESSION['username'].'" and Password = "'.$_SESSION['password'].'"';
               $result = $conn->query($sql);
               $row = $result -> fetch_assoc();
               echo $row['Name'];

                ?><br>
          <b>Vehicle plate number:</b> <?php echo $row['Vehicleno']?>      
          </p>
       </div>

      <br>

       <div class="infodiv p-3">

      <h4 style="text-align:center">Current Location</h4><hr class="hrr">
      <p>
        <b>Latitude:</b> <span id="mylat"> </span><br>
        <b>Longitude: </b> <span id="mylong"> </span> 
         
      </b></p>
       </div>   
      
      <br>
   
      <div class="weather-div p-3">

      <h4 style="text-align:center">Today</h4><hr class="hrr" style="background-color: black; height:2px;">
      
        <b>Date:</b> <span id="thedate"> </span><br>
        <p style="text-align:center;font-size:35px" id="temp"> </p>
        <p style="text-align:center;font-size:20;color:white" id="weather"> </p>
        
        <!-- <img src= "https://webstockreview.net/images/fog-clipart-windy-symbol-19.png" 
        style="height:40; width:50;margin-top:20"/><span style="margin-left:10px;font-size:28;color:white;" id="wind">67</span><br>
        <span style="margin-left:60px; font-size:20; color:white; margin-top:-40px">Wind Speed</span>

        <img src= "https://static.thenounproject.com/png/1001987-200.png" 
        style="height:60; width:58 ;float:right; margin-right:70; margin-top:-45"/>
        <span style="font-size:24;color:white; float:right; margin-right:-80;  margin-top:-45">7.9</span><br>
        <span style="font-size:20; color:white; float:right; margin-right:-8;  margin-top:-32">Humidity</span> -->

        <img src= "https://webstockreview.net/images/fog-clipart-windy-symbol-19.png" 
        style="height:40; width:50;margin-top:20"/>
        <span>
          <ul style="list-style: none; margin-top:-49; margin-left:25">
            <li style="margin-left:10px;font-size:25;color:white;" id="wind"> </li>
            <li style="margin-left:10px;font-size:20;color:white;">  Wind speed</li>
          </ul>
        </span>
       
        <img src= "https://static.thenounproject.com/png/1001987-200.png" 
        style="height:60; width:58 ;float:right; margin-right:80; margin-top:-75"/>
        <span style="float:right">
          <ul style="list-style-type:none; margin-top:-80; margin-right:0 ">
            <li style="font-size:25;color:white; " id="humidity"> </li>
            <li style="font-size:20;color:white; ">Humidity</li>
          </ul>
        </span>
        


       </div>
    </div>
 
      
       <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.js"></script>
       <script src="https://www.mapquestapi.com/sdk/leaflet/v2.2/mq-map.js?key=S8d7L47mdyAG5nHG09dUnSPJjreUVPeC"></script>
       <script src="https://www.mapquestapi.com/sdk/leaflet/v2.2/mq-routing.js?key=S8d7L47mdyAG5nHG09dUnSPJjreUVPeC"></script>
       <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

       <script src="https://unpkg.com/@geoapify/leaflet-address-search-plugin@^1/dist/L.Control.GeoapifyAddressSearch.min.js"></script>
      

       <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
       <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
       <script src="script.js"></script>
        
    </body>
</html>