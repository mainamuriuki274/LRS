<?php
include 'DBConnector.php';

/*
$idnumber = $mysqli->real_escape_string($_REQUEST['idNumber']);
$fullnames = $mysqli->real_escape_string($_REQUEST['fullNames']);
$email = $mysqli->real_escape_string($_REQUEST['emailAddress']);
$phonenumber = $mysqli->real_escape_string($_REQUEST['mobileNumber']);
$taxnumber = $mysqli->real_escape_string($_REQUEST['taxNumber']);
$address = $mysqli->real_escape_string($_REQUEST['physicalAddress']);
*/

$idnumber = $_POST['idNumber'];
$fullnames = $_POST['fullNames'];
$email = $_POST['emailAddress'];
$phonenumber = $_POST['mobileNumber'];
$taxnumber =$_POST['taxNumber'];
$address = $_POST['physicalAddress'];

// attempt insert query execution
$sql = "INSERT INTO users (ID_Number,ID_Picture,Fullnames,Email_Address,Phonenumber,Tax_Number,Physical_Address)
 VALUES ('$idnumber','None','$fullnames','$email','$phonenumber','$taxnumber','$address')";
if($mysqli->query($sql) === true){
$query = "SELECT * FROM users WHERE ID_Number= '$idnumber'";
$result = mysqli_query($mysqli,$query);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count == 1) {
		$user = $row["User_ID"];
		$filename = $_FILES['idPicture']['name'];
		$file_tmp = $_FILES['idPicture']['tmp_name'];
		$filetype= $_FILES['idPicture']['type'];
		$filesize= $_FILES['idPicture']['size'];
		$idpicture = "$user-".$filename;
		$filepath= $_SERVER['DOCUMENT_ROOT']."/LRS/assets/images/id/".$idpicture;
		move_uploaded_file($file_tmp,$filepath);
		$sequel = "UPDATE `users` SET `ID_Picture`='$idpicture' WHERE User_ID='$user'";
		if($mysqli->query($sequel) === true){
			
$basic  = new \Nexmo\Client\Credentials\Basic('01a561ca', 'NZqJKBd1CfsA2MhB');
$client = new \Nexmo\Client($basic);
$verification = $client->verify()->start([ 
  'number' => '254714308029',
  'brand'  => 'Nexmo',
   'code_length'  => '4']);

echo "Verification id: " . $verification->getRequestId();
			header("location: http://localhost/LRS/Signup-2.html");
	     }
	  }
	  else
	  {
		  echo "Picture failed to upload.";
	  }
}
else{
	echo "An Error Occured! Please try again.". $mysqli -> error;
	
}
$mysqli->close();


?>