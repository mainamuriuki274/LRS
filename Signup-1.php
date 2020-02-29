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
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
 
</head>

<body style="width:100%;">
    <div class="row" style="width:100%;margin:0px;">
        <div class="col-12" style="margin-top:1%;">
            <div class="container">
                <ul class="progressbar">
                    <li class="active">Personal Details</li>
                    <li>Verification</li>
                    <li>Account Security</li>
                </ul>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="card-text"><strong>Account Holder's Information</strong></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="width:100%;margin:0px;">
        <div class="col"></div>
        <div class="col">
            <form name="signup-1" id="signup-1" style="width:100%;" method="post" action="http://192.168.1.84/LRS/assets/php/signup-1.php" enctype="multipart/form-data">
                <div class="form-group"><label><strong>National Identification Number</strong></label><input class="form-control" type="number" value="<?php  if (isset($_SESSION['idnumber'])){echo $_SESSION['idnumber'];}?>" minlength="7" maxlength="8" placeholder="eg 1234567" id="idnumber" min="0" name="idNumber" required="">
                <script type="text/javascript">
                            document.getElementById('idnumber').onkeyup=function(){
                            var id =  $("#idnumber").val();
                            $.ajax({    //create an ajax request to display.php
                            type: "POST",
                            url: "http://192.168.1.84/LRS/assets/php/validation/idvalidation.php",             
                            dataType: "text",
                            data:{idnumber: id},   //expect html to be returned                
                            success: function(response){   
                            if(response == "Success") {
                            $("#idnumber").css('border-color', "green");
                            $('#idError').html("");
                            }
                           /* else if(response == "Invalid ID Number"){
                            $("#idnumber").css('border-color', "red");
                            $('#idError').html("");

                            }*/   
                            else{
                            $("#idnumber").css('border-color', "red");
                            $('#idError').html(response);
                            }            
                            }
                            })
                            }
                    </script>
                 <p style="color:red;font-size:13px;" id="idError"></p>
                </div>
                <div class="form-group"><label style="width:100%;"><strong>Attach Copy of&nbsp;National Identification Number</strong><br></label><input type="file" required=""  id="fileUpload" accept="image/png, image/jpeg, image/jpg" name="idPicture">
               <?php   if (isset($_SESSION['idpicture'])){ echo $_SESSION['idpicture'];}?>     
                                        
            </div>
                <div class="form-group"><label><strong>Full names</strong><br></label><input class="form-control" type="text" placeholder="eg Apple Kiwi Grapes" autocomplete="on" value="<?php if (isset($_SESSION['fullnames'])){ echo $_SESSION['fullnames'];}?>" required="" name="fullNames"></div>
                <div class="form-group"><label><strong>Email Address</strong><br></label><input class="form-control" type="text" placeholder="e.g e****@***.***" inputmode="email" required="" value="<?php if (isset($_SESSION['email'])){echo $_SESSION['email'];}?>" id="email" name="emailAddress">
                    <script type="text/javascript">
                            document.getElementById('email').onkeyup=function(){
                            var email =  $("#email").val();
                            $.ajax({    //create an ajax request to display.php
                            type: "POST",
                            url: "http://192.168.1.84/LRS/assets/php/validation/emailvalidation.php",             
                            dataType: "text",
                            data:{emailAddress: email},   //expect html to be returned                
                            success: function(response){   
                            if(response == "Success") {
                            $("#email").css('border-color', "green");
                            $('#emailError').html("");
                            }
                            /*
                            else if(response == "Invalid Email"){
                            $("#email").css('border-color', "red");
                            $('#emailError').html("");
                            } */  
                            else{
                            $("#email").css('border-color', "red");
                            $('#emailError').html(response);
                            }            
                            }
                            })
                            }
                    </script>
                <p style="color:red;font-size:13px;" id="emailError"></p>
                </div>
                <div class="form-group"><label><strong>Mobile Number</strong><br></label><input class="form-control" type="number" placeholder="e.g 07******" id="phonenumber"  maxlength="10"  minlength="10" min="0"   value="<?php if (isset($_SESSION['phonenumber'])){echo $_SESSION['phonenumber'];}?>"required="" name="mobileNumber">
                <script type="text/javascript">
                            document.getElementById('phonenumber').onkeyup=function(){
                            var phone =  $("#phonenumber").val();
                            $.ajax({    //create an ajax request to display.php
                            type: "POST",
                            url: "http://192.168.1.84/LRS/assets/php/validation/phonevalidation.php",             
                            dataType: "text",
                            data:{phonenumber: phone},   //expect html to be returned                
                            success: function(response){   
                            if(response == "Success") {
                            $("#phonenumber").css('border-color', "green");
                            $('#phoneError').html("");
                            }
                            /*
                            else if(response == "Invalid Phonenumber"){
                            $("#phonenumber").css('border-color', "red");
                            $('#phoneError').html("");
                            }   */
                            else{
                            $("#phonenumber").css('border-color', "red");
                            $('#phoneError').html(response);
                            }            
                            }
                            })
                            }
                    </script>
                <p style="color:red;font-size:13px;" id="phoneError"></p>
                </div>
                <div class="form-group"><label><strong>Tax Identification Number</strong><br></label><input class="form-control" type="number" min="0" required="" id="taxnumber" value="<?php if (isset($_SESSION['taxnumber'])){echo $_SESSION['taxnumber'];}?>"  name="taxNumber">
                <script type="text/javascript">
                            document.getElementById('taxnumber').onkeyup=function(){
                            var tax =  $("#taxnumber").val();
                            $.ajax({    //create an ajax request to display.php
                            type: "POST",
                            url: "http://192.168.1.84/LRS/assets/php/validation/taxvalidation.php",             
                            dataType: "text",
                            data:{taxnumber: tax},   //expect html to be returned                
                            success: function(response){   
                            if(response == "Success") {
                            $("#taxnumber").css('border-color', "green");
                            $('#taxError').html("");
                            }
                            /*
                            else if(response == "Invalid Tax Number"){
                            $("#taxnumber").css('border-color', "red");
                            $('#taxError').html("");
                            } */  
                            else{
                            $("#taxnumber").css('border-color', "red");
                            $('#taxError').html(response);
                            }            
                            }
                            })
                            }
                    </script>
                <p style="color:red;font-size:13px;" id="taxError"></p>
                </div>
                <div class="form-group"><label><strong>Physical Address</strong></label><input class="form-control" type="text" id="autocomplete_search" required="" id="address" value="<?php if (isset($_SESSION['address'])){ echo $_SESSION['address'];}?>" name="physicalAddress">
             
               
              </div>
                <div class="form-group"><button id="next" class="btn btn-primary float-right" type="submit">Next</button>
                <script>
  $('#signup-1').submit(function() {
    var id =  $("#idError").text();
  var email =  $("#emailError").text();
  var phone =  $("#phoneError").text();
  var tax =  $("#taxError").text();
  if(id !="" && email !="" &&  phone !="" && tax !="") 
  {
   
     alert(id);
     alert(email);
     alert(phone);
     alert(tax);
     return false;
  
  }
  else{
     return true;
  }
});
</script>
               
                
                <a href="http://192.168.1.84/LRS/" style="text-color:white;" class="btn btn-primary float-left" role="button">Back</a></div>
            </form>
        </div>
        <div class="col"></div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&amp;key=AIzaSyCINp2qQyx0FwFLgdKgF9ThIBYsNjTJ9ck"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>