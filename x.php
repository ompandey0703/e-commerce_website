<?php
include 'dbcon.php';
if(!isset($_GET['token'])){
    ?>
    <script>location.replace('index.php')</script>
    <?php
}
$token = $_GET['token'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SET NEW PASSWORD</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="admin/css/index.css">
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form class="login-form" action="y.php?token=<?php echo $token; ?>" method="post">
          <h2 class="text-center mb-4">SET NEW PASSWORD</h2>
          <div class="form-group">
            <label for="password">password:</label>
            <input type="password" class="form-control" placeholder="Set new password" name="password" required>
          </div>
          <div class="form-group">
            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" class="form-control" placeholder="Confirm password" name="cpassword" required>
          </div>
          <input type="submit" class="btn btn-primary btn-block" value="submit" name="submit">
          </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

