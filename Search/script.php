<?php

session_start();
$conn = new mysqli('localhost', 'root', '', 'tracking');
$sql = 'INSERT INTO searchloc VALUES("' . $_SESSION['username'] . '", "' . $_REQUEST['search'] . '")';
if ($conn->query($sql) === TRUE) {
    echo "okk";
} else {
    echo "not okk";
}
$conn->close();

?>