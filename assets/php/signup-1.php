<?php

session_start();
/*
$idnumber = $mysqli->real_escape_string($_REQUEST['idNumber']);
$fullnames = $mysqli->real_escape_string($_REQUEST['fullNames']);
$email = $mysqli->real_escape_string($_REQUEST['emailAddress']);
$phonenumber = $mysqli->real_escape_string($_REQUEST['mobileNumber']);
$taxnumber = $mysqli->real_escape_string($_REQUEST['taxNumber']);
$address = $mysqli->real_escape_string($_REQUEST['physicalAddress']);
*/

$idnumber = $_POST['idNumber'];
$fullnames = $_POST['fullNames'];
$email = $_POST['emailAddress'];
$phonenumber = $_POST['mobileNumber'];
$taxnumber =$_POST['taxNumber'];
$address = $_POST['physicalAddress'];


$_SESSION['idnumber']=$idnumber;
$_SESSION['fullnames']=$fullnames;
$_SESSION['email']=$email;
$_SESSION['phonenumber']=$phonenumber;
$_SESSION['taxnumber']=$taxnumber;
$_SESSION['address']=$address;

$filename = $_FILES['idPicture']['name'];
$file_tmp = $_FILES['idPicture']['tmp_name'];
$filetype= $_FILES['idPicture']['type'];
$filesize= $_FILES['idPicture']['size'];
$idpicture = "$idnumber-".$filename;;
$filepath= $_SERVER['DOCUMENT_ROOT']."/LRS/assets/images/id/".$idpicture;
move_uploaded_file($file_tmp,$filepath);
$_SESSION['idpicture'] = $idpicture;

header("location: http://192.168.1.84/LRS/Signup-2.php");

?>