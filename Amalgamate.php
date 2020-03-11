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
                <li> <a data-bs-hover-animate="pulse" style="background-color:rgba(255,255,255,0);color:#999999;" href="Dashboard-table.php">My Titles<br></a></li>
                <li> <a data-bs-hover-animate="pulse" href="Confirmation.php">Confirm Transfer</a></li>
                <li> <a data-bs-hover-animate="pulse" href="Transfer.php">Transfer</a></li>
                <li> <a data-bs-hover-animate="pulse" href="Subdivide.php">Subdivide</a></li>
                <li> <a  style="background-color:#333333;color:#ffffff;" data-bs-hover-animate="pulse" href="Amalgamate.php">Amalgamate/Merge</a></li>
                <li> <a data-bs-hover-animate="pulse" href="Payments.php">Payments</a></li>
               <li> <a data-bs-hover-animate="pulse" href="Caution.php">Caution</a><li>
               <li> <a data-bs-hover-animate="pulse" href="LandSearch.php">Land Search</a></li>
               <li> <a data-bs-hover-animate="pulse"  href="RegisterLand.php">Register Land</a></li>
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
                <div class="row" style="height:75px;">
                    <div class="col-7 d-inline-flex">
                        <ol class="breadcrumb" style="background-color:rgba(255,255,255,0.2);">
                            <li class="breadcrumb-item"><a href="Dashboard.html"><span style="color:#007bff;">Dashboard</span></a></li>
                            <li class="breadcrumb-item"><a><span>Amalgamate/ Merge<br><br><br><br></span></a></li>
                        </ol>
                    </div>
                </div>
                <div class="row d-xl-flex m-auto justify-content-xl-center">
                <div class="col-12"><?php if(isset($_SESSION['AmalgamateSuccess'])){
                    echo $_SESSION['AmalgamateSuccess'];
                    unset($_SESSION['AmalgamateSuccess']);
                }?></div>
                    <div class="col-4 d-flex">
                  
                        <form method="post" action="http://192.168.1.84/LRS/assets/php/amalgamate.php" style="width:100%;">
                            <h1>Amalgamate/ Merge:</h1>
                            
                            <label>Title to Amalgamate/ Merge</label>
                            <div class="form-group">
                            
                                <div class="form-row">
                                <div class="col-10">           
                                        <select id="title"   class="form-control">
                                        <optgroup id="titles">
                                        <option value="" >Select Title</option>
                                          <?php
                                          $user=$_SESSION['user_id'];
                                          $sql="SELECT * FROM titles WHERE Title_ID= ANY (SELECT Title_ID FROM title_owners WHERE User_ID=".$user.")";
                                          $result=mysqli_query($mysqli,$sql);
                                          $count=mysqli_num_rows($result);
                                          if($count>0){
                                            while($row=mysqli_fetch_array($result)){
                                                    echo '<option id="title-'.$row['Title_ID'].'" value="'.$row['Title_ID'].'">'.$row['Title_Number'].'</option>';
                                            }
                                          }
                                          ?>
                                        </optgroup></select>
                                    </div>
                                    <div class="col-2"><div style="border-radius:19px;" onclick="details()" id="add_title_btn" class="btn btn-outline-primary float-right"><i class="fa fa-plus"></i></div>
                                    </div>
                            </div>
                                </div>
                    <div  class="form-group">
                        <div class="form-row">
                            <div class="col" style="width:100%;margin:0px;"><label class="col-form-label"><strong>Titles to be Merged:</strong></label></div>
                        </div>
                    </div>
                    <div id="merge_titles"  class="form-group">
                        
                    </div>
                    <div class="form-group"><label style="width:100%;">Surveyor's Number</label>
                                <div class="form-row">
                                    <div class="col-10"><input class="form-control" type="number" id="surveyor_number" name="surveyor_number" placeholder="Enter Surveyor's number"></div>
                                </div>
                            </div>
                    <div class="form-group">
                        <div class="form-row" style="margin: 0px;">
                            <div class="col-10" style="margin: 0px;padding: 0px;"><div class="btn btn-primary btn-block" onclick="merge()">Amalgamate/ Merge</div></div>
                        </div>
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
    <script>
$(document).ready(function() {
    $("#success-alert").show();
    $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
      $("#success-alert").slideUp(500);
    }); 
});
    var title_to_be_merged = $("#merge_titles");
    var add_title = $("#add_title_btn");
    var remove_title = $("#remove_title_btn"); 
    var max_fields = 10;
    var x = 1;
    
    var n = document.getElementById("title");
    var y = n.selectedIndex + 1;
    
   
    function details(){
    var titleid=$('#title').val();  
    var title=  $("#title option:selected").text();
    $("#title").css('border-color', "lightgrey"); 
    $("#surveyor_number").css('border-color', "lightgrey");
    
    if(titleid != ""){
        if(x < max_fields){
            n.remove(y);
            x++;
            $(title_to_be_merged).append('<div style="margin-top:10px;" class="form-row"><div class="col-10"><input class="form-control float-left"  type="text" disabled="" value="'+title+'" placeholder=""><input id="l" class="form-control float-left" name="title[]"  type="text" hidden=""  value="'+titleid+'"></div><div id="remove_title" class="col-2"><div style="border-radius:19px;" onclick="removeTitle()" id="remove_title_btn" class="btn btn-outline-danger float-right"><i class="fa fa-trash"></i></div></div></div>');
             
        }
        else{
            add_title.prop('disabled', true);
        }
    }
    else{
        add_title.prop('disabled', true);
    }
    
}
function removeTitle(){
 
        $('#remove_title').parent('div').remove();
        x--;
    }
function merge(){
    $("#title").css('border-color', "lightgrey"); 
    $("#surveyor_number").css('border-color', "lightgrey");  
    var surveyor=$('#surveyor_number').val();
    var titleid=$('#l').val(); 
    if(titleid==""){
        $("#title").css('border-color', "red"); 
    }
  else if(surveyor==""){
    $("#surveyor_number").css('border-color', "red");  
}
else{
    $("#password_confirm").modal("show");
}

}
</script>
</body>

</html>