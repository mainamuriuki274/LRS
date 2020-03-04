<!DOCTYPE html>
<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/LRS/assets/php/DBConnector.php';

?>
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
    <div class="modal fade" role="dialog" tabindex="-1" id="landdetails">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Land Details</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body">
                    <p>Title Number - RUIRU/RUIRU EAST BLOCK 2/300 55<br>Approximate Area - 0.0213 Ha<br>Plot No. - 938928/02<br>County - Kiambu<br>Constituency -&nbsp;Ruiru<br>Ward -&nbsp;Gatongora&nbsp;<br></p>
                </div>
                <div class="modal-footer"><button class="btn btn-light" data-dismiss="modal" type="button">Close</button></div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="voice">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Loading...</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body">
                    <p class="text-center">Waiting for voice or fingerprint verification</p>
                </div>
                <div class="modal-footer"><button class="btn btn-danger m-auto" data-dismiss="modal" type="button">Cancel Transaction</button></div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="confirm">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Password Verification</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body">
                    <form><input class="form-control" type="password" placeholder="Password"></form>
                </div>
                <div class="modal-footer"><button class="btn btn-danger" data-dismiss="modal" type="button">Cancel</button><button class="btn btn-primary" id="confirmation" type="button">Confirm</button></div>
            </div>
        </div>
    </div>
    <!-- Start: Sidebar Menu -->
    <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav" style="margin-right:0px;height:100%;">
                <li class="sidebar-brand" style="height:15%;"> <a class="text-monospace" style="height:100%;background-color:#000000;padding-top:14%;color:#dfe7f1;" href="Dashboard.html">Land Registry System</a></li>
                <li> <a data-bs-hover-animate="pulse" style="background-color:rgba(255,255,255,0);color:#999999;" href="Dashboard.html">My Titles<br></a></li>
                <li> <a data-bs-hover-animate="pulse" style="color:#999999;background-color:rgba(255,255,255,0);" href="Transfer.html">Transfer</a></li>
                <li> <a data-bs-hover-animate="pulse" style="background-color:rgba(255,255,255,0);color:#999999;" href="Subdivide.html">Subdivide</a></li>
                <li> <a data-bs-hover-animate="pulse" style="background-color:#333333;color:#ffffff;" href="Amalgamate.html">Amalgamate/Merge</a></li>
                <li> <a data-bs-hover-animate="pulse" href="Payments.html">Payments</a><a data-bs-hover-animate="pulse" href="Caution.html">Caution</a><a data-bs-hover-animate="pulse" href="Charges.html">Charges</a><a data-bs-hover-animate="pulse" href="LandSearch.html">Land Search</a>
                    <a
                        data-bs-hover-animate="pulse" href="Lease.html">Lease</a>
                </li>
                <li> </li>
            </ul>
        </div>
        <div class="page-content-wrapper">
            <div class="container-fluid">
                <nav class="navbar navbar-light navbar-expand-md" style="padding:0px;padding-bottom:0px;padding-top:0p;">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">
                            <h2 style="color:rgb(0,123,255);">Amalgamate/ Merge</h2>
                        </a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navcol-1">
                            <ul class="nav navbar-nav" style="width:80%;"></ul>
                            <ul class="nav navbar-nav float-right" style="width:30%;">
                                <li class="dropdown nav-item float-right"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" style="width:170px;" href="#"><strong>Welcome, Lewis</strong></a>
                                    <div class="dropdown-menu dropdown-menu-right" role="menu"><a class="dropdown-item" role="presentation" href="#">My Profile</a><a class="dropdown-item" role="presentation" href="#">Log Out</a></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <hr>
            </div>
            <div class="container-fluid">
                <div class="row" style="height:75px;">
                    <div class="col-7 d-inline-flex">
                        <ol class="breadcrumb" style="background-color:rgba(255,255,255,0.2);">
                            <li class="breadcrumb-item"><a href="Dashboard.html"><span style="color:#007bff;">Dashboard</span></a></li>
                            <li class="breadcrumb-item"><a><span>Amalgamate/ Merge<br><br><br><br></span></a></li>
                        </ol>
                    </div>
                </div>
                <div class="row m-auto">
                    <div class="col-4 d-flex">
                        <form style="width:100%;" method="post">
                            <h1>Amalgamate/ Merge:</h1>
                            <div class="form-group"><label style="width:100%;">Surveyor's Number</label><input class="form-control" type="number" placeholder="Enter Surveyor's number"></div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-11"><select class="form-control float-left"><optgroup label="Title to Transfer"><option value="12" selected="">RUIRU/RUIRU EAST BLOCK 2/300 55</option><option value="13">RUIRU/RUIRU EAST BLOCK 2/300 56</option><option value="14">RUIRU/RUIRU EAST BLOCK 2/300 57</option></optgroup></select></div>
                                    <div
                                        class="col-1"><a class="btn btn-outline-primary float-right" role="button" id="actions" href="Amalgamate-1.html"><i class="fa fa-plus"></i></a></div>
                            </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col" style="width:100%;margin:0px;"><label class="col-form-label">Titles to be Merged:</label></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-11"><input class="form-control float-left" type="text" disabled="" placeholder="RUIRU/RUIRU EAST BLOCK 2/300 55"></div>
                            <div class="col-1"><a class="btn btn-outline-danger float-right" role="button" id="actions" href="Amalgamate.html"><i class="fa fa-trash"></i></a></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-11"><input class="form-control float-left" type="text" disabled="" placeholder="RUIRU/RUIRU EAST BLOCK 2/300 56"></div>
                            <div class="col-1"><a class="btn btn-outline-danger float-right" role="button" id="actions" href="Amalgamate.html"><i class="fa fa-trash"></i></a></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-11"><input class="form-control float-left" type="text" disabled="" placeholder="RUIRU/RUIRU EAST BLOCK 2/300 57"></div>
                            <div class="col-1"><a class="btn btn-outline-danger float-right" role="button" id="actions" href="Amalgamate.html"><i class="fa fa-trash"></i></a></div>
                        </div>
                    </div>
                    <div class="form-group"><label>Total Approximate Area</label><input class="form-control" type="number" disabled="" placeholder="1.3 Ha"></div>
                    <div class="form-group"><a class="btn btn-primary btn-block" role="button" id="modal" href="#modal">Amalgamate/ Merge</a>
                        <div class="modal fade" role="dialog" tabindex="-1" id="confirm">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Password Verification</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                    <div class="modal-body">
                                        <form><input class="form-control" type="password" placeholder="Password"></form>
                                    </div>
                                    <div class="modal-footer"><button class="btn btn-danger" data-dismiss="modal" type="button">Cancel</button><button class="btn btn-primary" id="confirmation" type="button">Confirm</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" role="dialog" tabindex="-1" id="voice">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Loading...</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                    <div class="modal-body">
                                        <p class="text-center">Waiting for voice or fingerprint verification</p>
                                    </div>
                                    <div class="modal-footer"><button class="btn btn-danger m-auto" data-dismiss="modal" type="button">Cancel Transaction</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="col-8 d-inline-block" id="titles">
                    <div class="row d-inline-flex flex-box flex-wrap-wrap">
                        <div class="col-sm-4 flex-box flex-justify-center flex-align-center"><a class="fancybox" rel="gallery1" title="Hero Image Nature" href="Title.html"><img class="img-fluid" data-bs-hover-animate="pulse" src="assets/img/title.png"></a></div>
                        <div class="col-sm-4 flex-box flex-justify-center flex-align-center"><a class="fancybox" rel="gallery1" title="Hero Image Nature" href="Title.html"><img class="img-fluid" data-bs-hover-animate="pulse" src="assets/img/title.png"></a></div>
                        <div class="col-sm-4 flex-box flex-justify-center flex-align-center"><a class="fancybox" rel="gallery1" title="Hero Image Nature" href="Title.html"><img class="img-fluid" data-bs-hover-animate="pulse" src="assets/img/title.png"></a></div>
                        <div class="col-sm-4 flex-box flex-justify-center flex-align-center"><a class="fancybox" rel="gallery1" title="Hero Image Nature" href="Title.html"></a></div>
                    </div>
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