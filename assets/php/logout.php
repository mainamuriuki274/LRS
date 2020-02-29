<?php
session_start();
session_unset($_SESSION['user']); 
header("location: http://192.168.1.84/LRS/index.php");

?>