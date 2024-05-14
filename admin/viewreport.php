<?php
include 'adminnavbar.php';
$reportid = (int)$_GET['reportid'];
// $q = "select * from reports where reportid=$reportid";
// $s = mysqli_query($con,$q);
// $r = mysqli_fetch_assoc($s);

$r = $reports->findOne(['reportid' => $reportid]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Report Details</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .container {
      padding-top: 50px;
    }

    .item-details {
      background-color: #fff;
      opacity: 0.8;
      padding: 30px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
    }

    .item-details h2 {
      margin-bottom: 15px;
      color: white;
    }

    .item-details p {
      font-size: 16px;
      margin-bottom: 10px;
      color: whitesmoke;
      font-weight: 800;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12 bg-primary item-details">
        <h2>Report Details </h2>
        <p><strong>Report Id:</strong> <?php echo $r['reportid']; ?></p>
        <p><strong>Reporter ID:</strong> <?php echo $r['reporterid']; ?></p>
        <p><strong>Victim ID:</strong> <?php echo $r['victimid']; ?></p>
        <p><strong>Item ID:</strong> <?php echo $r['itemid']; ?></p>
        <p><strong>Report Description:</strong></p>
        <p><?php echo $r['reportdesc']; ?></p>
        <p><strong>Report Status:</strong> <?php echo $r['reportstatus']; ?></p>
        <span class="btn btn-warning"><a href="admindashboard.php" style="color: black;">Go Back</a></span>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>