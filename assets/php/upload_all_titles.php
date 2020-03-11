<?php
session_start();
include 'DBConnector.php';

$titles=$_POST['table_titles'];
$sum=count($titles);
for($i=0;$i<$sum;$i++){
  $sql="UPDATE `user_titles` SET `Status`='SUBMITTED' WHERE `Title_ID`='$titles[$i]'";
  $query=mysqli_query($mysqli,$sql);
}
if($mysqli->query($sql) === true){
  header("Location:http://192.168.1.84/LRS/Dashboard-table.php");
  }
  else{
    echo "Error! ".$mysqli -> error;
  }

$query="SELECT * FROM `user_titles` WHERE `Status`='SUBMITTED'";
$result = mysqli_query($mysqli,$query);
$count=mysqli_num_rows($result);
if($count>0){
while($row=mysqli_fetch_array($result)){
$title_number=$row['Title_Number'];
$plot_number=$row['Plot_Number'];
$approximate_area=$row['Approximate_Area(Ha)'];
$county=$row['County'];
$sub_county=$row['Sub_County'];
$ward=$row['Ward'];
$user=$row['User_ID'];
  mysqli_query($mysqli,"INSERT INTO `titles` (`Title_Number`, `Plot_Number`, `Approximate_Area(Ha)`, `County`, `Sub_County`, `Ward`) VALUES ('$title_number','$plot_number','$approximate_area','$county','$sub_county','$ward')");
  $titlesql="SELECT * FROM `titles` WHERE `Title_Number`='$title_number'";
  $titleresult = mysqli_query($mysqli,$titlesql);
  $titlerow=mysqli_fetch_array($titleresult);
  $titleowner=$titlerow['Title_ID'];
  mysqli_query($mysqli,"INSERT INTO `title_owners`(`Title_ID`, `User_ID`, `Type_of_Ownership`) VALUES ('$titleowner','$user','SOLE')");
  //header("Location:http://192.168.1.84/LRS/Dashboard-table.php");
  }
  // else{
  //   $sql="UPDATE `user_titles` SET `Status`='DISPUTED' WHERE `Title_Number`='$title_number'";
  //   echo $mysqli -> error;
  // }
}



$mysqli->close();

?>