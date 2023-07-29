<?php
   session_start();
   $conn = new mysqli('localhost','root','','tracking');
   $sql = 'SELECT * FROM signup WHERE Vehicleno = "'.$_REQUEST['username'].'" and Password = "'.$_REQUEST['password'].'"';
   $result = $conn->query($sql);
   $row = $result -> fetch_assoc();

   if($row){
     $_SESSION['last_activity'] = time();
     
     $_SESSION['username'] = $_REQUEST['username'];
     setcookie('username', $_REQUEST['username'], time() + 3600 * 24 * 30);/*1 month */
     $_SESSION['password'] = $_REQUEST['password'];
     setcookie('password', $_REQUEST['password'], time() + 3600 * 24 * 30);
     echo 1;
   }else{
     echo 0;
   }
?>