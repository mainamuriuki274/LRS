<?php
include $_SERVER['DOCUMENT_ROOT'].'/LRS/assets/php/DBConnector.php';
session_start();
if(isset($_POST['idnumber'])){
$idnumber=$_POST['idnumber'];
if($idnumber>0)
{
            if($idnumber==$_SESSION['id_number']){
                     $err="You cannot transfer to your self";
                }
            else{
                    if (strlen($idnumber)==8 || strlen($idnumber)==7) 
                    {
                        $query="Select * FROM users WHERE ID_Number='$idnumber'";
                        $result=mysqli_query($mysqli, $query);
                        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                        $count=mysqli_num_rows($result);
                        if($count>0){
                        $err="Success";
                        }
                        else{
                        $err="The ID above is not yet registered in our system";
                        }
                        
                    }
                    else{
                        $err="Invalid ID Number"; 
                         }
        }
}
else{
    $err="Invalid ID Number"; 

}
echo $err;
}
else if(isset($_POST['phonenumber'])){
    $phonenumber=$_POST['phonenumber'];
    $idnumber=$_POST['id_number'];
    if($phonenumber>0)
    {
    if (strlen($phonenumber)==10 ){
      $result = substr($phonenumber, 0, 2);
            if($result=="07")
                        {
                        $phone=$phonenumber-0000000000; 
                        $query="Select * FROM users WHERE Phonenumber='$phone' AND ID_Number='$idnumber'";
                        $result=mysqli_query($mysqli, $query);
                        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                        $count=mysqli_num_rows($result);
                        if($count>0){
                            $err="Success";
                            }
                            else{
                            $err="The ID and Phone number combination do NOT match";
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
                    $query="Select * FROM users WHERE Phonenumber='$phone' AND ID_Number='$idnumber'";
                    $result=mysqli_query($mysqli, $query);
                    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                    $count=mysqli_num_rows($result);
                    if($count>0){
                    $err="Success";
                    }
                    else{
                    $err="The ID and Phone number combination do NOT match";
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
    }

    
?>
