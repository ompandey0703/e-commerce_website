<?php
include 'dbcon.php';
include 'navbar.php';
if (!isset($_SESSION['username'])) {
?>
  <script>
    location.replace('index.php')
  </script>
<?php
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LIKED PRODUCTS PAGE</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    /* Add your custom styles here */
    /* Adjust navbar height */
    body {
      /* background: linear-gradient(rgb(8, 8, 35), blue); */
      background-color: rgb(1, 1, 39);
    }

    .navbar-custom {
      min-height: 80px;
    }

    /* Align logo and site name */
    .navbar-brand img {
      max-height: 50px;
      margin-right: 10px;
    }

    /* Style search bar */
    .search-box {
      max-width: 300px;
    }

    .container-fluid {
      background-color: rgb(8, 8, 35);
    }

    .navbar-brand {
      color: yellow;
      font-weight: 800;
    }

    .navbar-brand:hover {
      color: yellow;
    }

    .linki {
      color: yellow;
      font-weight: 800;
    }

    .linki:hover {
      color: yellow;
      font-size: larger;
    }

    .card {
      border: 1px solid #ddd;
      border-radius: 8px;
    }

    .card-img-top {
      height: 200px;
      object-fit: cover;
      border-top-left-radius: 8px;
      border-top-right-radius: 8px;
    }

    .card-title {
      font-size: 1.25rem;
      font-weight: bold;
    }

    .card-text {
      margin-bottom: 0.5rem;
    }

    .btn-group {
      margin-top: 1rem;
    }

    .nav-item {
      margin-left: 15px;
    }
  </style>
</head>

<body>

  <!-- show products available for sale  -->
  <div class="container-fluid" style="text-align: center;">
    <h2 style="color: yellow;">REQUESTED PRODUCTS</h2>
  </div>
  <?php
  $uid = $_SESSION['userid'];
  // $q1 = "select * from items where itemid IN (SELECT itemid FROM buyrequest WHERE customerid=$uid);";
  $aggregateQuery = [
    [
      '$lookup' => [
        'from' => 'buyrequest',
        'localField' => 'itemid',
        'foreignField' => 'itemid',
        'as' => 'buy_requests'
      ]
    ],
    [
      '$match' => [
        'buy_requests.customerid' => $uid
      ]
    ],
    [
      '$project' => [
        '_id' => 0,
        'item' => '$$ROOT'
      ]
    ]
  ];

  $cursor = $items->aggregate($aggregateQuery);

  $result = iterator_to_array($cursor);


  // $sq1 = mysqli_query($con, $q1);
  ?>
  <div class="container">
    <div class="row">
      <?php
      foreach ($result as $rq1) {
      ?>

        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <img class="card-img-top" src="<?php echo $rq1['item']['itempic']; ?>" alt="Product Image">
            <div class="card-body">
              <h5 class="card-title"><?php echo $rq1['item']['itemname']; ?></h5>
              <p class="card-text">Condition: <?php echo $rq1['item']['itemcondition']; ?></p>
              <p class="card-text">Price: <?php echo $rq1['item']['itemprice']; ?>Rs.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" onclick="window.location.href='like.php?itemid=<?php echo $rq1['item']['itemid'] ?>'" class="btn btn-sm btn-outline-secondary">
                    <?php
                    $itemid = $rq1['item']['itemid'];

                    // $qx = "select * from likes where itemid='$itemid' and likerid='$uid'";
                    // $sx = mysqli_query($con, $qx);
                    // $count = mysqli_num_rows($sx);
                    $count = $likes->count(['itemid' => $itemid, 'likerid' => $uid]);
                    if ($count == 0) {
                      echo "Like";
                    } else {
                      echo "Liked";
                    }
                    ?>
                  </button>

                  <button type="button" onclick="window.location.href='viewmore.php?itemid=<?php echo $rq1['item']['itemid']; ?>'" class="btn btn-sm btn-outline-secondary">View More</button>
                  <button type="button" onclick="window.location.href='report.php?itemid=<?php echo $rq1['item']['itemid'] ?>'" class="btn btn-sm btn-outline-danger">
                    <?php
                    // $qx2 = "select * from reports where itemid='$itemid' and reporterid='$uid'";
                    // $sx2 = mysqli_query($con, $qx2);
                    // $count2 = mysqli_num_rows($sx2);
                    $count2 = $reports->count(['itemid' => $itemid, 'reporterid' => $uid]);
                    if ($count2 == 0) {
                      echo "Report";
                    } else {
                      echo "Reported";
                    }
                    ?>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>