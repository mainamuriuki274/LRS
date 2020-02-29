<?php
include $_SERVER['DOCUMENT_ROOT'].'/LRS/assets/php/DBConnector.php';


$email=$_POST['emailAddress'];
//$email="maina@gmail.com";
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
if(filter_var($email,FILTER_VALIDATE_EMAIL))
{
    $query="Select * FROM users WHERE Email_Address='$email'";
    $result=mysqli_query($mysqli, $query);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count=mysqli_num_rows($result);
    if($count>0){
    $email_err="Email already Exists";
    }
    else{
    $email_err="Success";
    }
    
}
else{
    $email_err="Invalid Email"; 
}
echo $email_err;
?>
