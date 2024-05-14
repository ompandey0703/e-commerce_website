<?php
include 'dbcon.php';
session_start();

$itemid = (int)$_GET['itemid'];

$r = $items->findOne(['itemid' => $itemid]);

$catid = (int)$r['categoryid'];

$catres = $categories->findOne(['categoryid' => $catid]);

$sellerid = $r['sellerid'];

$r2 = $users->findOne(['userid' => $sellerid]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Item Details</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-image: url('images/bg.jpg');
      background-size: cover;
    }

    .container {
      padding-top: 50px;
    }

    .item-details {
      background-color: #fff;
      opacity: 0.8;
      padding: 30px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
      overflow-x: scroll;
    }

    .item-details img {
      max-width: 100%;
      height: auto;
      border-radius: 5px;
      margin-bottom: 20px;
      box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
    }

    .item-details h2 {
      font-size: 24px;
      margin-bottom: 15px;
      color: #333;
    }

    .item-details p {
      font-size: 16px;
      margin-bottom: 10px;
      color: #555;
    }

    .btn-purchase {
      padding: 10px 30px;
      font-size: 18px;
      background-color: #3498db;
      border-color: #3498db;
    }

    .btn-purchase:hover {
      background-color: #2980b9;
      border-color: #2980b9;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <img src="<?php echo $r['itempic']; ?>" class="img-fluid" alt="Item Image">
      </div>
      <div class="col-md-6 item-details">
        <h2><?php echo $r['itemname']; ?></h2>
        <p><strong>Category:</strong> <?php echo $catres['categoryname']; ?></p>
        <p><strong>Seller Address:</strong> <?php echo $r2['useraddress']; ?></p>
        <p><strong>Item Price:</strong> <?php echo $r['itemprice']; ?> Rs.</p>
        <p><strong>Item Condition:</strong> <?php echo $r['itemcondition']; ?></p>
        <p><strong>Item Description:</strong></p>
        <p><?php echo $r['itemdescription']; ?></p>
        <p><strong>Item Status:</strong> <?php echo $r['itemstatus']; ?></p>
        <button onclick="window.location.href='buyrequest.php?itemid=<?php echo $itemid; ?>'" class="btn btn-primary btn-purchase">
          <?php
          if (isset($_SESSION['userid'])) {
            $uid = (int)$_SESSION['userid'];
            $clol = $buyrequest->count(['customerid' => $uid, 'itemid' => $itemid]);
            if ($clol == 0) {
              echo "place request";
            } else {
              echo "request again";
            }
          } else {
            echo "place request";
          }
          ?>
        </button><br><br>
        <span><a href="index.php">Go Back</a></span>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>