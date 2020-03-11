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
                <li> <a data-bs-hover-animate="pulse" style="background-color:rgba(255,255,255,0);color:#999999;" href="Dashboard-table.php">My Titles<br></a></li>
                <li> <a data-bs-hover-animate="pulse" href="Confirmation.php">Confirm Transfer</a></li>
                <li> <a data-bs-hover-animate="pulse" href="Transfer.php">Transfer</a></li>
                <li> <a data-bs-hover-animate="pulse" href="Subdivide.php">Subdivide</a></li>
                <li> <a data-bs-hover-animate="pulse" href="Amalgamate.php">Amalgamate/Merge</a></li>
                <li> <a data-bs-hover-animate="pulse" href="Payments.php">Payments</a></li>
               <li> <a data-bs-hover-animate="pulse" href="Caution.php">Caution</a><li>
               <li> <a data-bs-hover-animate="pulse" href="LandSearch.php">Land Search</a></li>
               <li> <a style="background-color:#333333;color:#ffffff;" data-bs-hover-animate="pulse"  href="RegisterLand.php">Register Land</a></li>
            </ul>
        </div>
        <div class="page-content-wrapper">
            <div class="container-fluid">
                <nav class="navbar navbar-light navbar-expand-md" style="padding:0px;padding-bottom:0px;padding-top:0p;">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">
                            <h2 style="color:rgb(0,123,255);">Register Land</h2>
                        </a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navcol-1">
                            <ul class="nav navbar-nav" style="width:80%;"></ul>
                            <ul class="nav navbar-nav float-right" style="width:30%;">
                                <li class="dropdown nav-item float-right"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" style="width:170px;" href="#"><strong>Welcome, Lewis</strong></a>
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
                    <div class="col-8">
                        <form class="m-auto">
                            <div class="form-group m-auto">
                                <div class="form-row">
                                    <div class="col-4"><input class="form-control" type="search" placeholder="Search for Land"></div>
                                    <div class="col-1"><a class="btn btn-primary" role="button" href="LandSearch-1.html"><i class="fa fa-search"></i></a></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-4"><button class="btn btn-primary float-right" id="register_btn" onclick="addLand()" style="margin-bottom:20px;" type="button">Add Land</button></div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="table-responsive">
                        <form action="http://192.168.1.84/LRS/assets/php/upload_all_titles.php" method="POST">
                            <table id="Table1" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Title Number</th>
                                        <th>Plot Number</th>
                                        <th>Approximate Area</th>
                                        <th>County</th>
                                        <th class="text-center center-block" style="background-color: rgba(255,255,255,0.2);">View Land Details</th>
                                        <th class="text-center" style="background-color: rgba(255,255,255,0.2);">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="titles_table">
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col"><input id="submit_btn" type="submit" class="btn btn-primary float-right" value="Submit All"/><div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End: Sidebar Menu -->
    <div class="modal fade" role="dialog" tabindex="-1" id="registerland" style="background-color: rgba(76,44,142,0.04);">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: rgba(0,0,0,0.94);">
                    <h4 class="modal-title" style="color:white;">Land Registration</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body" style="background-color: rgba(0,0,255,0.06);">
                    <form onsubmit="addTitles()">
                        <div class="card">
                            <div class="card-body" style="background-color: #ffffff;">
                                <h5 style="color: #007bff;">Land Details</h5>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group"><label style="margin-bottom:0px;">Plot number</label><input id="plotnumber" name="plotnumber" required="" class="form-control flex-wrap" type="text" placeholder="Plot number"></div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group"><label>Title deed Number</label><input class="form-control flex-wrap" id="titlenumber" name="titlenumber" required="" type="text" placeholder="Title deed number"></div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group"><label>Approximate size</label><input class="form-control flex-wrap" type="number" id="approximatearea" required="" name="approximatearea" placeholder="Approximate size"></div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group"><label>County</label><select id="county" name="county" class="form-control"><optgroup label="Counties"><option value="Mombasa">Mombasa</option><option value="Nairobi">Nairobi</option><option value="Kiambu">Kiambu</option></optgroup></select></div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group"><label>Sub county</label><select id="subcounty"  name="subcounty" class="form-control"><optgroup label="Sub-counties"><option value="Changamwe">Changamwe</option><option value="Kisauni">Kisauni</option><option value="Jomvu">Jomvu</option></optgroup></select></div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group"><label>Location</label><select id="ward"  name="ward" class="form-control"><optgroup label="Location"><option value="Kipevu">Kipevu</option><option value="Diani">Diani</option><option value="Likoni">Likoni</option></optgroup></select></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card" style="margin-top: 16px;">
                            <div class="card-body" style="background-color: #ffffff;">
                                <h5 style="color: #007bff;">Owner Details</h5>
                                <div class="form-row">
                                    <div class="col-4">
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label style="margin-bottom:0px;">Type of Ownership</label><select id="ownership" onchange="userDetails()" class="form-control" style="margin-top: 6px;"><optgroup label="Type of Ownership"><option value="1" selected="">Sole Ownership</option><option value="2">Partnership</option></optgroup></select></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-8"></div>
                                </div>
                                <div id="ownerDetails" class="form-row">
                                    <div class="col-3" style="margin-left: 16px;">
                                        <div class="form-group"><label>ID Number</label><input id="id" onkeyup="verifyid()" class="form-control flex-wrap" min="0" maxlength="10"  type="number"></div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group"><label>Phone number</label><input id="phone" onkeyup="verifyphone()"  class="form-control flex-wrap" min="0" maxlength="10" type="number"></div>
                                    </div>
                                    <div class="col-2"><button onclick="addUser()" id="add_btn" class="btn btn-outline-primary" type="button" style="border-radius: 19px;margin-top: 30px;"><i class="fa fa-plus"></i></button></div>
                                    <div class="col-3"></div>
                                </div>
                                <div id="ownerDetails" class="form-row">
                                    <div class="col-2" style="margin-left: 16px;">
                                        <div class="form-group"><p style="color:red;font-size:13px;" id="idError"></p></div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group"><p style="color:red;font-size:13px;" id="phoneError"></p></div>
                                    </div>
                                    <div class="col-2"></div>
                                    <div class="col-3"></div>
                                </div>
                                
                                <div id="owner_details"></div>
                              
                                <div style="display:none;" id="owner"  class="form-row">
                                <div class="col-12">
                                        <h6 style="color: rgba(0,123,255,0.67);">Owners</h6>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <div class="row" style="width: 100%;">
                        <div class="col"><div  data-dismiss="modal" class="btn btn-danger float-left" type="button">Cancel</div></div>
                        <div class="col"><input  class="btn btn-primary float-right" type="submit" value="Add"/></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&amp;key=AIzaSyCINp2qQyx0FwFLgdKgF9ThIBYsNjTJ9ck"></script>
    <script src="assets/js/script.min.js"></script>
    <script>
     var x=1;
           $(document).ready(function() {
            loadTitles();
            $("#ownerDetails").css('display', "none"); 
            $("#owners").css('display', "none"); 
            $('#add_btn').prop('disabled', true);
            $('#submit_btn').prop('disabled', true);
            //$("#submit_btn").css('display', "none"); 
        
});
    function addLand(){
    $("#registerland").modal("show");
}
function userDetails(){
    var owner=$('#ownership').val();
    if(owner == 1){
    $("#ownerDetails").css('display', "none"); 
    }
    else{
    $("#ownerDetails").css('display', "inline-flex"); 
  
    }
}

function addUser(){
    $("#id").css('border-color', "lightgrey"); 
    $("#phone").css('border-color', "lightgrey"); 
    var id=$('#id').val(); 
    var phone=$('#phone').val(); 
    var phoneError=$('#phoneError').val(); 
    var idError=$('#idError').val(); 
    if(idError != "" && phoneError !=""){
        $("#id").css('border-color', "red");
        $("#phone").css('border-color', "red");
    }
    else{
      
       
        if(x < 4){
            x++;
            $('#owner').append('<div class="col-12"><div id="owners_data" class="form-row"><div class="col-3" style="margin-left: 16px;"><div class="form-group"><label>ID Number</label><input class="form-control flex-wrap" type="text" name="owners_id[]" value='+id+' disabled=""></div></div><div class="col-3"><div class="form-group"><label>Phone number</label><input class="form-control flex-wrap" type="number" name="owners_phone[]" value='+phone+' disabled=""></div></div><div  class="col-2"><button class="btn btn-outline-danger" onclick="removeUser()" type="button" style="border-radius: 19px;margin-top: 30px;"><i class="fa fa-trash-o"></i></button></div><div class="col-3"></div></div></div>');
            $("#owner").css('display', "inline-flex");  
            $('#phone').val(""); 
            $('#id').val(""); 
            $('#add_btn').prop('disabled', true);
        }
        else{
            $('#add_btn').prop('disabled', true);
        }
    }
    
}
function removeUser(){

$('#owners_data').parent('div').remove();
x--;
}
function verifyid(){
    var idnumber=$('#id').val();
$.ajax({    //create an ajax request to display.php
        type: "POST",
        url: "http://192.168.1.84/LRS/assets/php/verification/verification.php",             
        dataType: "text",
        data:{idnumber: idnumber},   //expect html to be returned                
        success: function(response){ 
        if(response == "   Success") {
        $("#id").css('border-color', "green");
        $('#idError').html("");
        }
        /*
        else if(response == "Invalid Tax Number"){
        $("#taxnumber").css('border-color', "red");
        $('#taxError').html("");
        } */  
        else{
        $("#id").css('border-color', "red");
        $('#idError').html(response);
        }            
        }
})
}

function verifyphone(){
    var phonenumber=$('#phone').val();
    var idnumber=$('#id').val();
$.ajax({    //create an ajax request to display.php
        type: "POST",
        url: "http://192.168.1.84/LRS/assets/php/verification/verification.php",             
        dataType: "text",
        data:{phonenumber: phonenumber,id_number: idnumber},   //expect html to be returned                
        success: function(response){ 
        if(response == "   Success") {
        $("#phone").css('border-color', "green");
        $('#phoneError').html("");
        $('#add_btn').prop('disabled', false);
        }
        /*
        else if(response == "Invalid Tax Number"){
        $("#taxnumber").css('border-color', "red");
        $('#taxError').html("");
        } */  
        else{
        $("#phone").css('border-color', "red");
        $('#phoneError').html(response);
        }            
        }
})
}
var id;
function viewdetails(id){
        $.ajax({    //create an ajax request to display.php
        type: "POST",
        url: "http://192.168.1.84/LRS/assets/php/upload_title_details.php",             
        dataType: "text",
        data:{title: id},   //expect html to be returned                
        success: function(response){ 
        $('#titledetails').html(response);
        $("#landdetails").modal("show");
        }            
})  
}
var id;
function deleteDetails(id){
        $.ajax({    //create an ajax request to display.php
        type: "POST",
        url: "http://192.168.1.84/LRS/assets/php/upload_title_details.php",             
        dataType: "text",
        data:{delete_title: id},   //expect html to be returned                
        success: function(response){ 
            loadTitles();
        }            
})  
}
function loadTitles(){
 
        $.ajax({    //create an ajax request to display.php
        type: "POST",
        url: "http://192.168.1.84/LRS/assets/php/upload_title_details.php",             
        dataType: "text",    
        success: function(response){ 
            $('#titles_table').html(response);
            var isEmpty = document.querySelectorAll("#Table1 tr").length;
            console.log(isEmpty);
            //alert(isEmpty);
            if(isEmpty > 1){
                $('#submit_btn').prop('disabled', false);
            }
            else{
                $('#submit_btn').prop('disabled', true);
            }

        }            
})  
}


function addTitles(){
    var titlenumber=$('#titlenumber').val(); 
    var plotnumber=$('#plotnumber').val(); 
    var approximatearea=$('#approximatearea').val(); 
    var county=$('#county').val(); 
    var subcounty=$('#subcounty').val(); 
    var ward=$('#ward').val(); 

 $.ajax({    //create an ajax request to display.php
 type: "POST",
 url: "http://192.168.1.84/LRS/assets/php/upload_title.php",             
 dataType: "text", 
 data:{titlenumber: titlenumber,plotnumber: plotnumber,approximatearea: approximatearea,county: county,subcounty: subcounty,ward: ward},   
 success: function(response){ 
    loadTitles();

 }            
})  
}
    </script>
</body>

</html>