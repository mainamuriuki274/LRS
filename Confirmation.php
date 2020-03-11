<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/LRS/assets/php/DBConnector.php';
if (!isset($_SESSION['user_id'])){
    header("Location:http://192.168.1.84/LRS/index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>LAND REGISTRY SYSTEM-Lewis</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typicons/2.0.9/typicons.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
</head>

<body>
    <!-- Start: Sidebar Menu -->
    <div id="wrapper">
        <div id="sidebar-wrapper">
        <ul class="sidebar-nav" style="margin-right:0px;height:100%;">
                <li class="sidebar-brand" style="height:15%;"> <a class="text-monospace" style="height:100%;background-color:#000000;padding-top:14%;color:#dfe7f1;" href="Dashboard.html">Land Registry System</a></li>
                <li> <a data-bs-hover-animate="pulse" style="background-color:rgba(255,255,255,0);color:#999999;" href="Dashboard-table.php">My Titles<br></a></li>
                <li> <a style="background-color:#333333;color:#ffffff;"  data-bs-hover-animate="pulse" href="Confirmation.php">Confirm Transfer</a></li>
                <li> <a data-bs-hover-animate="pulse" href="Transfer.php">Transfer</a></li>
                <li> <a data-bs-hover-animate="pulse" href="Subdivide.php">Subdivide</a></li>
                <li> <a data-bs-hover-animate="pulse" href="Amalgamate.php">Amalgamate/Merge</a></li>
                <li> <a data-bs-hover-animate="pulse" href="Payments.php">Payments</a></li>
               <li> <a data-bs-hover-animate="pulse" href="Caution.php">Caution</a><li>
               <li> <a data-bs-hover-animate="pulse" href="LandSearch.php">Land Search</a></li>
               <li> <a data-bs-hover-animate="pulse"  href="RegisterLand.php">Register Land</a></li>
            </ul>
        </div>
        <div class="page-content-wrapper">
            <div class="container-fluid">
                <nav class="navbar navbar-light navbar-expand-md" style="padding:0px;padding-bottom:0px;padding-top:0p;">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">
                            <h2 style="color:rgb(0,123,255);">Transfer Confirmation</h2>
                        </a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navcol-1">
                            <ul class="nav navbar-nav" style="width:80%;"></ul>
                            <ul class="nav navbar-nav float-right" style="width:30%;">
                                <li class="dropdown nav-item float-right"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" style="width:170px;" href="#"><strong>Welcome, <?php   if (isset($_SESSION['user'])){ echo $_SESSION['user'];}?></strong></a>
                                    <div class="dropdown-menu dropdown-menu-right" role="menu"><a class="dropdown-item" role="presentation" href="http://192.168.1.84/LRS/Profile.php">My Profile</a><a class="dropdown-item" role="presentation" href="http://192.168.1.84/LRS/assets/php/logout.php">Log Out</a></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <hr>
            </div>
            <div class="container-fluid">
            <div class="form-row m-auto">

<div class="col-12"><?php if(isset($_SESSION['ConfirmationSuccess'])){
echo $_SESSION['ConfirmationSuccess'];
unset($_SESSION['ConfirmationSuccess']);
}?></div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Title Number</th>
                                <th>Plot Number</th>
                                <th>County&nbsp;</th>
                                <th>Sub County</th>
                                <th>From(Name)</th>
                                <th>From(ID Number)</th>
                                <th class="text-center" style="background-color: rgba(255,255,255,0);">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="clickable-row">
                            <?php
                              // $query="SELECT * FROM titles WHERE Title_ID= ANY (SELECT Title_ID FROM transfers WHERE `User_ID(To)` =".$_SESSION['user_id'].")";
                              $query = "SELECT * FROM transfers WHERE `User_ID(To)` =".$_SESSION['user_id']." AND `Status` ='Pending'";
                               $transfer_result = mysqli_query($mysqli,$query);
                               $count=mysqli_num_rows($transfer_result);
                               $n=1;
                               if($count>0){
                                while($transfer_row=mysqli_fetch_array($transfer_result)){
                                    $title_id=$transfer_row['Title_ID'];
                                    $query = "SELECT * FROM titles WHERE `Title_ID` =".$title_id."";
                                    $result = mysqli_query($mysqli,$query);
                                    $row=mysqli_fetch_array($result);

                                    $user_query = "SELECT * FROM users WHERE `User_ID` =".$transfer_row['User_ID(From)'];
                                    $user_result = mysqli_query($mysqli,$user_query);
                                    $user_row=mysqli_fetch_array($user_result);

                                    echo '<tr>';
                                    echo "<td>$n<br></td>";
                                    echo "<td>".$row['Title_Number']."<br></td>";   
                                    echo "<td>".$row['Plot_Number']."<br></td>";
                                    echo "<td>".$row['County']."<br></td>";
                                    echo "<td>".$row['Sub_County']."<br></td>";
                                    echo "<td>".$user_row['Fullnames']."<br></td>";
                                    echo "<td>".$user_row['ID_Number']."<br></td>";
                                    echo '<td class="d-xl-flex justify-content-xl-center">
                                    <button id="decline_btn" onclick="decline('.$transfer_row['Transfer_ID'].')"  class="btn btn-danger" type="button">Decline</button>
                                    <button id="accept_btn" onclick="accept('.$transfer_row['Transfer_ID'].')" class="btn btn-success" type="button">Accept</button></td>';
                                    echo "</tr>";
                                    $n++;
                                }

                               }
                               else{
                                echo '<tr>';
                                echo "<td></td>";
                                echo "<td></td>";   
                                echo "<td><td>";
                                echo "<td style='color:red;'>No Titles to Accept Transfer</td>";
                                echo "<td></td>";
                                echo "<td></td>";
                                echo "<td></td>";
                                echo "<td></td>";
                                echo "</tr>";
                               }
                               $mysqli->close();
                               ?> 
                               </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   
                 
    <!-- End: Sidebar Menu -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&amp;key=AIzaSyCINp2qQyx0FwFLgdKgF9ThIBYsNjTJ9ck"></script>
    <script src="assets/js/script.min.js"></script>
    <script>
        $(document).ready(function() {
  $("#success-alert").show();
    $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
      $("#success-alert").slideUp(500);
    });
});
    var title;
        function accept(title){
            $.ajax({    //create an ajax request to display.php
            type: "POST",
            url: "http://192.168.1.84/LRS/assets/php/confirmation.php",             
            dataType: "text",
            data:{accept: title},   //expect html to be returned                
            success: function(response){ 
              location.reload();  
             
            }            
            })
        }
        function decline(title){
            $.ajax({    //create an ajax request to display.php
            type: "POST",
            url: "http://192.168.1.84/LRS/assets/php/confirmation.php",             
            dataType: "text",
            data:{decline: title},   //expect html to be returned                
            success: function(response){ 
                location.reload();  

            }            
            })
        }
    
    
    </script>
</body>

</html>