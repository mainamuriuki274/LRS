<?php
session_start();
include 'DBConnector.php';
// attempt insert query execution

$titleid=$_POST['titleid'];
$titlenumber=$_POST['titlenumber'];
$surveyor_number=$_POST['surveyor_number'];
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
		 $log=mysqli_query($mysqli,"INSERT INTO `subdivisons`(`Title_ID`, `Surveyor_ID`, `Status`,`Subdivisions`, `Date`) VALUES ('$titleid','$surveyor_number','Pending Subdivision','None','$date')");
		 $_SESSION['SubdivideSuccess']='<div class="alert alert-success" id="success-alert"><button type="button" class="close" data-dismiss="alert">x</button><strong>Success! </strong>Title '.$titlenumber.' has been submitted to '.$surveyor_number.' for subdivision
	   </div>';
        header("Location:http://192.168.1.84/LRS/Subdivide.php");
          }
          else{
            $_SESSION['SubdivideSuccess']='<div class="alert alert-danger" id="success-alert"><button type="button" class="close" data-dismiss="alert">x</button><strong>Failed! </strong>Incorrect Password!</div>';
            header("Location:http://192.168.1.84/LRS/Subdivide.php");
          }
        }
    else{
      $_SESSION['SubdivideSuccess']='<div class="alert alert-danger" id="success-alert"><button type="button" class="close" data-dismiss="alert">x</button><strong>Failed! </strong>Your transaction failed please try again!</div>';
      header("Location:http://192.168.1.84/LRS/Subdivide.php");
    }
    $mysqli->close();

?>