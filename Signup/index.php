<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration</title>
	
	<link rel="stylesheet" href="style.css">
	 
</head>

<body>

	<div class="container">
	
	<p class="signup">Sign up</p>
    <br>
	<br>
    <form name="form" id="form" method="POST">
			
	  <div class="signup-box">
		<input type="text" class="ele" id="username" name="username" placeholder="Enter your name">
		<input type="email" class="email ele" id="email" name="email" placeholder="youremail@email.com">
        <input type="text" class="num ele" id="vehiclenumber" name="vehicle" placeholder="enter vehicle number">
        <input type="text" class="num ele" id="number" name="phone" placeholder="phone number">
		<input type="password" class="password ele" id="userpass" name="userpass" placeholder="password">
		<input type="password" class="password ele" id="conpass" name="conpass" placeholder="Confirm password">
		
		<input class="btnn" type="button" onclick="validation()" value="Signup" style="font-size:20px">
	  </div>

       </form>
	  </div>		
	 </div>

  

	<script src="script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


</body>
</html>
