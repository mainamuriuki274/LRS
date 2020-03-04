<?php
session_start();
include 'DBConnector.php';
// attempt insert query execution

$idnumber   = $_POST['idnumber'];
$phonenumber=$_POST['phonenumber'];
$titlenumber=$_POST['titlenumber'];
$password =$_POST['password'];
$user = $_SESSION['user_id'];
$date = date("d/m/Y");


$sql="SELECT * FROM `users` WHERE User_ID='$user'";
$result = mysqli_query($mysqli,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count == 1) {
	 if(password_verify($password,$row['Password']) && $user==$row['User_ID']){
		 $result=mysqli_query($mysqli,"SELECT * FROM `users` WHERE ID_Number='$idnumber'");
		 $owner_row=mysqli_fetch_array($result);
		 $newowner=$owner_row['User_ID'];
		 $newname=$owner_row['Fullnames'];
		 $update_owner=mysqli_query($mysqli,"UPDATE `title_owners` SET `User_ID`='$newowner' WHERE Title_ID='$titlenumber'");
		 $log=mysqli_query($mysqli,"INSERT INTO `transfers`(`Title_ID`, `User_ID(From)`, `User_ID(To)`, `Transfer_Date`) VALUES ('$titlenumber','$user','$newowner','$date')");
		 $_SESSION['TransferSuccess']='<div class="alert alert-success" id="success-alert"><button type="button" class="close" data-dismiss="alert">x</button><strong>Success! </strong>Title '.$titlenumber.' transferred to '.$newname.'
	   </div>';
        header("Location:http://192.168.1.84/LRS/Transfer.php");
          }
          else{
            $_SESSION['TransferSuccess']='<div class="alert alert-danger" id="success-alert"><button type="button" class="close" data-dismiss="alert">x</button><strong>Failed! </strong>Incorrect Password!</div>';
            header("Location:http://192.168.1.84/LRS/Transfer.php");
          }
        }
    else{
      $_SESSION['TransferSuccess']='<div class="alert alert-danger" id="success-alert"><button type="button" class="close" data-dismiss="alert">x</button><strong>Failed! </strong>Your transaction failed please try again!</div>';
      header("Location:http://192.168.1.84/LRS/Transfer.php");
    }
    $mysqli->close();

?>