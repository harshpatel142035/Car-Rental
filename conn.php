<?php

$conn = mysqli_connect("localhost:3307", "root", "", "rent");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
    echo"not connected";
} 
 ?>

