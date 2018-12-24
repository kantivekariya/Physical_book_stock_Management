<?php
error_reporting(0);
include "connect.php";
include "header.php";

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>View Record</title>
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" charset="utf-8" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<style type="text/css">
#record
{
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	width:100%;
	border-collapse:collapse;
}
#record td, #record th 
{
	font-size:1em;
	border:1px solid #98bf21;
	padding:3px 7px 2px 7px;
}
#record th 
{
	font-size:1.1em;
	text-align:left;
	padding-top:5px;
	padding-bottom:4px;
	background-color:#66C;
	color:#ffffff;
}
#record tr.alt td 
{
	color:#000000;
	background-color:#EAF2D3;
}
.scroll{
	 width: 100%;
    height: 100%;
    overflow: scroll;
}

</style>
</head>


<body>
<div class="padd">
	

	<div class="sea">
	<form method="POST">
		<input type="text" name="se_data">
		<input type="submit" name="search" value="search"><br><br>
		<!-- <input type="submit" name="view" value="View All Record"> -->
	</form>	
	</div>
		


<center>
<br><br>
 <table border="0" width="80%" id="record">
    	<tr> 
        	<th>ID</th>
            <th>Location</th>
			<th>Number</th>
            <th>Time</th>
            <th>Update</th>
			<th>Delete</th>
        </tr>
 
 <?php
		
		if(isset($_POST['search'])){
			$search_data=$_POST['se_data'];
 			$query="SELECT * FROM `record` WHERE `location`='$search_data' or `en`='$search_data'";
			if($query_run=mysql_query($query))
	{
		while($query_row=mysql_fetch_assoc($query_run))
		{
			echo "<tr><td>".$query_row['id']."</td>";
			echo "<td>".$query_row['location']."</td>";
			echo "<td>".$query_row['en']."</td>";
			echo "<td>".$query_row['time']."</td>";
			echo "<td><form action='update.php' method='post'><input type=submit value='Edit'><input type='hidden' value=".$query_row['id']." name='ndata'></form></td>";
			echo "<td><form action='record.php' method='post'><input type='submit' name='delete' value='Delete'><input type='hidden' value=".$query_row['id']." name='deletedata'></form></td></tr>";
		}
	}
		}else{

			$query="select * from record";
	if($query_run=mysql_query($query))
	{
		while($query_row=mysql_fetch_assoc($query_run))
		{
			echo "<tr><td>".$query_row['id']."</td>";
			echo "<td>".$query_row['location']."</td>";
			echo "<td>".$query_row['en']."</td>";
			echo "<td>".$query_row['time']."</td>";
			echo "<td><form action='update.php' method='post'><input type=submit value='Edit'><input type='hidden' value=".$query_row['id']." name='ndata'></form></td>";
			echo "<td><form action='record.php' method='post'><input type='submit' name='delete' value='Delete'><input type='hidden' value=".$query_row['id']." name='deletedata'></form></td></tr>";
		}
	}
		 }
	?>
 <?php
 
 if(isset($_POST['delete']))
	{
		$id=$_POST['deletedata'];
 		
		$result=mysql_query("delete from record where id='".$id."'");
		
		if($result)
		{
			echo"";
		}

		else
		{
			echo "No data delete..!";
		}
		
	}


 		

	if(isset($_POST['submit'])){
		$id=$_POST['idn'];
 	$location=$_POST['location'];
	$en=$_POST['en'];
	
	
	$queryupdate="UPDATE `record` SET `location`='".$location."',`en`='".$en."' WHERE `id`='".$id."'";
		
		if($query_runi=mysql_query($queryupdate))
		{			
			header("location:record.php");
			echo "Data Updated";
		}else{
			echo "No Data Update..!";
		}
	}


 ?>
 
</div>
</table>
</center>
</body>
</html>