<?php
include("conn.php");
$id=$_GET['id'];
$q="DELETE FROM `addcars` WHERE id = $id";
mysqli_query($conn,$q);
header('location:admindashboard.php');
?>
