<?php
include 'dbcon.php';

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>TradeHUB</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/ac1730273e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="styles1.css">
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
                        <li class="nav-item">
                            <a class="nav-link " href="about.php" style="font-size:x-large;">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contactus.php" style="font-size:x-large;">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="social.php" style="font-size:x-large;">Social</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size:x-large;">
                                Dropdown link
                            </a>
                            <ul class="dropdown-menu">
                                <?php
                                session_start();

                                if (isset($_SESSION['username'])) {
                                    $username = $_SESSION['username'];
                                ?>
                                    <li>
                                        <h3><a class="dropdown-item" style="font-size: large;" href="sellitem.php">SellItem</a></h3>
                                    </li>
                                    <li>
                                        <h3><a class="dropdown-item" style="font-size: large;" href="notify.php?username=<?php echo $username; ?>">Notifications</a></h3>

                                    </li>
                                    <li>
                                        <h3><a class="dropdown-item" style="font-size: large;" href="inbox.php">Inbox</a></h3>
                                    </li>
                                    <li>
                                        <h3><a class="dropdown-item" style="font-size: large;" href="myprofile.php">MyProfile</a></h3>
                                    </li>
                                    <li>
                                        <h3><a class="dropdown-item" style="font-size: large;" href="userlogout.php">LogOut</a></h3>
                                    </li>

                                <?php
                                } else {
                                ?>
                                    <li>
                                        <h3><a class="dropdown-item" style="font-size: large;" href="userlogin.php">LogIn</a></h3>
                                    </li>
                                    <li>
                                        <h3><a class="dropdown-item" style="font-size: large;" href="usersignup.php">SignUp</a></h3>
                                    </li>
                                    <li>
                                        <h3><a class="dropdown-item" style="font-size: large;" href="admin/index.php">AdminLogin</a></h3>
                                    </li>

                                <?php
                                }
                                ?>
                            </ul>
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
                    <img class="title-image" src="images/tradehubgif.gif" alt="iphone-mockup">
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
                $cr = $items->find([
                    'categoryid' => (int)$categoryid,
                    'itemstatus' => 'available'
                ]);

                foreach ($cr as $item) {
            ?>
                    <div class="pricing-col col-lg-6 col-md-6">
                        <div class="card border-danger">
                            <div class="card-header text-bg-danger">
                                <h3><?php echo $item['itemname'] ?></h3>
                            </div>
                            <div class="card-body">
                                <h4>Price: <?php echo $item['itemprice'] ?> Rs.</h4>
                                <h6>Condition: <?php echo $item['itemcondition'] ?></h6>

                                <img id="itemimg" src="<?php echo $item['itempic']; ?>" alt="">
                                <br />
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

                    <!-- here  -->
                <?php
                }
            } else {
                ?>
                <section id="pricing">
                    <div class="row">
                        <?php
                        // here 
                        $cr = $items->find(["itemstatus" => "available"]);
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
                                        <h4>Price: <?php echo $item['itemprice'] ?> Rs.</h4>
                                        <h6>Condition: <?php echo $item['itemcondition'] ?></h6>

                                        <img id="itemimg" src="<?php echo $item['itempic']; ?>" alt="">
                                        <br />
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
    <a href="chat.php"><img src="images/th.jpg" alt="CHATBOT" style="border:2px solid black;border-radius: 50%; position:fixed;bottom:1rem;right:1rem;height:7rem;width:7rem;" /></a>

</body>
<script src="index.js"></script>

</html>