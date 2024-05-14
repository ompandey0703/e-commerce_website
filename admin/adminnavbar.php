<?php
include '../dbcon.php';
session_start();
?>
<?php
if (!isset($_SESSION['adminname'])) {
?>
  <script>
    location.replace('index.php');
  </script>
<?php
}
?>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="../index.php">TradeHUB </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="admindashboard.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="categories.php">Categories</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="signup.php">Register_NewAdmin</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>

    </ul>
  </div>
</nav>