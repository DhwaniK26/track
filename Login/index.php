<?php
//   session_start();
//   if(isset($_SESSION['username']) || isset($_COOKIE['username'])) {
//     if(isset($_SESSION['password']) || isset($_COOKIE['password'])) {
//       //header('location: ../Home');
//       echo "okk";
//     }
//   }
?>


<html>
    <head>
        <title>Login Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css"/>
        
    </head>
    <body>
              
                <div class="login-div ">
                    <br>
                    <h1 style="text-align:center"> Login</h1><br>
                    <input type="text" id="username" name="username" class="input form-control" placeholder="Enter your Vehicle no"/>
                    <br>
                    <input type="password" id="password" name="password" class="input form-control" placeholder="Enter your Password"/>
                    <br>
                    <p id="error" name="error" class="error"></p>
                    <br>
                    <div class="row">
                      <div class="col-md-12 text-center">
                         <input type="button" value="Login" class="button" onclick="login()" />
                      </div>
                    </div> 
                    
                    <br>
                    <p class="para">Dont have an account? <button class="signup" name="sign" onclick="sign()" >Signup</button></p>
                    
                </div>
              
       
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="script.js"></script>
    </body>
</html>