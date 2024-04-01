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
  $vmodel = $_POST['vmodel'];
  error_reporting(E_ALL ^ E_NOTICE);
  $vno = $_POST['vno'];
  error_reporting(E_ALL ^ E_NOTICE);
  $cap = $_POST['cap'];
  error_reporting(E_ALL ^ E_NOTICE);
  $rent = $_POST['rent'];
  error_reporting(E_ALL ^ E_NOTICE);
  $pic = $_FILES['pic']['name'];
  $temp_pic = $_FILES['pic']['tmp_name'];
  move_uploaded_file($temp_pic, "images/" . $pic);

  $qry = "INSERT INTO `addcars` ( `vmodel`, `vno`, `cap`, `rent`, `pic`) VALUES ( '$vmodel', '$vno', '$cap', '$rent', '$pic')";

  if (mysqli_query($conn, $qry)) {
    //header("location:adash.php");
    echo '<script> alert("Your data has been added successfully"); </script>';
  } else {
    echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Car Rental</title>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      list-style: none;
      text-decoration: none;
    }

    .form {
      margin-top: 150px;
      margin-left: -1200px;
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

    <div class="form">
      <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>" class="form-group" enctype="multipart/form-data">
        <div class="form-group">
          <label class="label">Vehicle Model</label>
          <input type="text" class="form-control" name="vmodel">
        </div>
        <div class="form-group">
          <label for="inputPassword" class="label">Vehicle Number</label>
          <input type="text" class="form-control" name="vno">
        </div>
        <div class="form-group">
          <label for="inputseatcapacity" class="label">seating capacity</label>
          <input type="text" class="form-control" name="cap">
        </div>
        <div class="form-group">
          <label for="inputrentperday" class="label">Rent per-day</label>
          <input type="text" class="form-control" name="rent">
        </div>
        <div class="form-group">
          <label for="file" class="label">Add Photo</label>
          <input type="file" class="form-control" name="pic" id="file">
        </div>
        <button type="submit" class="btn btn-primary" name="btnsubmit">Submit</button>
      </form>
    </div>
</body>

</html>