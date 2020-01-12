<?php
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
<a href="patient.php" style="margin-left:560px;">Make Appointment</a>
<a href="details.php" >View Appointment</a>
<a href="logout.php" >logout</a>
<div class="container" >


<center>

<h2>Appointments</h2>

 <table width="100%" colspan = "2" border = "5" cellspacing = "3">
 
 <tr>
   <th>Appointment Date</th>
   <th>Time</th>
   <th>Urgency</th>
   <th>status</th>
   <th>Action</th>
 </tr>
 
 
 <tr>
    
	<?php
	
	     $date = "";
		  $time = "";
		  $urgency = "";
		  $status = "";
	
	$email = $_SESSION['email'];
	  $query = "SELECT a.* FROM appointment a, patient p WHERE p.id = a.patientId AND p.email = '$email'";
	  
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
	 <td><a href="cancel.php?id=<?php echo $id; ?>" >Cancel Appointment</a><br>
		  
		  <?php
	  }
	
	?>
	
 </tr>
 
 
 </table>





</center>



</div>



<body>



</html>