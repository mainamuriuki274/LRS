<?php
session_start();
include 'DBConnector.php';
// attempt insert query execution
$user = $_SESSION['user_id'];
$title   = $_POST['title'];
$surveyor_number=$_POST['surveyor_number'];
$password =$_POST['password'];
$date = date("d/m/Y");
$reference = rand(); 
$n = count($title);

$sql="SELECT * FROM `users` WHERE User_ID='$user'";
$result = mysqli_query($mysqli,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count == 1) {
     if(password_verify($password,$row['Password']) && $user==$row['User_ID']){
        for($i=0;$i<$n;$i++){
        $log=mysqli_query($mysqli," INSERT INTO `amalgamations`(`Reference_Number`,`Title_ID`, `User_ID`, `Surveyor_ID`, `Date`, `Status`) 
        VALUES ('$reference',".$title[$i].",'$user','$surveyor_number','$date','Pending Amalgamation')");
        }
        $_SESSION['AmalgamateSuccess']='<div class="alert alert-success" id="success-alert"><button type="button" class="close" data-dismiss="alert">x</button><strong>Success! </strong>You titles have been submitted to Surveyor "'.$surveyor_number.'" for amalgamation
      </div>';
       header("Location:http://192.168.1.84/LRS/Amalgamate.php");
         }
         else{
           $_SESSION['AmalgamateSuccess']='<div class="alert alert-danger" id="success-alert"><button type="button" class="close" data-dismiss="alert">x</button><strong>Failed! </strong>Incorrect Password!</div>';
           header("Location:http://192.168.1.84/LRS/Amalgamate.php");
         }
       }
   else{
     $_SESSION['AmalgamateSuccess']='<div class="alert alert-danger" id="success-alert"><button type="button" class="close" data-dismiss="alert">x</button><strong>Failed! </strong>Your transaction failed please try again!</div>';
     header("Location:http://192.168.1.84/LRS/Amalgamate.php");
   }
   $mysqli->close();



?>