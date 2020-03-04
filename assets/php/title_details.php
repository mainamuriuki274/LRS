<?php
session_start();
include 'DBConnector.php';
// attempt insert query execution

$title   = $_POST['title'];


$sql="SELECT * FROM `titles` WHERE Title_ID='$title'";
$result = mysqli_query($mysqli,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
            if($count == 1) {
            echo '
            <div class="form-group"><label>Title Number</label><input class="form-control" type="text" name="titlenumber" disabled="" placeholder="'.$row['Title_Number'].'"></div>
            <div class="form-group"><label>Approximate Area</label><input class="form-control" type="text" disabled="" placeholder="'.$row['Approximate_Area(Ha)'].'"></div>
            <div class="form-group"><label>Plot Number</label><input class="form-control" type="text" disabled="" placeholder="'.$row['Plot_Number'].'"></div>
            <div class="form-group"><label>County</label><input class="form-control" type="text" disabled="" placeholder="'.$row['County'].'"></div>
            <div class="form-group"><label>Sub County</label><input class="form-control" type="text" disabled="" placeholder="'.$row['Sub_County'].'"></div>
            <div class="form-group"><label>Ward</label><input class="form-control" type="text" disabled="" placeholder="'.$row['Ward'].'"></div>
            ';
        }
    else{
        echo "Error";
    }
    $mysqli->close();

?>