<?php
include("connection.php");
include("session.php");

    $id = $_GET['id'];
	
	echo $id;
if(isset($_POST['save']))
{ 
	$date = mysqli_real_escape_string($conn,$_POST['date']);
	$time = mysqli_real_escape_string($conn,$_POST['time']);
	
	$today = strtotime(date("Y-m-d"));
	$date1 = strtotime($date);
	
	//$diff = $today - $date1;
	
	//echo ceil(abs(round($diff/86400)));
	
	if($date1 >= $today)
	{
		//echo $id;
		$upd = "UPDATE `appointment` SET `date`='$date',`time`='$time',`status`='Approved' WHERE `id`= $id";
		
		if(mysqli_query($conn,$upd))
		{
			header("location:appointment.php");
		}
	}
	else
	{
		//$msg = "This is a previous date";
		?>
		  <script>
		      alert('You cant enter the previous date');
			  window.location.href ="waiting.php";
		  </script>
		<?php
	}
}


?>

<html>

<head>
<title>Hospital Management</title>

<link rel = "stylesheet" type = "text/css"  href = "layout.css">




</head>

<body>

<a href="#" style="margin-left:900px;"><?php echo $_SESSION['email']; ?></a><br>
<br>
<br>
<a href="waiting.php" style="margin-left:560px;">Awaiting Appointment</a>
<a href="appointment.php" >Confirm Appointment</a>
<a href="logout.php" >logout</a>
<div class="container" >


<form class="form" method="post" action="change.php">

<center>

<h2>Make Appointmet</h2>

<div class="input-group">
</br>
<label>Appointment Date</label></br>
<input type="date" name="date" id ="date" maxlength="10">

</div>

<div class="input-group">
</br>
<label>Appointment Time</label></br>
<input type="time" name="time" id ="time" maxlength="10">

</div>




<div class="button">
<input type="submit" name="save" value="Change Appointment">
</div>


</center>
</form>


</div>



<body>



</html>