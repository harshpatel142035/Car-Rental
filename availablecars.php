<?php
session_start();
include("conn.php");
?>
<!DOCTYPE html>
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


    <div id="availablecars" class="container-fluid bg-3 text-center">
        <h3 class="h3">Available Cars</h3><br>
        <h3 style="margin-top:-10px;"> Our Fleet, Your Fleet </h3>
    </div>
    <?php
    $query = "SELECT * from `addcars`";
    $run = mysqli_query($conn, $query);

    if ($run) {
        foreach ($run as $row) {

    ?>
            <div>
                <div class="grid">

                    <div class="col">
                        <br>
                        <img class="bpic" style=" height:200px; width:200px;" src="images/<?php echo $row['pic']; ?>">

                        <div class="row">
                            <h5 class="h5">Model: <?php echo $row['vmodel'] ?> </h5>
                            <h5 class="h5">Rent: <?php echo $row['rent'] ?> / Per day </h5>
                            <h5 class="h5"> Capacity: <?php echo $row['cap'] ?> </h5>
                            <h5 class="h5"> Vehicle Number: <?php echo $row['vno'] ?> </h5>
                            <?php
                            if ($_SESSION['status']) {
                            ?>
                                <form method="post" action="rent.php?id=<?php echo $row['id']; ?>"enctype="multipart/form-data">
                            
                                    <h5 class="h5">Start Date: </h5>
                                    <input type="date" name="date" class="form-control" placeholder="Start Date" required="required">
                                    <h5 class="h5">No of Days: </h5>
                                    <select class="days" name="days" id="days">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                <?php
                            }
                                ?>
                                <?php
                                if (!$_SESSION['status']) {
                                ?>
                                    <button class="but" name="rent"> <a href="log.php"> Rent Car </a></button>
                                <?php
                                } else {
                                ?>
                                    <button class="but" name="rent"> Rent Car </button>
                                <?php
                                }
                                ?>
                                </form>

                        </div>
                    </div>
                    <br>
                </div>
            </div>
    <?php

        }
    }

    ?>


    <br><br>
</body>




</html>