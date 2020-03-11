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
    <style>
                @media screen {
                    #printSection {
                        display: none;
                    }
                }

                @media print {
                    body * {
                        visibility:hidden;
                    }
                    #printSection, #printSection * {
                        visibility:visible;
                    }
                    #printSection {
                        position:absolute;
                        left:0;
                        top:0;
                    }
                }
            </style>
</head>

<body>

    <div class="modal fade" role="dialog" tabindex="-1" id="viewpayment">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="color:#007bff;">Payment Reciept</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body">
                    <form>
                        <div class="form-row">
                            <div id="recieptdetails" class="col">
                               
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer"><button class="btn btn-light" data-dismiss="modal" type="button">Close</button><button class="btn btn-primary" id="btn_print" type="button">Print</button></div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="makepayment">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><h1>Payment</h1></h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body">
                    <form action="http://192.168.1.84/LRS/assets/php/payment.php" style="width:100%;" method="post">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col">
                                <select required="" id="title" onchange="details()" name="titleid" class="form-control">
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
                                <div class="col"><select id="payment" name="payment" class="form-control float-left">
                                    <optgroup label="Type of Payment">
                                <option value="" selected="">Select Payment</option>
                                    <option value="rates">Land Rates</option>
                                    <option value="rent">Land Rent</option>
                                </optgroup>
                            </select></div>
                            </div>
                        </div>
                        </form>
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
                                                    
                                                        <div class="form-group"><input class="form-control" type="number" placeholder="Enter Card Number"></div>
                                                        <div class="form-group"><input class="form-control" type="number" placeholder="CVV"><label style="color:#999999;">The Last three digits at the back of your card</label></div>
                                                        <div class="form-group"><label>Expiration Date</label>
                                                            <div class="form-row">
                                                                <div class="col"><input class="form-control" type="date"></div>
                                                            </div>
                                                        </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                  
                </div>
                <div class="modal-footer">
                    <div class="row" style="width:100%;">
                        <div class="col-12"><button class="btn btn-primary float-right" onclick="pay()" style="width:72px;float:right;" type="button">Pay</button> 
                        
                        <button class="btn btn-danger active float-left" style="float:left;" data-dismiss="modal" type="button">Cancel</button>
                    </div>
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
                <li> <a  data-bs-hover-animate="pulse" style="background-color:rgba(255,255,255,0);color:#999999;" href="Dashboard-table.php">My Titles<br></a></li>
                <li> <a data-bs-hover-animate="pulse" href="Confirmation.php">Confirm Transfer</a></li>
                <li> <a  data-bs-hover-animate="pulse" href="Transfer.php">Transfer</a></li>
                <li> <a data-bs-hover-animate="pulse" href="Subdivide.php">Subdivide</a></li>
                <li> <a data-bs-hover-animate="pulse" href="Amalgamate.php">Amalgamate/Merge</a></li>
                <li> <a style="background-color:#333333;color:#ffffff;" data-bs-hover-animate="pulse" href="Payments.php">Payments</a></li>
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
                            <h2 style="color:rgb(0,123,255);">Payments</h2>
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
                <div class="row">
                    <div id="success" class="col-12"></div>
                        <hr>
                    
                </div>
                <div class="row">
                    <div class="col-8">
                        <form class="m-auto">
                            <div class="form-group m-auto">
                                <div class="form-row">
                                    <div class="col-4"><input class="form-control" id="search_payment" required="" onkeyup="search()" name="search_payment" type="search" placeholder="Search For a Payment"></div>
                                    <div class="col-1"><button onclick="searchbtn()" class="btn btn-primary">Search</button></div>
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
                                        <th>Title Number</th>
                                        <th>Description</th>
                                        <th>Amount(Ksh)</th>
                                        <th>Date of Payment</th>
                                        <th>Reciept</th>
                                    </tr>
                                </thead>
                                <tbody id="payments_table">
                                  
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
    <script>
$(document).ready(function() {
    loadpayments();
});
function pay(){
    var title=$('#title').val();
    var payment=$('#payment').val();

    if(title == ""){
        $("#title").css('border-color', "red");
    }
    
   else if(payment == ""){
    $("#title").css('border-color', "lightgrey");
        $("#payment").css('border-color', "red");
    }
    else{
        $("#title").css('border-color', "lightgrey");
        $("#payment").css('border-color', "lightgrey");
        $.ajax({    //create an ajax request to display.php
        type: "POST",
        url: "http://192.168.1.84/LRS/assets/php/payment.php",             
        dataType: "text",
        data:{title: title, payment: payment},   //expect html to be returned                
        success: function(response){ 
        loadpayments();
        $("#makepayment").modal("hide");
        $("#viewpayment").modal("hide");
        $('#success').html(response);
        $("#success-alert").show();
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
         $("#success-alert").slideUp(500);
             });
             }            
        })
    }
    
}
function loadpayments(){
    $.ajax({    //create an ajax request to display.php
        type: "POST",
        url: "http://192.168.1.84/LRS/assets/php/payment.php",             
        dataType: "text",   //expect html to be returned                
        success: function(response){ 
            $('#payments_table').html(response);
             }            
        })
}
function search(){
    $("#search_payment").css('border-color', "lightgrey");
    var search_payment=$('#search_payment').val();
        $.ajax({    //create an ajax request to display.php
        type: "POST",
        url: "http://192.168.1.84/LRS/assets/php/payment.php",             
        dataType: "text",
        data:{search: search_payment},   //expect html to be returned                
        success: function(response){ 
            $('#payments_table').html(response);
        }            
})  
} 
function searchbtn(){
    var search_payment=$('#search_payment').val();
    if(search_payment =="")
    {
        $("#search_payment").css('border-color', "red");
    }
    else{
        search();
    }
} 
var payment;
function details(payment){
        $.ajax({    //create an ajax request to display.php
        type: "POST",
        url: "http://192.168.1.84/LRS/assets/php/payment.php",             
        dataType: "text",
        data:{reciept: payment},   //expect html to be returned                
        success: function(response){ 
        $('#recieptdetails').html(response);
        $("#viewpayment").modal("show");
        }            
})  
} 
document.getElementById("btn_print").onclick = function () {
    printElement(document.getElementById("recieptdetails"));
}

function printElement(elem) {
    var domClone = elem.cloneNode(true);
    
    var $printSection = document.getElementById("printSection");
    
    if (!$printSection) {
        var $printSection = document.createElement("div");
        $printSection.id = "printSection";
        document.body.appendChild($printSection);
    }
    
    $printSection.innerHTML = "";
    $printSection.appendChild(domClone);
    window.print();
}

    </script>
</body>

</html>