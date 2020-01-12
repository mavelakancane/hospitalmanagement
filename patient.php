<?php

include("connection.php");
include("session.php");

//Doctors Id 9705305721086

if(isset($_POST['save']))
{
	
	$email = $_SESSION['email'];
	$date = mysqli_real_escape_string($conn,$_POST['date']);
	$time = mysqli_real_escape_string($conn,$_POST['time']);
	$urgency = mysqli_real_escape_string($conn,$_POST['urgency']);
	$docId = 9705305721086;
	
	$patient = "";
	
	$sql = "SELECT `id` FROM `patient` WHERE `email` = '$email'";
	
	$query = mysqli_query($conn,$sql);
	
	while($row = mysqli_fetch_array($query))
	{
		$patient = $row['id'];
	}
	
	$book = "INSERT INTO `appointment`(`date`, `time`, `urgency`, `status`, `patientId`, `doctorId`) 
	VALUES('$date','$time','$urgency','Awaiting',$patient,$docId) ";
	
	if(mysqli_query($conn,$book))
	{
		header("location:details.php");
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
<a href="patient.php" style="margin-left:560px;">Make Appointment</a>
<a href="details.php" >View Appointment</a>
<a href="logout.php" >logout</a>
<div class="container" >


<form class="form" method="post" action="patient.php">

<center>

<h2>Make Appointment</h2>

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


<div class="input-group">
<label>Emergency</label></br>

<select name="urgency">
<option value="High">High</option>
<option value="Normal">Normal</option>

</select>

</div>



<div class="button">
<input type="submit" name="save" value="Make Appointment">
</div>


</center>
</form>


</div>



<body>



</html>