<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Admin Signup</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/index1.css">
</head>

<body>
  <!-- include nav bar  -->
  <?php include 'adminnavbar.php'; ?>

  <?php
  if (isset($_POST['signup'])) {
    $email =  $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    // $emailquery = "select * from admins where adminemail='$email'";
    // $selectedmail = mysqli_query($con, $emailquery);
    // $countemail = mysqli_num_rows($selectedmail);

    $res = $admins->findOne(['adminemail' => $email]);
    $countemail = $admins->count(['adminemail' => $email]);

    if ($countemail != 0) {
  ?>
      <script>
        alert("admin already registered.");
        location.replace('admindashboard.php');
      </script>
      <?php
    } else {
      if ($password == $cpassword) {
        // $insert = "INSERT INTO admins (adminname,adminemail,adminpassword) VALUES ('$name','$email','$hash')";
        // $inserted = mysqli_query($con, $insert);
        $adminid = 0;
        $maxUser = $admins->findOne([], ['sort' => ['adminid' => -1]]);

        if ($maxUser) {
          $adminid =  $maxUser['adminid'] + 1;
        } else {
          $adminid = 1;
        }

        $insertOneResult = $admins->insertOne([
          'adminid' => $adminid,
          'adminname' => $name,
          'adminemail' => $email,
          'adminpassword' => $password,
        ]);
        if ($insertOneResult->getInsertedCount() > 0) {
      ?>
          <script>
            alert("admin signup successful")
          </script>
        <?php
        } else {
        ?>
          <script>
            alert("admin signup failed")
          </script>
        <?php
        }
        ?>
        <script>
          location.replace('admindashboard.php');
        </script>
      <?php
      } else {
      ?>
        <script>
          alert("passwords do not match");
          location.replace('signup.php');
        </script>
  <?php
      }
    }
  }
  ?>

  <div class="container">
    <div class="row justify-content-center">
      <div class="loginbackground box-background--white padding-top--64">
        <div class="loginbackground-gridContainer">
          <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
            <div class="box-root" style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
            </div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
            <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
            <div class="box-root box-background--blue800" style="flex-grow: 1;background-color:#7e313c"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
            <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;background-color:#ff4c68"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
            <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;background-color:#ec92a0"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
            <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;background-color:#ec92a0"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
            <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;background-color:#ff4c68"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
            <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;background-color:#ec9fab"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
            <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <form class="login-form" action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
          <h2 class="text-center mb-4" style="color: rgb(255, 136, 0);">Admin Signup</h2>
          <div class="form-group">
            <label for="adminEmail" style="color:rgb(255, 136, 0)">Email:</label>
            <input type="email" class="form-control" id="adminEmail" placeholder="Enter email" name="email" required>
          </div>
          <div class="form-group">
            <label for="adminName" style="color:rgb(255, 136, 0)">Name:</label>
            <input type="text" class="form-control" id="adminName" placeholder="Enter name" name="name" required>
          </div>
          <div class="form-group">
            <label for="adminPassword" style="color:rgb(255, 136, 0)">Password:</label>
            <input type="password" class="form-control" id="adminPassword" placeholder="Enter password" name="password" required>
          </div>
          <div class="form-group">
            <label for="adminPassword" style="color:rgb(255, 136, 0)">Confirm Password:</label>
            <input type="password" class="form-control" id="adminPassword" placeholder="Enter password" name="cpassword" required>
          </div>
          <input type="submit" class="btn btn-primary btn-block" value="SignUp" name="signup" style="background-color: rgb(255, 136, 0); box-shadow: 0 0 2px rgb(255, 136, 0); border:none">
          <a href="admindashboard.php" class="btn btn-danger btn-block" style="box-shadow: 0 0 2px rgb(255, 136, 0); border:none">Go back</a>
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