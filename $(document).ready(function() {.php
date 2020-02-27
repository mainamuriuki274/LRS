$(document).ready(function() {
            $("#display").click(function() {                
            $.ajax({    //create an ajax request to display.php
            type: "GET",
            url: "display.php",             
            dataType: "html",   //expect html to be returned                
            success: function(response){                    
            $("#responsecontainer").html(response); 
            //alert(response);
            if(password != confirm_password) {
                        $("#confirm").css('border-color', "red");
                        }
                        else{
                        $("#confirm").css('border-color', "green");
                        document.getElementById("finishbtn").disabled = false;
                        }
            }
            });
            });
            });