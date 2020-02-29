<?php
$myStr = "254714308029";
$result = substr($myStr, 0, 4);
$result= $myStr-254000000000;
echo $result;
?>    <script>
$('#signup-1').submit(function() {
  var id =  $("#idError").val();
  var email =  $("#emailError").val();
  var phone =  $("#phoneError").val();
  var tax =  $("#taxError").val();
  if(id !="" && email !="" &&  phone !="" && tax !="") 
  {
    return false;
     alert(id);
     alert(email);
     alert(phone);
     alert(tax);
  
  }
  else{
      return true;
  }
  });
</script>