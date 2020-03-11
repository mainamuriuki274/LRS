<?php
session_start();
session_destroy();

header("location: http://192.168.1.84/LRS/index.php");

?>