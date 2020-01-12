<?php
include("connection.php");
include("session.php");

$msg = "";

if(isset($_POST['register']))
{
   $email = mysqli_real_escape_string($conn,$_POST['email']);	
   $pass1 = mysqli_real_escape_string($conn,$_POST['pass1']);
   $pass2 = mysqli_real_escape_string($conn,$_POST['pass2']);
   $name = mysqli_real_escape_string($conn,$_POST['name']);
   $surname = mysqli_real_escape_string($conn,$_POST['surname']);
   $id = mysqli_real_escape_string($conn,$_POST['id']);
   $phone = mysqli_real_escape_string($conn,$_POST['phone']);
   
   if(!empty($email) || !empty($pass1) || !empty($pass2) || !empty($name) || !empty($surname) || !empty($id) || !empty($phone))
   {
	   if(filter_var($email,FILTER_VALIDATE_EMAIL))
	   {
		   if(!preg_match("/^[a-zA-Z] *$/",$name))
		   {
			   if(!preg_match("/^[a-zA-Z] *$/",$surname))
			   {
				   if(strlen($name) >= 3)
				   { 
			         
					 if(strlen($name) >= 3)
					 {
						if(is_numeric($id))
						{
							if(strlen($id) == 13)
							{
								if(strlen($phone) == 10)
								{
									if(is_numeric($phone))
									{
										if($pass1 == $pass2)
										{
											
											$sql1 = "SELECT * FROM user WHERE email = '$email'";
											
											$results = mysqli_query($conn,$sql1);
											
											$count = mysqli_num_rows($results);
											
											if($count == 0)
											{
												$sql2 = "SELECT * FROM patient WHERE id = $id";
												
												$results1 = mysqli_query($conn,$sql2);
												
												$count1 = mysqli_num_rows($results1);
												
												if($count1 == 0)
												{
													// $pass1 = md5($pass1);
													$query = "INSERT INTO user(`email`, `password`, `role`) VALUES('$email','$pass1','patient')";
													
													if(mysqli_query($conn,$query))
													{
														$query1 = "INSERT INTO `patient`(`id`, `name`, `surname`, `phone`, `email`) VALUES($id,'$name','$surname',$phone,'$email')";
														
														if(mysqli_query($conn,$query1))
														{
															$_SESSION['email'] = $email;
															
															header("location:patient.php");
														}
														else
														{
															$msg = "Failed to insert data";
														}
													}
													else
													{
														$msg = "Failed to insert data";
													}
												}
												else
												{
													$msg = "Id already taken";
												}
												
											}
											else
											{
												$msg = "Email already taken";
											}
										}
										else
										{
											$msg = "Password do not match";
										}
									}
									else
									{
										$msg = "Phone number must be digits";
									}
									
								}
								else
								{
									$msg = "Phone must be 10 digits";
								}
							}
							else
							{
								"Id number must be 13 digits";
							}
							
							
						}	
                        else
						{
							$msg = "Id number must be digits";
						}							 
					 }
					 else
					 {
						 $msg = "Surname must be more the 3 charecters";
					 }
					   
				   }
				   else
				   {
					   $msg = "Name should not less then 3 charecters";
				   }
				   
			   }
			   else
			   {
				   $msg = "Surname must be in charecters";
			   }
		   }
		   else
		   {
			   $msg = "Name must be in charecter";
			   
		   }
	   }
	   else
	   {
		   $msg = "Please enter vslid email";
	   }
   }
   else
   {
     $msg = "All fields are required!";  
	   
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
        
        <input type="text" placeholder="email" id = "email" name = "email" maxlength ="30"/>
      </p>
	  <p>
        <input type="text" placeholder="name" id = "name" name = "name" maxlength ="20"/>
      </p>
	  <p>
        <input type="text" placeholder="surname" id = "surname" name = "surname" maxlength ="20"/>
      </p>
	  <p>
        <input type="text" placeholder="id number" id = "id" name = "id" maxlength ="13"/>
      </p>
      <p>
	  <p>
        <input type="text" placeholder="phone" id = "phone" name = "phone" maxlength ="10" />
      </p>
        <input type="password" placeholder="Password" id = "pass1" name = "pass1" maxlength ="20"/>
      </p>
	  
	  <p>
        <input type="password" placeholder="Confirm Password" id = "pass2" name = "pass2" maxlength ="20"/>
      </p>
      <p>
        <input type="submit" id = "btn" name = "register" value = "register"/>
      </p>
</form>
<a href ="index.php">Already Registered?Login Now!</a>

</div>
	
<br>

<!-- <span href="register.php" class="button" id="toggle-login">Forgot Password</span> -->


</body>

</html>
