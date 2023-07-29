<?php
    if(!preg_match("/^[a-zA-Z\s]{2,}$/", $_REQUEST['username'])) {
        echo 1;
    }else if(!(str_contains($_REQUEST['email'], "@") || str_contains($_REQUEST['email'], ".") || !str_contains($_REQUEST['email'], " "))) {
        echo 2;
    } 
    else if(!(preg_match("/[A-Z]{2}[-][0-9]{1,2}[-][A-Z]{1,2}[-][0-9]{3,4}$/", $_REQUEST['vehicle']))) {
        echo 3;
    } 
     else if(!preg_match("/^[6789][0-9]{9}$/", $_REQUEST['phone'])) {
        echo 4;

    }else if($_REQUEST['password'] != $_REQUEST['conpass']){
        echo 5;
    } 
    else {
        $conn = new mysqli('localhost', 'root', '', 'tracking');
        //$conn -> query('INSERT into signup values("'.$_REQUEST['username'].'", "'.$_REQUEST['email'].'", "'.$_REQUEST['vehicle'].'", "'.$_REQUEST['userpass'].'", "'.$_REQUEST['phone'].'")');

        $sql = 'INSERT INTO signup values("'.$_REQUEST['username'].'", "'.$_REQUEST['email'].'", "'.$_REQUEST['vehicle'].'", "'.$_REQUEST['password'].'", "'.$_REQUEST['phone'].'")';
        $result = $conn -> query($sql);
        if($result) echo 0;
        $conn -> close();
    }
?>