<?php

include("connection.php");
include("session.php");

$id = $_GET['id'];

$query = "DELETE FROM `appointment` WHERE `id` = $id";

mysqli_query($conn,$query);

header("location:details.php");



?>