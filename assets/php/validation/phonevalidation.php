<?php
include $_SERVER['DOCUMENT_ROOT'].'/LRS/assets/php/DBConnector.php';


$phonenumber=$_POST['phonenumber'];
if($phonenumber>0)
{
if (strlen($phonenumber)==10 ){
  $result = substr($phonenumber, 0, 2);
        if($result=="07")
                    {
                    $phone=$phonenumber-0000000000;
                    $query="Select * FROM users WHERE Phonenumber='$phone'";
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
            $err="Invalid Phonenumber Format";
        }
        
  }

else if(strlen($phonenumber)==12){
    $result = substr($phonenumber, 0, 4);
    if($result=="2547")
                {
                $phone=$phonenumber-254000000000;
                $query="Select * FROM users WHERE Phonenumber='$phone'";
                $result=mysqli_query($mysqli, $query);
                $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                $count=mysqli_num_rows($result);
                if($count>0){
                $err="This Phonenumber has already been registered.";
                }
                else{
                $err="Success";
                }
    }
    else{
        $err="Invalid Phonenumber Format"; 
    }         
}
else{
    $err="Invalid Phonenumber";
}
}
else{
    $err="Invalid Phonenumber";
}
echo $err;
?>