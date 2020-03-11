<?php 
session_start();
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
    <!-- Start: Navigation Clean -->
    <div>
        <nav class="navbar navbar-light navbar-expand-md navigation-clean">
            <div class="container"><a class="navbar-brand" href="#">Land Registry System</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse"
                    id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="#"></a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="#news">News</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="#">About Us</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="#">Help</a></li>
                        <li class="dropdown nav-item"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Government Links</a>
                            <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="https://www.ecitizen.go.ke/">eCitizen</a><a class="dropdown-item" role="presentation" href="http://www.ntsa.go.ke/">NTSA</a><a class="dropdown-item" role="presentation" href="http://evisa.go.ke/evisa.html">eVisa</a>
                                <a
                                    class="dropdown-item" role="presentation" href="#">Menu Item</a>
                            </div>
                        </li>
                        <li class="nav-item" role="presentation"><a style="background-color:rgba(10,56,218,0.78);" class="btn btn-primary" href="Signup-1.php">Register</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- End: Navigation Clean -->
    <div class="container-fluid">
        <div style="border-radius:5px;background-image:url(&quot;assets/img/top-view-photo-of-river-near-farmland-2476015.jpg&quot;);width:100%;height:850px;background-repeat:no-repeat;background-size:cover;background-position:center;">
            <div class="row float-right" style="margin-top:10%;margin-right:2%;">
                <div class="col-7" style="background-color:rgba(4,33,1,0.80)">
                    <div class="float-left" style="margin-top:15%;">
                        <h1 class="text-center" style="background-color:rgba(255,255,255,0);color:#ffffff;">Do all your land transactions faster</h1>
                        <p class="text-center" style="background-color:rgba(255,255,255,0);color:#ffffff;">The easiest, secure and convinient way for your land transactions</p>
                        <p></p>
                        <div class="row">
                            <div class="col"><button class="btn btn-outline-primary" style="color:white;width:100%;margin-left:auto;margin-right:auto;" type="button">Learn More</button></div>
                        </div>
                    </div>
                </div>
                <div class="col-5" style="background-color:#f7f9fc;">
                    <form  method="post" action="http://192.168.1.84/LRS/assets/php/login.php" class="m-auto" id="loginform" style="padding-top:10%;" method="post">
                        <h2 class="sr-only">Login Form</h2>
                        <div class="form-group"><input class="form-control" required="" type="number"  name="idnumber" placeholder="ID /Passport Number"></div>
                        <div class="form-group"><input class="form-control" required="" type="password" name="password" placeholder="Password"></div>
                        <div class="form-group"><input type="submit" class="btn btn-primary btn-block" value="Login"></div>
                        <div class="form-group"><a class="forgot" style="float:left;" href="#">Forgot your email or password?</a>
                        <a class="forgot" style="float:right;" href="Signup-1.php">Sign Up</a></
                        </div>
                        <?php if (isset($_SESSION['LoginError'])){echo $_SESSION['LoginError'];} unset($_SESSION['LoginError']); ?>
                    </form>
                </div>
            </div>
        </div>

        <!-- <div style="margin-bottom:0px;margin-right:200px;margin-left:200px;margin-top:30px;">
            <div class="media d-inline-flex"><img class="mr-3" src="assets/img/Capture.png">
                <div class="media-body">
                    <h5 class="text-center" style="color:rgb(0,123,255);"><br><strong>What The Land Registry System Does</strong><br><br></h5>
                    <p class="text-center">It automates the land transactions processes to provide a convenient, secure and effective process.&nbsp;<br>We are a professional and independent provider of Land Registry Title Deeds and Land Registry documents. Our Land Registry
                        Online search service covers properties in England, Wales, Scotland and Northern Ireland.We have instant access to the Land Registers for over 20 million properties and offer a complete Land Registry search service, including the
                        main Title Deeds, i.e. the Title Register, Title Plan and Registered Old Deeds, and also historical editions of the register and title plan.The portal is operated by a private company not a government institution. Any search request
                        request lodged on the website will be processed through the relevant Land Registry office or other professional companies. Search results will be forwarded by email or sent by post where electronic documents are not available.We
                        have significant experience in carrying out the searches that are offered on this portal. If you are not a confident searcher or not sure what document you need please feel free to request one of our services or contact us for
                        further information.<br><br></p>
                </div>
            </div>
        </div> -->
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&amp;key=AIzaSyCINp2qQyx0FwFLgdKgF9ThIBYsNjTJ9ck"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>