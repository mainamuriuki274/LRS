<?php
include $_SERVER['DOCUMENT_ROOT'].'/LRS/assets/php/DBConnector.php';


$idnumber=$_POST['idnumber'];
if($idnumber>0)
{
if (strlen($idnumber)==8 || strlen($idnumber)==7) 
{
    $query="Select * FROM users WHERE ID_Number='$idnumber'";
    $result=mysqli_query($mysqli, $query);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count=mysqli_num_rows($result);
    if($count>0){
    $err="This ID number has already been registered.";
    }
    else{
    $err="Success";
    }
    
}
else{
    $err="Invalid ID Number"; 
}
}
else{
    $err="Invalid ID Number"; 
}
echo $err;
?>
