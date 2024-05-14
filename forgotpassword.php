<?php
include 'dbcon.php';
session_start();
if (isset($_POST['submit'])) {
  $useremail = $_POST['useremail'];

  $res = $users->findOne(['useremail' => $useremail]);
  $count = $users->count(['useremail' => $useremail]);

  if ($count == 0) {
    // no such user exist
?>
    <script>
      alert("please enter a valid email.");
      location.replace('userlogin.php');
    </script>
  <?php
  } else {
    // mail found in db
    $token = $res['token'];

    $to = $useremail;
    $from = "From: toshitpant0808@gmail.com";
    $subject = "password recovery";
    $body = "click on the given link to recover your password. http://localhost/NOSQLPROJECT/x.php?token=$token";
    mail($to, $subject, $body, $from);

  ?>
    <script>
      alert("Please check your mail box to recover password.");
      location.replace('userlogin.php');
    </script>
<?php
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>forgot password</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Forgot Password</h4>
            <p class="card-text">Please enter your MailId carefully</p>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
              <div class="form-group">
                <label for="email">Enter your registered mail id :</label>
                <input type="email" name="useremail" class="form-control-file" required>
              </div>
              <input type="submit" class="btn btn-primary" value="Submit" name="submit">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>