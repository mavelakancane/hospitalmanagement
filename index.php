<?php

include("connection.php");
include("session.php");

$msg = "";

if(isset($_POST['Login']))
{
	
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$password = mysqli_real_escape_string($conn,$_POST['pass']);
	
	 if(empty($email) || empty($password) )
	 {
		$msg = "All fields are required!"; 
	 }	 
	 else
	 {
		     $sql  = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
			 
			 $query = mysqli_query($conn,$sql);
			 
			 $count = mysqli_num_rows($query);
			 
			 if($count > 0)
			 {
				 $role = "";
				 $select = "SELECT * FROM user WHERE email = '$email'";
				 
				 $output = mysqli_query($conn,$select);
				 
				 while($row = mysqli_fetch_array($output))
				 {
					$role = $row['role']; 
				 }
				 
				 
				 if($role == "patient")
				 {
					$_SESSION['email']= $email;
				 
				     header("location:patient.php"); 
				 }
				  else
				  {
					  $_SESSION['email']= $email;
				 
				     header("location:appointment.php");
				  }
				 
			 }
			 else{
				 
				 $msg = "Username OR Password does not exists";
			 }
			 
	 }	 
		 
	 }

?>

<! DOCTYPE html>

<html>

<head>

<link rel="stylesheet" href="loginstyle.css" media="screen" type="text/css" />

<link rel="stylesheet" type="text/css" href="login.css">
<link rel="icon" type="image/png" href="table/images/icons/favicon.ico"/>


</style>

 <title>Hospital Management</title>


</head>


<body>

  

<div id="login">
  <div id="triangle"></div>

<!-- <div id="id100"  class = "modal" -->
<form  method="post" action = "#">

<div class= "image">

 <img src = "beep.jpg" alt = "avatar" class = "avatar">


</div>


<div id = "frm">
    <form action = "index.php" method = "POST">
	<div class="error"><?php echo $msg ?></div>
 
      <p>
        
        <input type="text" placeholder="email" id = "email" name = "email" />
      </p>
      <p>
        <input type="password" placeholder="Password" id = "pass" name = "pass" />
      </p>
      <p>
        <input type="submit" id = "btn" name = "Login" value = "Login"/>
      </p>
</form>
<a href ="register.php">Not a user?Register!</a>

</div>
	
<br>

<!-- <span href="register.php" class="button" id="toggle-login">Forgot Password</span> -->


</body>

</html>
