<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/LRS/assets/php/DBConnector.php';

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
    <div class="modal fade" role="dialog" tabindex="-1" id="viewpayment">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="color:#007bff;">LRP - DHBC23904</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body">
                    <form>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group"><label>Title Number</label><input class="form-control" type="text" disabled="" placeholder="RUIRU/RUIRU EAST BLOCK 2/300 55"></div>
                                <div class="form-group"><label>Plot No.</label><input class="form-control" type="text" disabled="" placeholder="938928/02"></div>
                                <div class="form-group"><label>Reference Number</label><input class="form-control" type="text" disabled="" placeholder="LRP - DHBC23904"></div>
                                <div class="form-group"><label>Amount</label><input class="form-control" type="text" disabled="" placeholder="KSH 1000"></div>
                                <div class="form-group"><label>Date of Payment</label><input class="form-control" type="text" disabled="" placeholder="Ruiru"></div>
                                <div class="form-group"><label>Registered Owner(s)</label><input class="form-control" type="text" disabled="" placeholder="Muriuki Lewis Maina"></div>
                                <div class="form-group"><label>ID Number</label><input class="form-control" type="text" disabled="" placeholder="25695163"></div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer"><button class="btn btn-light" data-dismiss="modal" type="button">Close</button><button class="btn btn-primary" id="print" type="button">Print</button></div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="makepayment">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><h1>Payment</h1></h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body">
                    <form style="width:100%;" method="post">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col">
                                <select id="title" onchange="details()" name="titleid" class="form-control">
                                        <optgroup label="Title to Transfer">
                                        <option value="" selected="">Select Title</option>
                                          <?php
                                          $user=$_SESSION['user_id'];
                                          $sql="SELECT * FROM titles WHERE Title_ID= ANY (SELECT Title_ID FROM title_owners WHERE User_ID=".$user.")";
                                          $result=mysqli_query($mysqli,$sql);
                                          $count=mysqli_num_rows($result);
                                          if($count>0){
                                            while($row=mysqli_fetch_array($result)){
                                                    echo '<option value="'.$row['Title_ID'].'">'.$row['Title_Number'].'</option>';
                                            }
                                          }
                                          ?>
                                        </optgroup></select>   
                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col"><select class="form-control float-left">
                                    <optgroup label="Type of Payment">
                                <option value="" selected="">Select Payment</option>
                                    <option value="rates">Land Rates</option>
                                    <option value="rent">Land Rent</option>
                                </optgroup>
                            </select></div>
                            </div>
                        </div>
                        <div class="form-group"><label>Payment Method</label>
                            <div role="tablist" id="accordion-1">
                                <div class="card">
                                    <div class="card-header" role="tab">
                                        <h5 class="mb-0"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-1" href="#accordion-1 .item-1">Mpesa</a></h5>
                                    </div>
                                    <div class="collapse item-1" role="tabpanel" data-parent="#accordion-1">
                                        <div class="card-body">
                                            <p class="card-text text-monospace">1. Go to M-PESA on your phone <br>2. Select Pay Bill option <br>3. Enter Business no. 206206 <br>4. Enter Account no. LHPXYNG <br>5. Enter the Amount. KES 1450 <br>6. Enter your M-PESA PIN and Send <br>7. You
                                                will receive a confirmation SMS from MPESA<br></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab">
                                        <h5 class="mb-0"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-2" href="#accordion-1 .item-2">Airtel Money</a></h5>
                                    </div>
                                    <div class="collapse item-2" role="tabpanel" data-parent="#accordion-1">
                                        <div class="card-body">
                                            <p class="card-text text-monospace">1. Go to Airtel Money on your phone <br>2. Select Pay Bill option <br>3. Select Other <br>4. Enter Business Name. 206206 <br>5. Enter the Amount Ksh. KES 1450 <br>6. Enter your Airtel Money PIN and Send <br>7.
                                                Enter Account no. LHPXYNG <br>8. You will receive a confirmation SMS from Airtel Money<br></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab">
                                        <h5 class="mb-0"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-3" href="#accordion-1 .item-3">Debit/ Credit Card</a></h5>
                                    </div>
                                    <div class="collapse item-3" role="tabpanel" data-parent="#accordion-1">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="col"><img src="assets/img/mastercard.jpg"></div>
                                                <div class="col"><img src="assets/img/visa.jpg"></div>
                                            </div>
                                            <div class="form-row" style="margin-top:10px;">
                                                <div class="col">
                                                    <form>
                                                        <div class="form-group"><input class="form-control" type="number" placeholder="Enter Card Number"></div>
                                                        <div class="form-group"><input class="form-control" type="number" placeholder="CVV"><label style="color:#999999;">The Last three digits at the back of your card</label></div>
                                                        <div class="form-group"><label>Expiration Date</label>
                                                            <div class="form-row">
                                                                <div class="col"><input class="form-control" type="date"></div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="row" style="width:100%;">
                        <div class="col float-left"><button class="btn btn-danger active float-left" data-dismiss="modal" type="button">Cancel</button></div>
                        <div class="col"><button class="btn btn-primary float-right" id="modalpay" style="width:72px;" type="button">Pay</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="loading">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Loading...</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body">
                    <div class="row" style="height:100px;">
                        <div class="col">
                            <!-- Start: Loading Div -->
                            <div id="ldiv" class="loadingdiv"><img class="loadingdivimg" src="assets/img/loading.gif"></div>
                            <!-- End: Loading Div -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <p class="text-center" style="width:100%;">Waiting for Mpesa Confirmation</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Start: Sidebar Menu -->
    <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav" style="margin-right:0px;height:100%;">
                <li class="sidebar-brand" style="height:15%;"> <a class="text-monospace" style="height:100%;background-color:#000000;padding-top:14%;color:#dfe7f1;" href="Dashboard.html">Land Registry System</a></li>
                <li> <a data-bs-hover-animate="pulse" style="background-color:rgba(255,255,255,0);color:#999999;" href="Dashboard.html">My Titles<br></a></li>
                <li> <a data-bs-hover-animate="pulse" href="Transfer.html">Transfer</a></li>
                <li> <a data-bs-hover-animate="pulse" href="Subdivide.html">Subdivide</a></li>
                <li> <a data-bs-hover-animate="pulse" href="Amalgamate.html">Amalgamate/Merge</a></li>
                <li> <a data-bs-hover-animate="pulse" href="Payments.html">Payments</a><a data-bs-hover-animate="pulse" href="Caution.html">Caution</a><a data-bs-hover-animate="pulse" href="Charges.html">Charges</a><a data-bs-hover-animate="pulse" href="LandSearch.html">Land Search</a>
                    <a
                        data-bs-hover-animate="pulse" href="Lease.html">Lease</a><a data-bs-hover-animate="pulse" style="background-color:#333333;color:#ffffff;" href="RegisterLand.html">Register Land</a></li>
                <li> </li>
            </ul>
        </div>
        <div class="page-content-wrapper">
            <div class="container-fluid">
                <nav class="navbar navbar-light navbar-expand-md" style="padding:0px;padding-bottom:0px;padding-top:0p;">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">
                            <h2 style="color:rgb(0,123,255);">Payments</h2>
                        </a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navcol-1">
                            <ul class="nav navbar-nav" style="width:80%;"></ul>
                            <ul class="nav navbar-nav float-right" style="width:30%;">
                                <li class="dropdown nav-item float-right"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" style="width:170px;" href="#"><strong>Welcome, <?php   if (isset($_SESSION['user'])){ echo $_SESSION['user'];}?></strong></a>
                                    <div class="dropdown-menu dropdown-menu-right" role="menu"><a class="dropdown-item" role="presentation" href="#">My Profile</a><a class="dropdown-item" role="presentation" href="#">Log Out</a></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <hr>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <form class="m-auto">
                            <div class="form-group m-auto">
                                <div class="form-row">
                                    <div class="col-4"><input class="form-control" type="search" placeholder="Search For a Payment"></div>
                                    <div class="col-1"><a class="btn btn-primary" role="button" href="LandSearch-1.html">Search</a></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-4"><button class="btn btn-primary float-right" id="pay" style="margin-bottom:20px;" type="button">Make Payment</button></div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Description</th>
                                        <th>Reference Number</th>
                                        <th>Date of Payment</th>
                                        <th>Amount(Ksh)</th>
                                        <th>Status</th>
                                        <th>Reciept</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Land Rent</td>
                                        <td><a href="#">LRP-DHBC23904</a></td>
                                        <td>09/09/2018</td>
                                        <td>1000/=</td>
                                        <td class="table-success">NOT PAID</td>
                                        <td><button class="btn btn-primary" id="view_payment" type="button">View</button></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Land Rent</td>
                                        <td><a href="#">LRP-DHBC23904</a></td>
                                        <td>14/09/2017</td>
                                        <td>1000/=</td>
                                        <td class="table-success">NOT PAID</td>
                                        <td><button class="btn btn-primary" id="view_payment" type="button">View</button></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Land Rent</td>
                                        <td><a href="#">LRP-DHBC23904</a></td>
                                        <td>17/09/2017</td>
                                        <td>1000/=</td>
                                        <td class="table-success">NOT PAID</td>
                                        <td><button class="btn btn-primary" id="view_payment" type="button">View</button></td>
                                    </tr>
                                </tbody>
                            </table>
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