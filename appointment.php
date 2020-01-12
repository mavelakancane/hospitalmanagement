<?php

//Doctors Id 9705305721086
include("connection.php");
include("session.php");

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



<center>

<h2>Confirmed Appointments</h2>

 <table width="100%" colspan = "2" border = "5" cellspacing = "3">
 
 <tr>
   <th>Appointment Date</th>
   <th>Time</th>
   <th>Urgency</th>
   <th>status</th>
   
 </tr>
 
 
 <tr>
    
	<?php
	

	     $date = "";
		  $time = "";
		  $urgency = "";
		  $status = "";
	
	$email = $_SESSION['email'];
	  $query = "SELECT a.* FROM appointment a,doctor d WHERE a.doctorId = d.id AND d.email = '$email' AND a.status = 'Approved'";
	  
	  $results = mysqli_query($conn,$query);
	  
	  while($row = mysqli_fetch_array($results))
	  {
		  $id = $row['id'];
		  $date = $row['date'];
		  $time = $row['time'];
		  $urgency = $row['urgency'];
		  $status = $row['status'];
		  
		  ?>
		  
	  <td><?php echo $date; ?></td>
	 <td><?php echo $time; ?></td>
	 <td><?php echo $urgency; ?></td>
	 <td><?php echo $status; ?></td>
	 
		  
		  <?php
	  }
	
	?>
	
 </tr>
 
 
 </table>





</center>



</div>



<body>



</html>