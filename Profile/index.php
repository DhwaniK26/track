<?php 

session_start();
if(!isset($_SESSION['username'])){
   header('location:../Login/index.php');
}


// session_start();

// if(isset($_REQUEST['submit'])){
//     echo $_SESSION['username'];
//   if(isset($_REQUEST['name'])){
//     $conn = new mysqli('localhost','root','','tracking');
//     $sql=('UPDATE signup SET Name = "'.$_REQUEST['name'].'" where Vehicleno = "'.$_SESSION['username'].'" ');
//     $result = $conn -> query($sql);

//     echo 0;
//   }
// }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script>
        function locate(){
            location.replace('../UpdProfile')
        }
    </script>
    <style>
        p{
    position: relative;
    margin: auto;
    width: 100%;
    text-align: center;
    color: #606060;
    font-size: 30px;
    font-weight: 400;
}

label{
    font-size: 20px;
    font-weight: bold;
}

span{
    font-size: 20px;;
}

body{
    height: 100vh;
    background: linear-gradient( #FFE6C7 , #FFA559);
    font-size: 20;
}
.bun{
    width:200px; 
    background-color:rgb(95, 95, 241);

}

.bun:hover{
    background-color: blue;
}
    </style>
</head>
<body>
    
    <div class="container" >
        <h1>YOUR PROFILE</h1><hr>
        <form name="form" id="form" >
            <div class="row">
                <div class="column">
                    <label for="name">Name:  </label>
                    <!-- <input type="text" id="name" name="name" placeholder="user name"> -->
                    <span><?php 
                        $conn = new mysqli('localhost','root','','tracking');
                        $sql = 'SELECT * FROM signup WHERE Vehicleno = "'.$_SESSION['username'].'"';
                        $result = $conn -> query($sql);
                        $row = $result -> fetch_assoc();
                        if($row){
                            echo $row['Name'];
                        }
                    ?></span>
                </div><br>
                <div class="column">
                    <label for="email">Email: </label>
                    <span>
                        <?php
                        if($row){
                            echo $row['Email'];
                        }
                        ?>
                    </span>
                </div>
            </div><br>
            <div class="row">
                <div class="column">
                    <label for="subject">Vehicle Id: </label>
                    <span>
                        <?php
                        if($row){
                            echo $row['Vehicleno'];
                        }
                        ?>
                    </span>
                </div><br>
                <div class="column">
                    <label for="contact">Phone Number: </label>
                    <span>
                        <?php
                        if($row){
                            echo $row['Phoneno'];
                        }
                        ?>
                    </span>
                </div>
            </div>
                
            <div class="text-center">
                <input type="button" id="submit" class="bun" name="submit" value="Update Profile"
                onclick="locate()"/>
            </div>
            </div>
           
                
            </div>
        </form>
    </div>
    <!-- <script src="script.js"></script> -->
</body>
</html>