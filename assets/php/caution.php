<?php

session_start();
include $_SERVER['DOCUMENT_ROOT'].'/LRS/assets/php/DBConnector.php';
$date = date("d/m/Y");
/*
$idnumber = $mysqli->real_escape_string($_REQUEST['idNumber']);
$fullnames = $mysqli->real_escape_string($_REQUEST['fullNames']);
$email = $mysqli->real_escape_string($_REQUEST['emailAddress']);
$phonenumber = $mysqli->real_escape_string($_REQUEST['mobileNumber']);
$taxnumber = $mysqli->real_escape_string($_REQUEST['taxNumber']);
$address = $mysqli->real_escape_string($_REQUEST['physicalAddress']);
*/
if(isset($_POST['titlenumber'])){
    $title = $_POST['titlenumber'];
    $plotnumber = $_POST['plotnumber'];
    echo $title;
    echo $plotnumber;
    //$title="RUIRU/RUIRU EAST BLOCK 2/300 59";
    //$plotnumber="122121/12";
    $caveat = $_POST['reason_to_caution'];
    $user=$_SESSION['user_id'];
    

    $result=mysqli_query($mysqli,"SELECT * FROM `titles` WHERE `Title_Number`='$title' AND `Plot_Number` = '$plotnumber'");
    $count=mysqli_num_rows($result);
    $row=mysqli_fetch_array($result);
    if($count>0){
    $titleid=$row['Title_ID'];
    $filename = $_FILES['documents']['name'];
    $file_tmp = $_FILES['documents']['tmp_name'];
    $filetype= $_FILES['documents']['type'];
    $filesize= $_FILES['documents']['size'];
    $file=$user."-".$filename;
    $filepath= $_SERVER['DOCUMENT_ROOT']."/LRS/assets/images/caution/".$file;
    move_uploaded_file($file_tmp,$filepath);
    $query=mysqli_query($mysqli,"INSERT INTO `caveats`(`Title_ID`, `User_ID`, `Caveat`, `Supporting_Documents`, `Date`, `Status`) VALUES ('$titleid','$user','$caveat','$file','$date','ACTIVE')");
    $_SESSION['CautionSuccess']='<div class="alert alert-success" id="success-alert"><button type="button" class="close" data-dismiss="alert">x</button><strong>Title '.$title.' has been cautioned</strong></div>';
    header("location: http://192.168.1.84/LRS/Caution.php");
    }
    else{
        $_SESSION['CautionSuccess']='<div class="alert alert-danger" id="success-alert"><button type="button" class="close" data-dismiss="alert">x</button><strong>'.$title.','.$plotnumber.' The title number and plot number combination does not exist!</strong></div>';
        header("Location:http://192.168.1.84/LRS/Caution.php");
    }
}
else if(isset($_POST['delete'])){
    $caveat_id=$_POST['delete'];
    $sql="UPDATE `caveats` SET `Status`='Removed on $date' WHERE `Caveat_ID`='$caveat_id'";
    $result=mysqli_query($mysqli,$sql);
    if($mysqli->query($sql) === true){
        $_SESSION['DeleteSuccess']='<div class="alert alert-success" id="success-alert"><button type="button" class="close" data-dismiss="alert">x</button><strong>Title has been removed</strong></div>';
    }
    else{
        $_SESSION['DeleteSuccess']='<div class="alert alert-danger" id="success-alert"><button type="button" class="close" data-dismiss="alert">x</button><strong>Title removal has failed</strong></div>';

    }
}
else{
$user=$_SESSION['user_id'];
$sql="SELECT * FROM caveats WHERE User_ID=".$user." AND `Status` = 'Active'";
$result=mysqli_query($mysqli,$sql);
$count=mysqli_num_rows($result);
if($count>0){
    echo ' <form>
    <h4>Title(s) Put On Caution</h4>';
  while($row=mysqli_fetch_array($result)){
      $title_sql="SELECT * FROM titles WHERE Title_ID=".$row['Title_ID']; 
      $title_result=mysqli_query($mysqli,$title_sql);
      $title_row=mysqli_fetch_array($title_result);
          echo '
         
          <div class="form-group">
              <div class="form-row">
                  <div class="col-9"><input class="form-control float-left" type="text" disabled="" placeholder="'.$title_row['Title_Number'].'"></div>
                  <div class="col-3"><button class="btn btn-danger active float-right" onclick="remove('.$row['Caveat_ID'].')" type="button" id="decline">Remove Title</button></div>
              </div>
          </div>
          
          ';
  }
  echo '</form>';
    }
}
?>