<?php 
require "script.php";
// session_start();
// if(!isset($_SESSION['username'])){
//    header('location:../Login/index.php');
// }

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
    <title>Update Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
   

    <link rel="stylesheet" href="style.css">
    <Style>
        body{
    height: 100vh;
    background: linear-gradient(to bottom,#FFE6C7 , #FFA559 100%);
    }

    .buttonn{
        width:200px; 
        background:#6f6df4;
    }

    .buttonn:hover{
        background-color: blue;;
    }

    
    </style>
</head>
<body>
    
    <div class="container" style="margin-top: 70px;">
        <h1>PROFILE</h1>
        <form name="form" id="form" method="GET">
            <div class="row">
                <div class="column">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="user name">
                </div>
                <div class="column">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="abc@gmail.com">
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label for="subject">Vehicle Id</label>
                    <input type="text" id="vehicleno" name="vehicleno" placeholder="Vehicle id">
                </div>
                <div class="column">
                    <label for="contact">Phone Number</label>
                    <input type="tel" id="contact" name="contact" placeholder="phone number">
                </div>
            </div>
                <div class="column">
                    <label for="contact">Current Password</label><br>
                    <input type="tel" id="oldpass" placeholder="current password" style="width:500px">
                </div>
                <p name="errtxt" id="err"><?php $err ?></p>
                <div class="column">
                    <label for="contact">New Password</label><br>
                    <input type="tel" id="newpass" placeholder="new password" style="width:500px">
            </div><br>
            
                <p name="succtxt" id="succ"></p>
                <p class="small mb-5 pb-lg-2"><a class="text-light" href="../ForgetPass">Forgot Password ?</a></p><br>
                
                <div style="text-align:center">
                <input type="submit" id="submit" class="buttonn" name="submit"value="submit" />
                </div>
                
            </div>
           
                
            </div>
        </form>
    </div>
    
    <script src="script.js"></script>
</body>
</html>