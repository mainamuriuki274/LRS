<?php
include $_SERVER['DOCUMENT_ROOT'].'/LRS/assets/php/DBConnector.php';


$taxnumber=$_POST['taxnumber'];
if($taxnumber>0)
{
if (strlen($taxnumber)==10) 
{
    $query="Select * FROM users WHERE Tax_Number='$taxnumber'";
    $result=mysqli_query($mysqli, $query);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count=mysqli_num_rows($result);
    if($count>0){
    $err="This Tax number has already been registered.";
    }
    else{
    $err="Success";
    }
    
}
else{
    $err="Invalid Tax Number"; 
}
}
else{
    $err="Invalid Tax Number"; 
}
echo $err;
?>
