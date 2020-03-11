<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "land_registry_system";
// Create connection
$mysqli = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());

}


?>   