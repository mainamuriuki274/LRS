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
                <li> <a  data-bs-hover-animate="pulse" style="background-color:rgba(255,255,255,0);color:#999999;" href="Dashboard-table.php">My Titles<br></a></li>
                <li> <a data-bs-hover-animate="pulse" href="Confirmation.php">Confirm Transfer</a></li>
                <li> <a  data-bs-hover-animate="pulse" href="Transfer.php">Transfer</a></li>
                <li> <a data-bs-hover-animate="pulse" href="Subdivide.php">Subdivide</a></li>
                <li> <a data-bs-hover-animate="pulse" href="Amalgamate.php">Amalgamate/Merge</a></li>
                <li> <a data-bs-hover-animate="pulse" href="Payments.php">Payments</a></li>
               <li> <a data-bs-hover-animate="pulse" href="Caution.php">Caution</a><li>
               <li> <a style="background-color:#333333;color:#ffffff;" data-bs-hover-animate="pulse" href="LandSearch.php">Land Search</a></li>
               <li> <a data-bs-hover-animate="pulse"  href="RegisterLand.php">Register Land</a></li>
            </ul>
        </div>
        <div class="page-content-wrapper">
            <div class="container-fluid">
                <nav class="navbar navbar-light navbar-expand-md" style="padding:0px;padding-bottom:0px;padding-top:0p;">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">
                            <h2 style="color:rgb(0,123,255);">Land Search</h2>
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
            </div>
            <hr>
            <div class="container-fluid">
                <form action="#" method="POST" class="m-auto">
                    <div class="form-group m-auto">
                        <div class="form-row">
                            <div class="col-4"><input class="form-control" required="" type="text" name="titlenumber" placeholder="Enter Title Number"></div>
                            <div class="col-1"><button class="btn btn-primary">Search</button></div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col">
                        <hr>
                    </div>
                </div>
                    <?php 
                    if(isset($_POST['titlenumber'])){
                        $title_number=$_POST['titlenumber'];
                        //$title='RUIRU/RUIRU EAST BLOCK 2/300 59';
                        $sql="SELECT * FROM `titles` WHERE `Title_Number`='".$title_number."'";
                        $title_result=mysqli_query($mysqli,$sql);
                        $title_row=mysqli_fetch_array($title_result);
                        $title_sum=mysqli_num_rows($title_result);
                        $title=$title_row['Title_ID'];
                        if($title_sum>0)
                        {

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
                        
                        
                        
                            echo '  <div class="row">
                            <div class="col-3">
                                <h4 class="text-right"><strong>Search Result for:</strong></h4>
                            </div>
                            <div class="col-9">
                                <h5 class="text-info"><em>'.$title_row['Title_Number'].'</em><br></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3"><img class="img-fluid" src="assets/img/title.png"></div>
                            <div class="col-9">
                                <form>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label>Title Number</label><input class="form-control" type="text" disabled="" placeholder="'.$title_row['Title_Number'].'"></div>
                                            <div class="form-group"><label>Approximate Area</label><input class="form-control" type="text" disabled="" placeholder="'.$title_row['Approximate_Area(Ha)'].' Ha"></div>
                                            <div class="form-group"><label>Plot No.</label><input class="form-control" type="text" disabled="" placeholder="'.$title_row['Plot_Number'].'"></div>
                                            <div class="form-group"><label>County</label><input class="form-control" type="text" disabled="" placeholder="'.$title_row['County'].'"></div>
                                            <div class="form-group"><label>Constituency</label><input class="form-control" type="text" disabled="" placeholder="'.$title_row['Sub_County'].'"></div>
                                            <div class="form-group"><label>Ward</label><input class="form-control" type="text" disabled="" placeholder="'.$title_row['Ward'].' "></div>
                                        </div>';
                                        //second column
                                        echo '<div class="col">
                                        <div class="form-row" style="margin: 0px;margin-left: 0px;">
                                        <div class="col" style="margin: 0px;"><label>Registered Owner(s)</label></div>     
                                        <div class="col" style="margin: 0px;"><label>ID/ Passport Number(s)</label></div>
                                        </div>
                                        
                                        <div class="form-row" style="margin: 0px;margin-left: 0px;">';   

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
                                        echo '</div>
                                        
                                        <div class="form-group"><label>Caveats</label><textarea class="form-control" disabled="" placeholder="'.$caveat.'" rows="6"></textarea></div>
                                            <div class="form-group"><label>Charges</label><textarea class="form-control" disabled="" placeholder="'.$charges.'" rows="7"></textarea></div></div></div>
                                        ';
                            }
                    else{
                        echo '<h1 style="text-align:center;color:red;">No Results Were found</h1>';
                    }
                }
                    ?>
                
              
                               
                            </div>
                        </form>
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