<?php
  include "header.php";
  error_reporting(0);
  include "connect.php";
  

  if(isset($_POST['record']))
  {
    header("Location:record.php");
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
  <title>Insert Data</title>
  <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/fade-mess.css" media="screen" charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript">
    function validation() {
    var x = document.forms["data"]["location"].value;
    var y = document.forms["data"]["en"].value;
    if (x == "") {
        alert("Location must be filled out");
        return false;
    }else if(y==""){
       alert("Number must be filled out");
        return false;
    }
}
    
</script>
</head>
<body>
   <?php
  
  if(isset($_POST['submit']))
  {
    $location=$_POST['location'];
    $en=$_POST['en'];

   
      $insert=mysql_query("insert into record(location,en,time) values('$location','$en',NOW())");

    
   if(!$insert) {
                echo "<script>setTimeout(function(){alert('Data already exists').hide();}, 100);</script>";
    }
    else{
           // $insert=mysql_query("insert into record(location,en,time) values('$location','$en',NOW())");
           // if($insert){
           //     $message="Inserted Success!!!";
                  echo "<script>setTimeout(function(){alert('Data Inserted').hide();}, 100);</script>";
      
    }

  }
  ?>
  <div class="login-page">
  <div class="form">
      <form class="login-form" method="POST" name="data"  onsubmit="return validation()">
      <center><h1>INSERT DATA</h1></center>
      <input type="text" placeholder="Enter Location" name="location" />
      <input type="text" placeholder="Enter Number" name="en" /> 
      <button type="submit" class="button" name="submit">INSERT</button>
      <button type="reset" class="button button2" name="reset">CLEAR</button><br>
     
      <!-- <input type="submit" name="record" style="background: gray" > -->
  </form>
     <form class="login-form" method="POST">
       <button class="button button3" name="record">View Rrecord</button>

     </form>
  </div>
</div>
<div class="alert">
<a class="close" data-dismiss="alert"><i class="icon-remove"></i></a>

  <strong>
    <br><br><?php
       if(isset($_POST['submit'])){
        // print_r($query);
        //   $result=mysqli_num_rows($query);
        //   print_r($result);
       }
  ?></strong>
</div>
</body>
</html>