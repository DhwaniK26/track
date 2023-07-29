<?php

session_start();
// if(isset($_REQUEST['submit'])){

  if(isset($_REQUEST['name'])){

    if(!preg_match("/^[a-zA-Z\s]{2,}$/", $_REQUEST['name'])){
       echo 1;
       $err ="Name";
       echo $errtxt;
    }else{
    $conn = new mysqli('localhost','root','','tracking');
    $sql=('UPDATE signup SET Name = "'.$_REQUEST['name'].'" where Vehicleno = "'.$_SESSION['username'].'" ');
    $result = $conn -> query($sql);
    $err = "Name:myy";
    $conn->close();
    
    echo "okk";
    }
}
if(isset($_REQUEST['email'])){
   if(!(str_contains($_REQUEST['email'], "@") || str_contains($_REQUEST['email'], ".") || !str_contains($_REQUEST['email'], " "))){
     echo 2;
   }else{
    $conn = new mysqli('localhost','root','','tracking');
    $sql=('UPDATE signup SET Email = "'.$_REQUEST['email'].'" where Vehicleno = "'.$_SESSION['username'].'" ');
    $result = $conn -> query($sql);
    $conn->close();
    echo 0;
   }
}
if(isset($_REQUEST['vehicleno'])){
    if(!(preg_match("/[A-Z]{2}[-][0-9]{1,2}[-][A-Z]{1,2}[-][0-9]{3,4}$/", $_REQUEST['vehicleno']))){
        echo 3;
    }else{
        $conn = new mysqli('localhost','root','','tracking');
        $sql=('UPDATE signup SET Vehicleno = "'.$_REQUEST['vehicleno'].'" where Vehicleno = "'.$_SESSION['username'].'" ');
        $result = $conn -> query($sql);
        $conn->close();
        echo 0;
    }
}

if(isset($_REQUEST['contact'])){
    if(!preg_match("/^[6789][0-9]{9}$/", $_REQUEST['contact'])){
        echo 4;
    }else{
        $conn = new mysqli('localhost','root','','tracking');
        $sql=('UPDATE signup SET Phoneno = "'.$_REQUEST['contact'].'" where Vehicleno = "'.$_SESSION['username'].'" ');
        $result = $conn -> query($sql);
        $conn->close();
        echo 0;
    }
}

// if(isset($_REQUEST['newpass'])){
//    if(isset($_REQUEST['oldpass'])){
//     $conn = new mysqli('localhost','root','','tracking');
//     $sql=('SELECT * FROM signup WHERE Password = "'.$_REQUEST['oldpass'].'" and Vehicleno = "'.$_SESSION['username'].'" ');
//     $result = $conn -> query($sql);
//     $row = $result -> fetch_assoc();
//     if($row){
//         //success
//         $conn->close();
//         $conn = new mysqli('localhost','root','','tracking');
//         $sql=('UPDATE signup SET Password = "'.$_REQUEST['newpass'].'" where Vehicleno = "'.$_SESSION['username'].'" ');
//         echo 0;
//         $conn->close();
//     }else{
//         //fail old pass
//         echo 6;
//     }   
//   }
// }
// else{
//     //old pass is empty 
//     echo 5;
// }
//}
?>