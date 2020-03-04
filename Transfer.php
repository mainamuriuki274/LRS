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
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
</head>

<body>
    <div class="modal fade" role="dialog" tabindex="-1" id="landdetails">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Land Details</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div  class="modal-body">
                    <form id="titledetails">
</form>
                </div>
                <div class="modal-footer"><button class="btn btn-light" data-dismiss="modal" type="button">Close</button></div>
            </div>
        </div>
    </div>

    <!-- Start: Sidebar Menu -->
    <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav" style="margin-right:0px;height:100%;">
                <li class="sidebar-brand" style="height:15%;"> <a class="text-monospace" style="height:100%;background-color:#000000;padding-top:14%;color:#dfe7f1;" href="Dashboard.html">Land Registry System</a></li>
                <li> <a data-bs-hover-animate="pulse" style="background-color:rgba(255,255,255,0);color:#999999;" href="Dashboard.html">My Titles<br></a></li>
                <li> <a data-bs-hover-animate="pulse" style="color:#ffffff;background-color:#333333;" href="Transfer.html">Transfer</a></li>
                <li> <a data-bs-hover-animate="pulse" href="Subdivide.html">Subdivide</a></li>
                <li> <a data-bs-hover-animate="pulse" href="Amalgamate.html">Amalgamate/Merge</a></li>
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
                            <h2 style="color:rgb(0,123,255);">Transfer</h2>
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
                <div class="row" style="height:60px;">
                    <div class="col-12 d-inline-flex">
                        <ol class="breadcrumb" style="background-color:rgba(255,255,255,0.2);">
                            <li class="breadcrumb-item"><a href="Dashboard.html"><span style="color:#007bff;">Transfer</span></a></li>
                            <li class="breadcrumb-item"><a><span>Transfer<br><br><br><br></span></a></li>
                        </ol>
                    </div>
                </div>
                
                    <div class="form-row m-auto">

                        <div class="col-12"><?php if(isset($_SESSION['TransferSuccess'])){
                    echo $_SESSION['TransferSuccess'];
                    unset($_SESSION['TransferSuccess']);
                }?></div>
                      <div class="col-2"></div>
                        <div class="col-3 min-width:300px"><img class="img-fluid" src="assets/img/title.png">
                        <button  class="btn btn-outline-primary btn-block" id="details" data-toggle="modal" data-target="#landdetails" style="margin-left:auto;margin-right:auto;margin-top:26px;">Details</button></div>
                        <div class="col-4 min-width:300px" id="titledetails">
                        <form action="http://192.168.1.84/LRS/assets/php/transfer.php" method="POST">
                            <div class="form-row" style="background-color:rgba(255,255,255,0.2);max-width:600px;">
                                <div class="col" style="margin-top:10px;min-width:300px">
                                <h4 style="color:red;" id="Error"></h4>
                                    <h1>Transfer to:</h1>
                                    <div class="form-group"><label>ID/ Passport Number&nbsp;</label>
                                    <input required="" id="idnumber"  min="0" name="idnumber" onkeyup="verifyid()" class="form-control" type="number">
                                    <p style="color:red;font-size:13px;" id="idError"></p>
                                </div>
                                    <div class="form-group"><label>Phonenumber</label><input required="" id="phonenumber" onkeyup="verifyphone()"  min="0"  name="phonenumber" class="form-control" type="number">
                                    <p style="color:red;font-size:13px;" id="phoneError"></p></div>
                                    <div class="form-group">
                                    <label>Title to Transfer</label>
                                        <select id="title" onchange="details()" name="titlenumber" class="form-control">
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
                                    <h1>Lawyer Details:</h1>
                                    <div class="form-group"><label>Lawyer ID/ Passport Number&nbsp;</label><input required=""  min="0"  id="lawyer_id" name="lawyer_id" class="form-control" type="number"></div>
                                    <div class="form-group"><label>Lawyer Practice Number</label><input required="" name="practice_number"  min="0"  id="practice_number" class="form-control" type="number"></div>
                                    <div class="btn btn-primary btn-block" onclick="verify()" id="transfer_btn">Transfer</div>  
                                            
                                        <div class="modal fade" role="dialog" tabindex="-1" id="password_confirm">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Password Verification</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                                <div class="modal-body">
                                                    <input class="form-control" name="password" required="" type="password" placeholder="Password">
                                                </div>
                                                <div class="modal-footer"><button class="btn btn-danger" data-dismiss="modal" type="button">Cancel</button>
                                                <input type="submit" id="pass" class="btn btn-primary" value="Confirm"/></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3"></div>
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
<script>
$(document).ready(function() {
  $("#success-alert").show();
    $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
      $("#success-alert").slideUp(500);
    });
});
function details(){
    var title=$('#title').val();
    if(title != ""){
        $("#title").css('border-color', "green");
        $.ajax({    //create an ajax request to display.php
        type: "POST",
        url: "http://192.168.1.84/LRS/assets/php/title_details.php",             
        dataType: "text",
        data:{title: title},   //expect html to be returned                
        success: function(response){ 
        $('#titledetails').html(response);
        }            
})
    }
    else{
        $("#title").css('border-color', "red"); 
    }
    
}

function verifyid(){
    var idnumber=$('#idnumber').val();
$.ajax({    //create an ajax request to display.php
        type: "POST",
        url: "http://192.168.1.84/LRS/assets/php/verification/verification.php",             
        dataType: "text",
        data:{idnumber: idnumber},   //expect html to be returned                
        success: function(response){ 
        if(response == "   Success") {
        $("#idnumber").css('border-color', "green");
        $('#idError').html("");
        }
        /*
        else if(response == "Invalid Tax Number"){
        $("#taxnumber").css('border-color', "red");
        $('#taxError').html("");
        } */  
        else{
        $("#idnumber").css('border-color', "red");
        $('#idError').html(response);
        }            
        }
})
}

function verifyphone(){
    var phonenumber=$('#phonenumber').val();
    var idnumber=$('#idnumber').val();
$.ajax({    //create an ajax request to display.php
        type: "POST",
        url: "http://192.168.1.84/LRS/assets/php/verification/verification.php",             
        dataType: "text",
        data:{phonenumber: phonenumber,id_number: idnumber},   //expect html to be returned                
        success: function(response){ 
        if(response == "   Success") {
        $("#phonenumber").css('border-color', "green");
        $('#phoneError').html("");
        }
        /*
        else if(response == "Invalid Tax Number"){
        $("#taxnumber").css('border-color', "red");
        $('#taxError').html("");
        } */  
        else{
        $("#phonenumber").css('border-color', "red");
        $('#phoneError').html(response);
        }            
        }
})
}
function verify()
{
var idnumber=$('#idnumber').val();
var phonenumber=$('#phonenumber').val();
var lawyer_id=$('#lawyer_id').val();
var lawyer_number=$('#practice_number').val();
var phone =  $("#phoneError").text();
var id =  $("#idError").text();
var title=$('#title').val();
if(idnumber != "" && phonenumber != "" && title != "" && lawyer_id != ""  && lawyer_number != "" && phone == "" && id == ""){
    $('#Error').html("");
    $("#idnumber").css('border-color', "lightgrey");
    $("#phonenumber").css('border-color', "lightgrey");
    $("#lawyer_id").css('border-color', "lightgrey");
    $("#practice_number").css('border-color', "lightgrey");
    $("#password_confirm").modal("show");
}
else{
    if(idnumber == "" ){
        $("#idnumber").css('border-color', "red");
    }
    else if(phonenumber == "" ){
        $("#phonenumber").css('border-color', "red");
    }
    else if(title == "" ){
        $("#title").css('border-color', "red");
    }
    else if(lawyer_id == "" ){
        $("#lawyer_id").css('border-color', "red");
    }
    else if(lawyer_number == "" ){
        $("#practice_number").css('border-color', "red");
    }
    $('#Error').html("Please fill out ALL the fields first and Ensure you have put the right information");
}

}                                    
</script>
  

</body>

</html>