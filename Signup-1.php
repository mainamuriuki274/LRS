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
            <form style="width:100%;" method="post" action="http://localhost/LRS/assets/php/signup-1.php" enctype="multipart/form-data">
                <div class="form-group"><label><strong>National Identification Number</strong></label><input class="form-control" type="number" value="<?php echo $_SESSION['idnumber'];?>" placeholder="eg 1234567" name="idNumber" required=""></div>
                <div class="form-group"><label style="width:100%;"><strong>Attach Copy of&nbsp;National Identification Number</strong><br></label><input type="file" required=""  id="fileUpload" accept="image/png, image/jpeg, image/jpg" name="idPicture">
                <?php echo $_SESSION['idpicture'];?>     
                                        
            </div>
                <div class="form-group"><label><strong>Full names</strong><br></label><input class="form-control" type="text" placeholder="eg Apple Kiwi Grapes" autocomplete="on" value="<?php echo $_SESSION['fullnames'];?>" required="" name="fullNames"></div>
                <div class="form-group"><label><strong>Email Address</strong><br></label><input class="form-control" type="text" placeholder="e.g e****@***.***" inputmode="email" required="" value="<?php echo $_SESSION['email'];?>" name="emailAddress"></div>
                <div class="form-group"><label><strong>Mobile Number</strong><br></label><input class="form-control" type="number" placeholder="e.g 07******"  value="<?php echo $_SESSION['phonenumber'];?>"required="" name="mobileNumber"></div>
                <div class="form-group"><label><strong>Tax Identification Number</strong><br></label><input class="form-control" type="number" required="" value="<?php echo $_SESSION['taxnumber'];?>" name="taxNumber"></div>
                <div class="form-group"><label><strong>Physical Address</strong></label><input class="form-control" type="text" id="autocomplete_search" required="" value="<?php echo $_SESSION['address'];?>" name="physicalAddress"></div>
                <div class="form-group"><button class="btn btn-primary float-right" type="submit">Next</button><a class="btn btn-primary float-left" role="button">Back</a></div>
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