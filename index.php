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

    .pic {
      float: right;
    }

    .tt {
      float: left;
    }

    .img {
      border-radius: 10px;
      margin-right: -120px;


    }

    .h2 {
      font-size: 75px;
      margin-left: -120px;
      margin-top: 120px;
    }

    .h4 {
      font-weight: bold;
      margin-left: 120px;

    }

    .h41 {
      font-weight: bold;
      margin-left: 210px;
    }

    .h3 {
      font-weight: bold;
    }

    .grid {
      width: fit-content;
      height: 80px;
      display: grid;
      padding: 16px;
      display: grid;
      grid-gap: 16px;
    grid-template-columns: 300px 300px 300px;
    grid-template-rows: 300px 300px 300px;

      @media screen and (max-width: 768px) {

       

      }
    }

    .col {
      margin-left: 50px;

      background-color: #D5D5D5;
      
      padding: 16px;
      border-radius: 10px;

    }

    .bpic {
      float: left;
      margin-right: 50px;
      border-radius: 10px;
      margin-bottom: 20px;
    }

    .h5 {

      font-weight: bold;
      margin-top: 20px;
      ;
    }

    .but {
      text-align: center;
      font-size: 16px;
      background-color: #333333;
      color: #f2f2f2;
      padding: 8px 12px;
      border-radius: 10px;
      margin-left: 80px;
      margin-top: 10px;
    }
   .cont{
    text-align: center;
    display: grid;
    height:180px;
    width:1100px;
    margin: auto;
    margin-bottom: 30px;
    border-radius: 10px;
    grid-template-columns: 300px 300px 300px;
    grid-template-rows: 300px 300px 300px;
   }
   .coll{
    margin-left: 50px;
    background-color: #f2f2f2;
    height: 120px;
    width:300px;
    border-radius: 20px;
    margin-top: 30px;
   }
   .line{
    margin: auto;
    text-align: center;
    width:1100px;
    
   }
   .gtext{
    font-weight: bold;
   }
   p{
    margin: auto;
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
            <li><a href="log.php">  Login</a></li>
            <li><a href="register.php">Agent Register</a></li>
            <li><a href="registeruser.php">Customer Register</a></li>
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

  <div class="jumbotron">

    <div class="container text-center">
      <div class="pic">
        <img src="./images/c1.png" class="img" alt="Responsive image" style="height:450px; width:710px;"> <br>
      </div>
      <div class="tt">
        <h2 class="h2">Drive in the city</h2>
        <br> <br> <br> <br>
        <h4 class="h4"> THE EASY WAY TO TAKEOVER A LEASE </h4>

        <h4 class="h41"> ENJOY RENTING WITH US</h4>
      </div>
    </div>
  </div>
<div class="line">
<h4 style="font-weight: bold; line-height: 1.6;">We know the difference is in the details and that’s why our car rental services, in the tourism
          and business industry, stand out for their quality and good taste, to offer you an unique experience.</h4>
</div>
  <div class="cont">
          <div class="grid">
          <div class="coll">
          <h4 class="gtext"> Well maintained cars</h4><br>
          <p>Regular Service & maintenance inpected. </p>
          </div>
          <div class="coll">
          <h4 class="gtext"> Flexible pricing plans</h4><br>
          <p>Choose unlimited kilometers. </p>
          </div>
          <div class="coll">
          <h4 class="gtext"> Easy booking and return</h4><br>
          <p>On time, at your preffered location. </p>
          </div>
        </div>
       
  </div>
  

  <footer id="about" class="container-fluid text-center">
    <div class="row">
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title">About Us</h2>
            <p class="card-text">A budget friendly car rental service.</p>
            <p class="card-text">Akhil Shivtirth Nagar, Kothrud, Pune.</p>

          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title">Contact Us</h2>
            <p class="card-text">+91 7004689328</p>
            <p class="card-text">Email: harsh.patel.142035@gmail.com</p>

          </div>
        </div>
      </div>
    </div>
  </footer>

</body>

</html>