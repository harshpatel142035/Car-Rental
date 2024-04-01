<?php
include("conn.php");
session_start();
$id = $_GET['id'];
error_reporting(E_ALL ^ E_NOTICE);
$date = $_POST['date'];
error_reporting(E_ALL ^ E_NOTICE);
$days = $_POST['days'];
$user = $_SESSION['email'];
$sql1 = "SELECT * FROM addcars WHERE id = '$id'";
$result1 = mysqli_query($conn, $sql1);
if (mysqli_num_rows($result1)) {
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $vmodel = $row1['vmodel'];
        $vno = $row1['vno'];
        $cap = $row1['cap'];
        $rent = $row1['rent'];
    }
}
if (isset($_POST['rent'])) {
    $qrry = "INSERT INTO `bookings`( `user`, `vmodel`, `vno`, `cap`, `rent`, `date`, `days`) VALUES ('$user','$vmodel','$vno','$cap','$rent','$date','$days')";
    $feed = mysqli_query($conn, $qrry);
    if ($feed) {
        echo '<script> alert("You Have successfully booked the car");</script>';
        //header('location: availablecars.php');
    } else {
        echo '<script> alert("OOPS !!, There is some error");</script>';
        //echo $id;
    }
}
?>
<html lang="en">

<head>
    <title>Car Rental</title>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        * {
            font-family: 'Open Sans', sans-serif;
            font-weight: bold;
            box-sizing: border-box;
        }

        .navbar {
            margin-bottom: 0;
            border-radius: 0;

        }

        /* Add a gray background color and some padding to the footer */
        footer {
            background-color: #f2f2f2;
            padding: 25px;
        }

        .h5 {

            font-weight: bold;
        }

        .grid {
            background-color: #DADADA;
            width: 500px;
            float: left;
            overflow: hidden;
            border-radius: 20px;
            margin-left: 170px;
            margin-top: 60px;

        }

        .col {
            margin-left: 40px;
            overflow: hidden;
        }

        .row {
            float: right;
            margin-right: 25px;
            margin-top: 10px;
        }

        .bpic {
            border-radius: 20px;
        }

        .but {
            background-color: #272727;
            color: #DADADA;
            height: 40px;
            width: 80px;
            border-radius: 10px;
            margin-top: 20px;
            margin-left: 90px;
            font-weight: bold;
        }

        .h3 {
            font-weight: bold;
            font-size: 50px;
        }

        .days {
            position: relative;
            top: -55px;
            right: -90px;
            border-radius: 5px;
        }
        .cnfbooking{
            height:100px;
            width:800px;
            background-color: #f2f2f2;
            margin: auto;
            text-align: center;
            margin-top: 40px;
            margin-bottom: 30px;
        }
        .fa{
            margin-left: -550px;
        }
        .fb{
            margin-top: -110px;
            margin-left: 420px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <b class="navbar-brand">Car Rental</b>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="availablecars.php">Available Cars</a></li>
                    <li><a href="#about">About</a></li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    error_reporting(E_ALL ^ E_NOTICE);
                    if (!$_SESSION['status']) {

                    ?>
                        <li><a href="log.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                        <li><a href="register.php"><span class="glyphicon glyphicon-log-in"></span> Register</a></li>
                    <?php
                    } else {
                    ?>
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
     <div class="cnfbooking">
           <h1> Thanks for Booking With Us. </h1>
           <h3> Your Booking has been Confirmed. </h3>
     </div>
</body>
<footer id="about" class="container-fluid text-center">
    <div class="fa">
            <h2 class="card-title">About Us</h2>
            <p class="card-text">A budget friendly car rental service.</p>
            <p class="card-text">Akhil Shivtirth Nagar, Kothrud, Pune.</p>

    </div>     
            <div class="fb">
            <h2 class="card-title">Contact Us</h2>
            <p class="card-text">+91 7004689328</p>
            <p class="card-text">Email: harsh.patel.142035@gmail.com</p>
            </div> 
  </footer>
</html>