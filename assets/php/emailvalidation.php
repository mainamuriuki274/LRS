<?php
include 'DBConnector.php';


$email=$_REQUEST['emailAddress'];

if(!filter_var($email,FILTER_VALIDATE_EMAIL))
{
    $email_err="Invalid Email";
}
else{
    $query="Select * FROM users WHERE Email_Address='$email'";
    $result=mysqli_query($mysqli, $query);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count=mysqli_num_rows($result);
    if($count>0){
    $email_err="Email alreay Exists"
    }
    else{
    $email_err="Success";
    }
}
?>