<?php
        include "header.php";
?>
<!doctype html>
<html>
<!-- <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" charset="utf-8" /> -->
 <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
<title>Update Record</title>
</head>

<body>
    <?php
    require('connect.php');
    
     $n=$_POST['ndata'];
     
     $query="select * from record where id=".$n;
    if($query_run=mysql_query($query))
    {
        while($query_row=mysql_fetch_assoc($query_run))
        {
            $location=$query_row['location'];
            $en=$query_row['en'];
        
        }
    }
?>

<div class="padd">
 <div class="login-page">
  <div class="form">
      <form class="login-form" method="POST" name="data"  onsubmit="return validation()" action="record.php">
      <center><h1>Update DATA</h1></center>
      <input type="text" placeholder="Enter Location" name="location" value='<?php echo $location ?>'/>
      <input type="text" placeholder="Enter Number" name="en" value='<?php echo $en ?>' /> 
      <button type="submit" class="button" name="submit">UPDATE</button>
      <button type="reset" class="button button2" name="reset">CLEAR</button><br>
        <input type="hidden" value="<?php echo $n ?>" name="idn" />
      <!-- <input type="submit" name="record" style="background: gray" > -->
  </form>
 </div>
</div>
</body>
</html>