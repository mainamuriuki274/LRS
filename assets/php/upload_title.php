<?php
session_start();
include 'DBConnector.php';



$titlenumber=$_POST['titlenumber'];
$plotnumber=$_POST['plotnumber'];
$approximatearea=$_POST['approximatearea'];
$county=$_POST['county'];
$subcounty=$_POST['subcounty'];
$ward=$_POST['ward'];
$user=$_SESSION['user_id'];

$query="INSERT INTO `user_titles`(`Title_Number`, `Plot_Number`, `Approximate_Area(Ha)`, `County`, `Sub_County`, `Ward`, `User_ID`, `Status`) VALUES ('$titlenumber','$plotnumber','$approximatearea','$county','$subcounty','$ward','$user','NOT SUBMITTED')";
$sql=mysqli_query($mysqli,$query);
if($sql){
echo "Success";
}
else{
  echo "Error! ".$mysqli -> error;
}
$mysqli->close();

?>