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
                <li> <a  data-bs-hover-animate="pulse" style="background-color:rgba(255,255,255,0);color:#999999;" href="Dashboard-table.php">My Titles<br></a></li>
                <li> <a data-bs-hover-animate="pulse" href="Confirmation.php">Confirm Transfer</a></li>
                <li> <a  data-bs-hover-animate="pulse" href="Transfer.php">Transfer</a></li>
                <li> <a style="background-color:#333333;color:#ffffff;"  data-bs-hover-animate="pulse" href="Subdivide.php">Subdivide</a></li>
                <li> <a data-bs-hover-animate="pulse" href="Amalgamate.php">Amalgamate/Merge</a></li>
                <li> <a data-bs-hover-animate="pulse" href="Payments.php">Payments</a></li>
               <li> <a data-bs-hover-animate="pulse" href="Caution.php">Caution</a><li>
               <li> <a  data-bs-hover-animate="pulse" href="LandSearch.php">Land Search</a></li>
               <li> <a data-bs-hover-animate="pulse"  href="RegisterLand.php">Register Land</a></li>
            </ul>
        </div>
        <div class="page-content-wrapper">
            <div class="container-fluid">
                <nav class="navbar navbar-light navbar-expand-md" style="padding:0px;padding-bottom:0px;padding-top:0p;">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">
                            <h2 style="color:rgb(0,123,255);">My Profile</h2>
                        </a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navcol-1">
                            <ul class="nav navbar-nav" style="width:80%;"></ul>
                            <ul class="nav navbar-nav float-right" style="width:30%;">
                                <li class="dropdown nav-item float-right"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" style="width:170px;" href="#"><strong>Welcome,  <?php   if (isset($_SESSION['user'])){ echo $_SESSION['user'];}?></strong></a>
                                    <div class="dropdown-menu dropdown-menu-right" role="menu"><a class="dropdown-item" role="presentation" href="http://192.168.1.84/LRS/Profile.php">My Profile</a><a class="dropdown-item" role="presentation" href="http://192.168.1.84/LRS/assets/php/logout.php">Log Out</a></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <hr>
            </div>
            <div class="container-fluid">
                <div class="row" style="height:60px;">
                    <div class="col-12 d-inline-flex">
                        <ol class="breadcrumb" style="background-color:rgba(255,255,255,0.2);">
                            <li class="breadcrumb-item"><a href="Dashboard.html"><span style="color:#007bff;">My Titles</span></a></li>
                            <li class="breadcrumb-item"><a><span>My Profile<br><br><br><br></span></a></li>
                        </ol>
                    </div>
                </div>
                
<?php
$user=$_SESSION['user_id'];
$sql="SELECT * FROM `users` WHERE `User_ID`='$user'";
$result = mysqli_query($mysqli,$sql);
$count=mysqli_num_rows($result);
$row=mysqli_fetch_array($result);
$path=$_SERVER["DOCUMENT_ROOT"];
if($count>0)
{
    echo ' 
                <div class="row">
                    <div class="col-3" style="width:250px;height:300px;">
                        <div class="row m-auto">
                            <div class="col-12 m-auto" style="width:250px;height:300px;"><img class="img-fluid float-right" src="/LRS/assets/images/id/'.$row['ID_Picture'].'"></div>
                          <!--  <p>'.$path.'/LRS/assets/images/id/'.$row['ID_Picture'].'</p> -->
                        </div>
                    </div>
                    <div class="col-9">



 
    <h1>'.$row['Fullnames'].'<a class="btn btn-outline-primary float-right" role="button" href="EditProfile.php"><i class="fa fa-edit"></i></a></h1>
    <h6 style="color:#007bff;">Land Owner</h6>
    <hr>
    <h6 style="color:#999999;">My Badges</h6><i class="icon-badge"></i>
    <hr>
    <h6 style="color:#999999;">Contact Information</h6>
    <div class="row" style="margin-left:0px;">
        <div class="col-3" style="margin-left:0px;">
            <h5 style="color:#000000;">Phone:&nbsp;</h5>
            <h5 style="color:#000000;">Email:&nbsp;</h5>
        </div>
        <div class="col-9">
            <h5 style="color:#007bff;">+254 '.$row['Phonenumber'].'</h5>
            <h5 style="color:#007bff;">'.$row['Email_Address'].'</h5>
        </div>
    </div>
    <hr>
    <hr>
    <h6 style="color:#999999;">Identification&nbsp;Information</h6>
    <div class="row" style="margin-left:0px;">
        <div class="col-3" style="margin-left:0px;">
            <h5 style="color:#000000;">ID Number:&nbsp;</h5>
            <h5 style="color:#000000;">Passport Number:</h5>
        </div>
        <div class="col-9">
            <h5 style="color:#007bff;">'.$row['ID_Number'].'</h5>
            <h5 style="color:#007bff;">None</h5>
        </div>
    </div>
    <h6 style="color:#999999;">Basic Information</h6>
    <div class="row" style="margin-left:0px;">
        <div class="col-3" style="margin-left:0px;">
            <h5 style="color:#000000;">Address:&nbsp;</h5>
            <h5 style="color:#000000;">Date Of Birth:&nbsp;</h5>
            <h5 style="color:#000000;">Gender:</h5>
        </div>
        <div class="col-9">
            <h5 style="color:#007bff;">'.$row['Physical_Address'].'</h5>
            <h5 style="color:#007bff;">'.$row['Date_of_Birth'].'</h5>
            <h5 style="color:#007bff;">'.$row['Gender'].'</h5>
        </div>
    </div>

    ';
}
?>



                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End: Sidebar Menu -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&amp;key=AIzaSyCINp2qQyx0FwFLgdKgF9ThIBYsNjTJ9ck"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>