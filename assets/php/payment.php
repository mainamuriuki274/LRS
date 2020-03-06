<?php
session_start();
include 'DBConnector.php';
// attempt insert query execution

$user = $_SESSION['user_id'];

if(isset($_POST['title']) && isset($_POST['payment'])){
$title =$_POST['title'];
$payment =$_POST['payment'];
$date = date("d/m/Y");

if($payment=="rates"){
$amount=1000;
$payment="Land Rates";
}
else if($payment=="rent"){
$amount=1500;
$payment="Land Rent";
}

mysqli_query($mysqli,"INSERT INTO `payments`(`User_ID`, `Title_ID`, `Description`, `Amount`, `Date`) VALUES ('$user','$title','$payment','$amount','$date')");
echo '<div class="alert alert-success" id="success-alert"><button type="button" class="close" data-dismiss="alert">x</button><strong></strong>Payment successfully made</div>';

$mysqli->close();
}
else if(isset($_POST['reciept'])){
  $title =$_POST['reciept'];
  $result = mysqli_query($mysqli,"SELECT * FROM `payments` WHERE `Payment_ID`=$title");
  $row=mysqli_fetch_array($result);
  $title_result=mysqli_query($mysqli,"SELECT * FROM `titles` WHERE `Title_ID`=".$row['Title_ID']);
  $title_row=mysqli_fetch_array($title_result);
  $person_result=mysqli_query($mysqli,"SELECT * FROM `users` WHERE `User_ID`=".$row['User_ID']);
  $person_row=mysqli_fetch_array($person_result);

  echo ' <div class="form-group"><label>Title Number</label><input class="form-control" type="text" disabled="" placeholder="'.$title_row['Title_Number'].'"></div>
  <div class="form-group"><label>Plot No.</label><input class="form-control" type="text" disabled="" placeholder="'.$title_row['Plot_Number'].'"></div>
  <div class="form-group"><label>Reference Number</label><input class="form-control" type="text" disabled="" placeholder="LRS - '.$row['Payment_ID'].'"></div>
  <div class="form-group"><label>Amount</label><input class="form-control" type="text" disabled="" placeholder="Ksh '.$row['Amount'].'"></div>
  <div class="form-group"><label>Date of Payment</label><input class="form-control" type="text" disabled="" placeholder="'.$row['Date'].'"></div>
  <div class="form-group"><label>Paid by</label><input class="form-control" type="text" disabled="" placeholder="'.$person_row['Fullnames'].'"></div>
  <div class="form-group"><label>ID Number</label><input class="form-control" type="text" disabled="" placeholder="'.$person_row['ID_Number'].'"></div>';
}
else if(isset($_POST['search'])){
  $search_payment=$_POST['search'];
  $result = mysqli_query($mysqli,"SELECT * FROM `payments` WHERE `Payment_ID` LIKE '%$search_payment%' OR `Description` LIKE '%$search_payment%' OR `Amount` LIKE '%$search_payment%' OR `Date` LIKE '%$search_payment%' AND `User_ID`='$user'");
$count=mysqli_num_rows($result);
$n=0;
if($count>0){
  while($row=mysqli_fetch_array($result)){
    $title_result=mysqli_query($mysqli,"SELECT * FROM `titles` WHERE `Title_ID`=".$row['Title_ID']);
    $title_row=mysqli_fetch_array($title_result);
    $n++;
    echo '<tr>
    <td>'.$n.'</td>
    <td>'.$title_row['Title_Number'].'</td>
    <td>'.$row['Description'].'</td>
    <td>'.$row['Amount'].'</td>
    <td>'.$row['Date'].'</td>
    <td><button class="btn btn-primary" onclick="details('.$row['Payment_ID'].')" id="view" type="button">View</button></td>
</tr>';
  }
}
else if($count==0){
  $result = mysqli_query($mysqli,"SELECT * FROM `titles` WHERE `Title_Number` LIKE '%$search_payment%' OR `Plot_Number` LIKE '%$search_payment%' OR `County` LIKE '%$search_payment%' OR `Sub_County` LIKE '%$search_payment%'  OR `Ward` LIKE '%$search_payment%'");
  echo $search_payment;
  $count=mysqli_num_rows($result);
  if($count>0){
    while($row=mysqli_fetch_array($result)){
      $n++;
    $title_id=$row['Title_ID'];
    $payment_result=mysqli_query($mysqli,"SELECT * FROM `payments` WHERE `Title_ID` ='$title_id'  AND  `User_ID`='$user'");
    $payment_sum=mysqli_num_rows($payment_result);
    $payment_row=mysqli_fetch_array($payment_result);
    if($count>0)
      {
        
        echo '<tr>
        <td>'.$n.'</td>
        <td>'.$row['Title_Number'].'</td>
        <td>'.$payment_row['Description'].'</td>
        <td>'.$payment_row['Amount'].'</td>
        <td>'.$payment_row['Date'].'</td>
        <td><button class="btn btn-primary" onclick="details('.$payment_row['Payment_ID'].')" id="view" type="button">View</button></td>
    </tr>';
      }
      else{
        echo '<tr>
        <td></td>
        <td></td>
        <td></td>
        <td style="color:red;"><strong>No Results Found!</strong></td>
        <td></td>
        <td></td>
    </tr>';
      }
    }
  }
  else{
    echo '<tr>
    <td></td>
    <td></td>
    <td></td>
    <td style="color:red;"><strong>No Results Found!</strong></td>
    <td></td>
    <td></td>
</tr>';
  }
  
}
}

else{
$result = mysqli_query($mysqli,"SELECT * FROM `payments` WHERE `User_ID`=$user");
$count=mysqli_num_rows($result);
$n=0;
if($count>0){
  while($row=mysqli_fetch_array($result)){
    $title_result=mysqli_query($mysqli,"SELECT * FROM `titles` WHERE `Title_ID`=".$row['Title_ID']);
    $title_row=mysqli_fetch_array($title_result);
    $n++;
    echo '<tr>
    <td>'.$n.'</td>
    <td>'.$title_row['Title_Number'].'</td>
    <td>'.$row['Description'].'</td>
    <td>'.$row['Amount'].'</td>
    <td>'.$row['Date'].'</td>
    <td><button class="btn btn-primary" onclick="details('.$row['Payment_ID'].')" id="view" type="button">View</button></td>
</tr>';
  }
}

}


?>