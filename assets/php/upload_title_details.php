<?php
session_start();
include 'DBConnector.php';
// attempt insert query execution
if(isset($_POST['title'])){
$title   = $_POST['title'];
$sql="SELECT * FROM `user_titles` WHERE Title_ID='$title'";
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
}
else if(isset($_POST['delete_title'])){
    $title   = $_POST['delete_title'];
    $sql="DELETE FROM `user_titles` WHERE Title_ID='$title'";
    if($mysqli->query($sql) === true){
        echo "Success";
        }
        else{
          echo "Error!";
        }
        $mysqli->close(); 
}
else if(isset($_POST['search'])){
    $search_payment   = $_POST['search'];
    $result = mysqli_query($mysqli,"SELECT * FROM `user_titles` WHERE `Title_Number` LIKE '%$search_payment%' OR `Plot_Number` LIKE '%$search_payment%' OR `County` LIKE '%$search_payment%' OR `Sub_County` LIKE '%$search_payment%'  OR `Ward` LIKE '%$search_payment%'");
    $count=mysqli_num_rows($result);
  if($count>0){
    while($row=mysqli_fetch_array($result)){
      $n++;

        }
    }
}
else{
    $query="SELECT * FROM user_titles WHERE `User_ID`=".$_SESSION['user_id']." AND `Status`='NOT SUBMITTED'";
    $result = mysqli_query($mysqli,$query);
    $count=mysqli_num_rows($result);
    $n=1;
    if($count>0){
     while($row=mysqli_fetch_array($result)){
         $title_id=$row['Title_ID'];
         echo '<tr>';
         echo "<td>$n<br></td>";
         echo "<td>".$row['Title_Number']."<br></td>";   
         echo "<td>".$row['Plot_Number']."<br></td>";
         echo "<td>".$row['Approximate_Area(Ha)']." Ha<br></td>";
         echo "<td>".$row['County']."<br></td>";
         echo '<td><button id="view" onclick="viewdetails('.$row['Title_ID'].');" class="btn btn-outline-primary" id="view_payment" style="width: 100%;margin: 0px;" type="button">View</button></td>';
         echo '<td class="text-center" style="background-color: rgba(255,255,255,0.2);"><button class="btn btn-primary" style="background-color:rgba(255,255,255,0.2);" type="button"><i class="fa fa-edit" style="color:#007bff;"></i></button><button class="btn btn-outline-danger" onclick="deleteDetails('.$row['Title_ID'].');" type="button"><i class="fa fa-trash-o"></i></button></td>';
         echo '<td><input type="text" value="'.$row['Title_ID'].'" hidden="" name="table_titles[]"/></td>';
         echo "</tr>";
         $n++;
     }

    }
    $mysqli->close();
}
?>