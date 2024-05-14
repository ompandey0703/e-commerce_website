<?php
error_reporting(0);
session_start();

?>
<html>
<style>
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
        background-color: #ff4c68;
    }

    .navbar-brand {
        color: yellow;
        font-weight: 800;
    }

    .navbar-brand:hover {
        color: yellow;
    }

    .linki:hover {
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

    .navo {
        background-color: #ff4c68;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light  navbar-custom navo">
    <!-- Login/Signup/ SELL ITEM Options -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link linki" style="color:white;" href="index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link linki" style="color:white;" href="about.php">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link linki" style="color:white;" href="contactus.php">Contact Us</a>
        </li>
        <li class="nav-item">
            <a class="nav-link linki" style="color:white;" href="social.php">Social</a>
        </li>
    </ul>
    <?php
    if (isset($_SESSION['username'])) {
    ?>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link linki" style="color:white;" href="sellitem.php">Sell Item</a>
            </li>
            <li class="nav-item">
                <a class="nav-link linki" style="color:white;" href="myprofile.php">MyProfile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link linki" style="color:white;" href="userlogout.php">Logout</a>
            </li>
        </ul>
    <?php
    } else {
    ?>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link linki" style="color:white;" href="userlogin.php">Login/Signup</a>
            </li>
        </ul>
    <?php
    }
    ?>

    </div>
</nav>

</html>
<?php
session_abort();
?>