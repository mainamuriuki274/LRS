<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/LRS/assets/php/DBConnector.php';
if(!isset($_GET['id']))
{
header("Location:http://192.168.1.84/LRS/Dashboard-table.php");
}
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
                <li> <a style="background-color:#333333;color:#ffffff;" data-bs-hover-animate="pulse" style="background-color:rgba(255,255,255,0);color:#999999;" href="Dashboard-table.php">My Titles<br></a></li>
                <li> <a data-bs-hover-animate="pulse" href="Confirmation.php">Confirm Transfer</a></li>
                <li> <a  data-bs-hover-animate="pulse" href="Transfer.php">Transfer</a></li>
                <li> <a data-bs-hover-animate="pulse" href="Subdivide.php">Subdivide</a></li>
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
                            <h2 style="color:rgb(0,123,255);">My Titles</h2>
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
                    <div class="col-10 d-inline-flex">
                        <ol class="breadcrumb" style="background-color:rgba(255,255,255,0.2);">
                            <li class="breadcrumb-item"><a href="Dashboard.html"><span style="color:#007bff;">My Titles</span></a></li>
                            <li class="breadcrumb-item"><a><span>Title&nbsp;<br><br><br><br></span></a></li>
                        </ol>
                    </div>
                    <div class="col-2">
                        <div class="row">
                            <div class="col-auto"><a class="btn btn-primary float-right" role="button" data-bs-hover-animate="pulse" style="background-color:rgba(255,255,255,0.2);" href="assets/img/title.png"><i class="fa fa-download" style="color:#007bff;"></i></a></div>
                            <div
                                class="col-auto"><a class="btn btn-primary float-right" role="button" data-bs-hover-animate="pulse" style="background-color:rgba(255,255,255,0.2);" href="assets/img/title.png"><i class="icon ion-android-print" style="color:#007bff;"></i></a></div>
                    </div>
                </div>
            </div>
            <form>
                <div class="form-row m-auto">
                    <div class="col-auto"><img class="img-fluid" src="assets/img/title.png"></div>
                    <div class="col min-width:300px" id="titledetails">
                        <div class="form-row" style="background-color:rgba(255,255,255,0.2);">
                            <div class="col-12">
                                <h3 style="width:100%;">Title Details</h3>
                            </div>
                            <div class="col" style="margin-top:10px;min-width:300px">
                                <?php
                                $title=$_GET['id'];
                                $sql="SELECT * FROM `titles` WHERE `Title_ID`=$title";
                                $title_result=mysqli_query($mysqli,$sql);
                                $title_row=mysqli_fetch_array($title_result);

                                $caveat_sql="SELECT * FROM caveats WHERE TITLE_ID=$title";
                                $caveat_result=mysqli_query($mysqli,$caveat_sql);
                                $caveat_row=mysqli_fetch_array($caveat_result);
                                $caveat_count=mysqli_num_rows($caveat_result);
                                if($caveat_count>0){
                                    $caveat=$caveat_row['Caveat'];

                                }
                                else{
                                    $caveat="None";
                                }

                                $charges_sql="SELECT * FROM charges WHERE TITLE_ID=$title";
                                $charges_result=mysqli_query($mysqli,$charges_sql);
                                $charges_row=mysqli_fetch_array($charges_result);
                                $charges_count=mysqli_num_rows($charges_result);
                                if($charges_count>0){
                                    $charges=$charges_row['Charge'];

                                }
                                else{
                                    $charges="None";
                                }

                                ?>

                                <div class="form-group"><label>Title Number</label><input class="form-control" type="text" disabled="" placeholder="<?php echo $title_row['Title_Number'];?>"></div>
                                <div class="form-group"><label>Approximate Area</label><input class="form-control" type="text" disabled="" placeholder="<?php echo $title_row['Approximate_Area(Ha)']." Ha";?>"></div>
                                <div class="form-group"><label>Plot Number</label><input class="form-control" type="text" disabled="" placeholder="<?php echo $title_row['Plot_Number'];?>"></div>
                                <div class="form-row" style="margin: 0px;margin-left: 0px;">
                                <div class="col" style="margin: 0px;"><label>Registered Owner(s)</label></div>     
                                <div class="col" style="margin: 0px;"><label>ID/ Passport Number</label></div>
                                </div>
                                <div class="form-row" style="margin: 0px;margin-left: 0px;">
                                <?php 
                                $title_owners="SELECT * FROM users WHERE User_ID= ANY (SELECT User_ID FROM title_owners WHERE Title_ID=".$title.")";
                                $owners_results=mysqli_query($mysqli,$title_owners);
                                $owners_sum=mysqli_num_rows($owners_results);
                                if($owners_sum>0){
                                        while($owners_row=mysqli_fetch_array($owners_results)){
                                            $name=$owners_row['Fullnames'];
                                            $idnumber=$owners_row['ID_Number'];
                                           echo ' <div class="col" style="margin: 0px;"><input class="form-control" type="text" disabled="" placeholder="'.$name.'"></div>';
                                           echo '<div class="col" style="margin: 0px;"><input class="form-control" type="text" disabled="" placeholder="'.$idnumber.'"></div>';
                                     
                                        }


                                }
                                ?>
                            </div>
                            </div></div>
                             
                            </div>
                            <div class="col" style="margin-top:0px;min-width:300px">
                                <form>
                                    <h3></h3>
                                    <div class="form-group"><label>Caveats/ Cautions</label><textarea class="form-control" disabled="" placeholder="<?php echo $caveat;?>"></textarea></div>
                                    <div class="form-group"><label>Charges</label><textarea class="form-control" disabled="" placeholder="<?php echo $charges;?>"></textarea></div>
                                    <div class="form-group"><label>County</label><input class="form-control" type="text" disabled="" placeholder="<?php echo $title_row['County'];?>"></div>
                                    <div class="form-group"><label>Sub County</label><input class="form-control" type="text" disabled="" placeholder="<?php echo $title_row['Sub_County'];?>"></div>
                                    <div class="form-group"><label>Ward</label><input class="form-control" type="text" disabled="" placeholder="<?php echo $title_row['Ward'];?>"></div>
                                    <div class="form-group">
                                        <div class="form-row m-auto">
                                            <div class="col-auto m-auto" style="margin-top:20px;"><a class="btn btn-outline-primary center-block" role="button" data-bs-hover-animate="pulse" style="margin-bottom:20px;" href="Transfer.html">Transfer</a></div>
                                            <div class="col-auto m-auto"><a class="btn btn-outline-primary center-block" role="button" data-bs-hover-animate="pulse" style="margin-bottom:20px;" href="Subdivide.html">Subdivide</a></div>
                                            <div class="col-auto m-auto"><a class="btn btn-outline-primary center-block" role="button" data-bs-hover-animate="pulse" style="margin-bottom:20px;" href="Subdivide.html">Make Payments</a></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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