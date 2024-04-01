<?php
session_start();
if (!$_SESSION['status']) {
    echo '<script> alert("Log in First!!");</script>';
} else {
    echo '<script> alert(Welcome Agent);</script>';
}
include("conn.php");

if (isset($_POST['btnsubmit'])) {
    error_reporting(E_ALL ^ E_NOTICE);
    $id = $_GET['id'];
    error_reporting(E_ALL ^ E_NOTICE);
    $vmodel = $_POST['vmodel'];
    error_reporting(E_ALL ^ E_NOTICE);
    $vno = $_POST['vno'];
    error_reporting(E_ALL ^ E_NOTICE);
    $cap = $_POST['cap'];
    error_reporting(E_ALL ^ E_NOTICE);
    $rent = $_POST['rent'];
    error_reporting(E_ALL ^ E_NOTICE);
    $pic = $_FILES['file']['name'];
    $temp_pic = $_FILES['file']['tmp_name'];
    $picextension=explode('.' , $pic);
    $picextension=strtolower(end($picextension));
    $newpicname= $id ."-".date("Y.m.d");
    $newpicname .=".".$picextension;
    $folder = "images/" . $pic;
    move_uploaded_file($temp_pic, 'images/' .$newpicname);
    $qry = "update addcars set id=$id, vmodel='$vmodel', vno='$vno', cap=$cap, rent=$rent, pic='$pic' where id=$id";

    if (mysqli_query($conn, $qry)) {
        header("location:admindashboard.php");
        //echo '<script> alert("Your data has been added successfully"); </script>';
    } else {
        echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);
    }
}

?>
<html>

<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Car Rental</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <style>
        .editform {
            margin: auto;
            width: 500px;
            height: fit-content;

        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar">
            <h2>Car Rental</h2>
            <ul>
                <li><a href="addcars.php"><i class="fas fa-home"></i>Add New car</a></li>
                <li><a href="bookings.php"><i class="fas fa-user"></i>Bookings</a></li>
                <li><a href="admindashboard.php"><i class="fas fa-user"></i>View Added Cars</a></li>
            </ul>
            <div class="social_media">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <div class="main_content">
            <div class="header">Welcome!! <?= $_SESSION['email'] ?>
                <?php
                error_reporting(E_ALL ^ E_NOTICE);
                if ($_SESSION['status']) {

                ?>
                    <li style="margin-top:-17px; margin-left:1150px;"><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
                <?php
                }
                ?>
            </div>
        </div>

    </div> <br> <br>
    <div class="editform">
        <h3>Enter Details </h3><br>
        <form method="post" action="" enctype="multipart/form-data" class="form-group">
            <div class="form-group">
                <label for="exampleInputEmail1">Vehicle Model</label>
                <input type="text" class="form-control" aria-describedby="emailHelp" name="vmodel" placeholder="Enter Vehicle Model">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Vehicle Number</label>
                <input type="text" class="form-control" name="vno" placeholder="Enter Vehicle Number">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Seating Capacity</label>
                <input type="text" class="form-control" name="cap" placeholder="Enter Seating Capacity">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Rent per-day</label>
                <input type="text" class="form-control" name="rent" placeholder="Enter Rent per-day">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Photo</label>
                <input type="file" class="form-control" name="file" value="">
            </div>

            <br>
            <button type="submit" class="btn btn-primary" name="btnsubmit">Submit</button>

        </form>
    </div>

</body>

</html>