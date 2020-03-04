<?php
session_start();
include 'DBConnector.php';

$idnumber = $_POST['idnumber'];
$password = $_POST['password'];

$sql="SELECT * FROM `users` WHERE ID_Number='$idnumber'";
$result = mysqli_query($mysqli,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count == 1) {
	 if(password_verify($password,$row['Password']) && $idnumber==$row['ID_Number']){
         $pass=password_verify($password,$row['Password']);
         $_SESSION['user']=$row['Fullnames'];
         $_SESSION['user_id']=$row['User_ID'];
         $_SESSION['id_number']=$row['ID_Number'];
        header("Location:http://192.168.1.84/LRS/Dashboard-table.php");
          }
          else{
            $_SESSION['LoginError']='<div class="alert alert-danger" role="alert"><p style="text-align:center">Invalid Username or Password </p></div>';
            header("Location:http://192.168.1.84/LRS/index.php");
          }
        }
    else{
        $_SESSION['LoginError']='<div class="alert alert-danger" role="alert"><p style="text-align:center">Invalid yead Username or Password</p></div>';
              header("Location:http://192.168.1.84/LRS/index.php");
    }
    $mysqli->close();

?>