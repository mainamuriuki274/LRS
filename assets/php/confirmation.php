<?php
session_start();
include 'DBConnector.php';

$user=$_SESSION['user_id'];

if(isset($_POST['accept'])){
  $title = $_POST['accept'];
  
  $query = mysqli_query($mysqli,"UPDATE `transfers` SET `Status`='ACCEPTED' WHERE `Transfer_ID`='$title'");

  $sql = "SELECT * FROM transfers WHERE `Transfer_ID`='$title'";
  $result = mysqli_query($mysqli,$sql);
  $row=mysqli_fetch_array($result);
  $update_owner=mysqli_query($mysqli,"UPDATE `title_owners` SET `User_ID`='$user' WHERE Title_ID=".$row['Title_ID']."");
  $_SESSION['ConfirmationSuccess']='<div class="alert alert-success" id="success-alert"><button type="button" class="close" data-dismiss="alert">x</button><strong>Successfully Accepted! </strong></div>';

    $mysqli->close();
}
else if(isset($_POST['decline'])){
  $title = $_POST['decline'];
  
  $query = mysqli_query($mysqli,"UPDATE `transfers` SET `Status`='DECLINED' WHERE `Transfer_ID`='$title'");

  $sql = "SELECT * FROM transfers WHERE `Transfer_ID`='$title'";
  $result = mysqli_query($mysqli,$sql);
  $row=mysqli_fetch_array($result);
  $update_owner=mysqli_query($mysqli,"UPDATE `title_owners` SET `User_ID`='".$row['User_ID(From)']."' WHERE Title_ID='".$row['Title_ID']."'");
  $_SESSION['ConfirmationSuccess']='<div class="alert alert-danger" id="success-alert"><button type="button" class="close" data-dismiss="alert">x</button><strong>Successfully Declined! </strong></div>';

    $mysqli->close();
}




?>