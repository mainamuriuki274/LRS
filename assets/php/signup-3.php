<?php
session_start();
include 'DBConnector.php';
// attempt insert query execution

$idnumber   = $_SESSION['idnumber'];
$idpicture  =$_SESSION['idpicture'];
$fullnames  =$_SESSION['fullnames'];
$email		= $_SESSION['email'];
$phonenumber=$_SESSION['phonenumber'];
$taxnumber	=$_SESSION['taxnumber'];
$address	=$_SESSION['address'];
$date_of_birth	=$_SESSION['date_of_birth'];
$gender	=$_SESSION['gender'];
$pass		= $_POST['password'];
$password =password_hash($pass,PASSWORD_DEFAULT);

$sql = "INSERT INTO users (ID_Number,ID_Picture,Fullnames,Email_Address,Phonenumber,Tax_Number,Gender,Date_of_Birth,Physical_Address,Password)
 VALUES ('$idnumber','$idpicture','$fullnames','$email','$phonenumber','$taxnumber','$gender','$date_of_birth','$address','$password')";

 //password_hash($this->password,PASSWORD_DEFAULT);
 //password_verify($this->getPassword(),$row['password']);

if($mysqli->query($sql) === true){
	session_destroy();
	header("location: http://192.168.1.84/LRS/Success.html");
}
else{
	echo "An Error Occured! Please try again.". $mysqli -> error;
}
$mysqli->close();

?>