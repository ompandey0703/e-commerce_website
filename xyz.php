<?php
include 'dbcon.php';
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>TinDog</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/ac1730273e.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>

<body>

  <section id="title">
    <div class="container-fluid">


      <!-- Nav Bar -->

      <nav class="navbar navbar-expand-lg navbar-dark ">
        <a href="" class="navbar-brand"><b>TradeHub</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size:x-large;">
                Dropdown link
              </a>
              <ul class="dropdown-menu">
                <li>
                  <h3><a class="dropdown-item" style="font-size: large;" href="#">Action</a></h3>
                </li>
                <li>
                  <h3><a class="dropdown-item" style="font-size: large;" href="#">Another action</a></h3>
                </li>
                <li>
                  <h3><a class="dropdown-item" style="font-size: large;" href="#">Something else here</a></h3>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="#footer" style="font-size:x-large;">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#pricing" style="font-size:x-large;">Pricing</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#cta" style="font-size:x-large;">Download</a>
            </li>
          </ul>
        </div>
      </nav>



      <!-- Title -->

      <div class="row">
        <div class="col-lg-6">
          <h1>Trade Anywhere Anytime Anything</h1>
          <button type="button" class="btn btn-lg btn-dark download-button"><i class="fa-brands fa-apple"></i>
            Download</button>
          <button type="button" class="btn btn-lg btn-outline-light download-button"><i class="fa-brands fa-google-play"></i> Download</button>
        </div>
        <div class="col-lg-6">
          <img class="title-image" src="images/iphone6.png" alt="iphone-mockup">
        </div>
      </div>

    </div>
    <div class="slider">
      <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" data-bs-interval="200">
        <div class="carousel-inner">
          <div class="carousel-item p-0 active">
            <img src="images/trade1.jpg" class=" d-block w-100" alt="..." style="height: 400px;">
          </div>
          <div class="carousel-item p-0">
            <img src="images/trade2.jpg" class=" d-block w-100" alt="..." style="height: 400px;">
          </div>
          <div class="carousel-item p-0">
            <img src="images/trade3.jpeg" class=" d-block w-100 " alt="..." style="height: 400px;">
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Features -->

  <section id="features">
    <div class="row">

      <div class="feature-box col-lg-4">
        <i class="icon fa-regular fa-circle-check fa-4x"></i>
        <h3>Easy to use.</h3>
        <p>So easy to use</p>
      </div>
      <div class="feature-box col-lg-4">
        <i class="icon fa-solid fa-bullseye fa-4x"></i>
        <h3>Elite Clientele</h3>
        <p>Elite Clientele</p>
      </div>
      <div class="feature-box col-lg-4">
        <i class="icon fa-solid fa-heart fa-4x"></i>
        <h3>Guaranteed to work.</h3>
        <p>Guaranteed to work.</p>
      </div>
    </div>
  </section>







  </section>


  <!-- Press -->

  <section id="press">
    <img src="images/TechCrunch.png" alt="tc-logo">
    <img src="images/tnw.png" alt="tnw-logo">
    <img src="images/bizinsider.png" alt="biz-insider-logo">
    <img src="images/mashable.png" alt="mashable-logo">

  </section>
  <!-- categories  -->

  <!--slider-->
  <div class="sliderbody">
    <div class="container">
      <div class="slider-wrapper">
        <button id="prev-slide" class="slide-button material-symbols-rounded">
          chevron_left
        </button>

        <ul class="image-list">
          <?php
          // var_dump($categories);
          $cursor = $categories->find([]);
          foreach ($cursor as $cat) {
          ?>
            <div class="image-item">
              <div class="card border-danger">
                <div class="card-header text-bg-danger">
                  <h3><?php echo $cat['categoryname'] ?></h3>
                </div>
                <div class="card-body">
                  <img src="images/<?php echo $cat['categorylogo'] ?>" alt="">
                  <div class="d-grid gap-2">
                    <button type="button" onclick="window.location.href='index.php?catid=<?php echo $cat['categoryid'] ?>'" class="btn btn-lg btn-block btn-outline-danger">View Products</button>
                  </div>
                </div>
              </div>
            </div>
          <?php
          }
          ?>


        </ul>
        <button id="next-slide" class="slide-button material-symbols-rounded">
          chevron_right
        </button>
      </div>
      <div class="slider-scrollbar">
        <div class="scrollbar-track">
          <div class="scrollbar-thumb"></div>
        </div>
      </div>
    </div>

  </div>
  <!-- categories end  -->
  <!-- start  -->
  <!-- show products available for sale  -->
  <div class="container">
    <div class="row">
      <?php
      if (isset($_GET['catid'])) {
        $categoryid = $_GET['catid'];
        $cr = $items->find(['categoryid' => (int)$categoryid]);
        foreach ($cr as $item) {
      ?>
          <!-- here  -->
          <section id="pricing">
            <div class="row">
              <div class="pricing-col col-lg-4 col-md-6">
                <div class="card border-danger">
                  <div class="card-header text-bg-danger">
                    <h3><?php echo $item['itemname'] ?></h3>
                  </div>
                  <div class="card-body">
                    <h2>Price: <?php echo $item['itemprice'] ?> Rs.</h2>
                    <h4>Condition: <?php echo $item['itemcondition'] ?></h4>

                    <img id="itemimg" src="<?php echo $item['itempic']; ?>" alt="">
                    <div class="d-grid gap-2">
                      <button type="button" onclick="window.location.href='like.php?itemid=<?php echo $item['itemid']; ?>'" class="btn btn-sm btn-outline-secondary">
                        <?php
                        $itemid = $item['itemid'];
                        $uid = -1;
                        if (isset($_SESSION['userid'])) {
                          $uid = $_SESSION['userid'];
                        }
                        $count = $likes->count(['itemid' => $itemid, 'likerid' => $uid]);

                        if ($count == 0) {
                          echo "Like";
                        } else {
                          echo "Liked";
                        }
                        ?>
                      </button>
                      <button type="button" onclick="window.location.href='viewmore.php?itemid=<?php echo $itemid; ?>'" class="btn btn-sm btn-outline-secondary">View More</button>
                      <button type="button" onclick="window.location.href='report.php?itemid=<?php echo $itemid ?>'" class="btn btn-sm btn-outline-danger">
                        <?php
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
          </section>
          <!-- here  -->
        <?php
        }
      } else {
        ?>
        <section id="pricing">
          <div class="row">
            <?php
            // here 
            $cr = $items->find([]);
            foreach ($cr as $item) {
            ?>
              <!-- here  -->
              <!-- <section id="pricing">
            <div class="row"> -->
              <div class="pricing-col col-lg-6 col-md-6">
                <div class="card border-danger">
                  <div class="card-header text-bg-danger">
                    <h3><?php echo $item['itemname'] ?></h3>
                  </div>
                  <div class="card-body">
                    <h2>Price: <?php echo $item['itemprice'] ?> Rs.</h2>
                    <h4>Condition: <?php echo $item['itemcondition'] ?></h4>

                    <img id="itemimg" src="<?php echo $item['itempic']; ?>" alt="">
                    <div class="d-grid gap-2">
                      <button type="button" onclick="window.location.href='like.php?itemid=<?php echo $item['itemid']; ?>'" class="btn btn-sm btn-outline-secondary">
                        <?php
                        $itemid = $item['itemid'];
                        $uid = -1;
                        if (isset($_SESSION['userid'])) {
                          $uid = $_SESSION['userid'];
                        }
                        $count = $likes->count(['itemid' => $itemid, 'likerid' => $uid]);

                        if ($count == 0) {
                          echo "Like";
                        } else {
                          echo "Liked";
                        }
                        ?>
                      </button>

                      <button type="button" onclick="window.location.href='viewmore.php?itemid=<?php echo $itemid; ?>'" class="btn btn-sm btn-outline-secondary">View More</button>
                      <button type="button" onclick="window.location.href='report.php?itemid=<?php echo $itemid ?>'" class="btn btn-sm btn-outline-danger">
                        <?php
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
              <!-- </div>
        </section> -->
              <!-- here  -->
            <?php
            }
            ?>
          </div>
        </section>
      <?php
        // here 
      }
      ?>
    </div>
  </div>

  <!-- Pricing -->


  <!-- Call to Action -->

  <section id="cta">

    <h1>Find the True Need.</h1>
    <button type="button" class="btn btn-md btn-dark download-button"><i class="fa-brands fa-apple"></i>
      Download</button>
    <button type="button" class="btn btn-md btn-outline-light download-button"><i class="fa-brands fa-google-play"></i>
      Download</button>

  </section>


  <!-- Footer -->

  <footer id="footer">

    <i class=" ic fa-brands fa-twitter"></i>
    <i class="ic fa-brands fa-facebook"></i>
    <i class="ic fa-brands fa-instagram"></i>
    <i class="ic fa-solid fa-envelope"></i>
    <p>© Copyright TinDog</p>

  </footer>


</body>
<script src="index.js"></script>

</html>