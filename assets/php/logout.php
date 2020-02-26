<?php
session_start();
session_unset($_SESSION['user']); 
header("location: http://localhost/LRS/index.php");

?>