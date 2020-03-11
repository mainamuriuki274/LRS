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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LRS_ORG</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typicons/2.0.9/typicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body>

    <div id="wrapper">
        <div id="sidebar-wrapper">
        <ul class="sidebar-nav" style="margin-right:0px;height:100%;">
                <li class="sidebar-brand" style="height:15%;"> <a class="text-monospace" style="height:100%;background-color:#000000;padding-top:14%;color:#dfe7f1;" href="Dashboard.html">Land Registry System</a></li>
                <li> <a  data-bs-hover-animate="pulse" style="background-color:rgba(255,255,255,0);color:#999999;" href="Dashboard-table.php">My Titles<br></a></li>
                <li> <a data-bs-hover-animate="pulse" href="Confirmation.php">Confirm Transfer</a></li>
                <li> <a  data-bs-hover-animate="pulse" href="Transfer.php">Transfer</a></li>
                <li> <a   data-bs-hover-animate="pulse" href="Subdivide.php">Subdivide</a></li>
                <li> <a data-bs-hover-animate="pulse" href="Amalgamate.php">Amalgamate/Merge</a></li>
                <li> <a data-bs-hover-animate="pulse" href="Payments.php">Payments</a></li>
               <li> <a style="background-color:#333333;color:#ffffff;" data-bs-hover-animate="pulse" href="Caution.php">Caution</a><li>
               <li> <a  data-bs-hover-animate="pulse" href="LandSearch.php">Land Search</a></li>
               <li> <a data-bs-hover-animate="pulse"  href="RegisterLand.php">Register Land</a></li>
            </ul>
        </div>
        <div class="page-content-wrapper">
        <div class="container-fluid">
                        <a class="navbar-brand" href="#">
                            <h2 style="color:rgb(0,123,255);">Caution</h2>
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
            <div class="container-fluid">
                <hr style="width:100%;">
                <div class="row" style="height:60px;">
                    <div class="col d-inline-flex">
                       
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row" style="margin-bottom:30px;">
                <div class="col-12"><?php if(isset($_SESSION['CautionSuccess'])){
                    echo $_SESSION['CautionSuccess'];
                    unset($_SESSION['CautionSuccess']);
                }?></div>
                    <div class="col-2"></div>
                    <div class="col-1"></div>
                    <div class="col-6" id="caution_title" style="border:1px solid darkgrey; border-radius:19px;padding-bottom:15px;">
                        <form action="http://192.168.1.84/LRS/assets/php/caution.php" method="POST">
                            <div style="margin-top:30px;" class="form-group"><label>Title number to Caution</label><input class="form-control" type="text" required=""  autocomplete="on" value="" required="" name="titlenumber"></div>
                            <div class="form-group"><label>Plot number to Caution</label><input class="form-control" type="text"  required="" autocomplete="on" value="" required="" name="plotnumber"></div>
                            <div class="form-group"><label>Reason for Caution</label><textarea name="reason_to_caution" required="" class="form-control"></textarea></div>
                            <div class="form-group"><label style="width:100%;">Attach Supporting Document(s)</label><input name="documents" required="" type="file"></div>
                             <div class="form-group"><button class="btn btn-primary float-right" type="submit" >Caution Title</button></div>
                    </form>
                </div>
            </div>
            <div class="row">
        
                <div class="col-2"></div>
                <div class="col-1"></div>
                <div class="col-6" id="caution_titles">
                   
                  </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js"></script>
    <script src="assets/js/script.min.js"></script>
    <script>
    $(document).ready(function() {
    $("#success-alert").show();
    $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
      $("#success-alert").slideUp(500);
    }); 
    caveats();
});
function caveats(){
    $.ajax({    //create an ajax request to display.php
        type: "POST",
        url: "http://192.168.1.84/LRS/assets/php/caution.php",             
        dataType: "text",         
        success: function(response){ 
        $('#caution_titles').html(response);
        }            
})
}
var id;
function remove(id){
    $.ajax({    //create an ajax request to display.php
        type: "POST",
        url: "http://192.168.1.84/LRS/assets/php/caution.php",             
        dataType: "text",     
        data:{delete: id},       
        success: function(response){ 
            caveats();
        }            
})
}
    </script>
</body>

</html>