<?php
session_start();
include 'DBConnector.php';
$phonenumber=$_POST['phonenumber'];
$email=$_POST['email'];
$address=$_POST['address'];
$user=$_SESSION['user_id'];
$sql="UPDATE `users` SET `Phonenumber`='$phonenumber',`Email_Address`='$email',`Physical_Address`='$address' WHERE `User_ID`='$user'";
$result=mysqli_query($mysqli,$sql);
if($mysqli->query($sql) === true){
    $_SESSION['ProfileSuccess']='<div class="alert alert-success" id="success-alert"><button type="button" class="close" data-dismiss="alert">x</button><strong>Successfully updated your profile</strong></div>';
    header("Location:http://192.168.1.84/LRS/EditProfile.php");
}
else{
    $_SESSION['ProfileSuccess']='<div class="alert alert-danger" id="success-alert"><button type="button" class="close" data-dismiss="alert">x</button><strong>Failed to update your profile please try again</strong></div>';
    header("Location:http://192.168.1.84/LRS/EditProfile.php");
}
$mysqli->close();
?>