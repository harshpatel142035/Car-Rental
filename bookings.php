<?php
session_start();
if (!$_SESSION['status']) {
  echo '<script> alert("Log in First!!");</script>';
} else {
  echo '<script> alert(Welcome Agent);</script>';
}
include("conn.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>Car Rental </title>
  <link rel="stylesheet" href="styles.css">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
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
      <div class="header">Welcome!! <?= $_SESSION['email'] ?>.
        <?php
        error_reporting(E_ALL ^ E_NOTICE);
        if ($_SESSION['status']) {

        ?>
          <li style="margin-top:-17px; margin-left:1150px;"><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
        <?php
        }
        ?>
      </div>
      <div class="info">
        <div>
          <h4>Added cars</h4>
          <?php
          $query = "select * from bookings";
          $run = mysqli_query($conn, $query);
          ?>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">S no</th>
                <th scope="col">Username</th>
                <th scope="col">Model</th>
                <th scope="col">Registration Number</th>
                <th scope="col">Capacity</th>
                <th scope="col">Rent</th>
                

              </tr>
            </thead>
            <?php
            if ($run) {
              foreach ($run as $row) {
            ?>
                <tbody>
                  <tr>
                    <td> <?php echo $row['id']; ?> </td>
                    <td> <?php echo $row['user']; ?> </td>
                    <td> <?php echo $row['vmodel']; ?> </td>
                    <td> <?php echo $row['vno']; ?> </td>
                    <td> <?php echo $row['cap']; ?> </td>
                    <td> <?php echo $row['rent']; ?> </td>
                   
                  </tr>
                </tbody>
            <?php
              }
            } else {
              echo "No Records Found!!";
            }

            ?>
          </table>
        </div>
      </div>
    </div>
  </div>

</body>

</html>