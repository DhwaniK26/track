<?php
    session_start();
    if($_SESSION['otp'] == $_REQUEST['otp']) {
        $conn = new mysqli('localhost', 'root', '', 'tracking');
        $result = $conn -> query('UPDATE signup set Password = "'.$_REQUEST['password'].'" where Email="'.$_SESSION['id'].'"');
        session_unset();
        $conn -> close();
        echo 1;
    } else {
        echo 0;
    }
?>