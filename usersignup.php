<?php
include 'dbcon.php';
?>
<html>

<head>
  <title> USER SIGN UP FORM</title>
  <link rel="stylesheet" type="text/css" href="userloginstyle1.css">
</head>
<?php
if (isset($_POST['submit'])) {
  $userid = 0;
  $maxUser = $users->findOne([], ['sort' => ['userid' => -1]]);

  if ($maxUser) {
    $userid =  $maxUser['userid'] + 1;
  } else {
    $userid = 1;
  }

  $username = $_POST['username'];
  $useremail = $_POST['useremail'];
  $userphone = $_POST['userphone'];
  $useraddress = $_POST['useraddress'];
  $userpassword = $_POST['userpassword'];
  $cuserpassword = $_POST['cuserpassword'];

  $count = $users->count(['useremail' => $useremail]);

  if ($count != 0) {
?>
    <script>
      alert("email already registered. Please LOG IN");
      location.replace('userlogin.php');
    </script>
    <?php
  } else {
    if ($userpassword == $cuserpassword) {
      // sign up successful
      $hash = password_hash($userpassword, PASSWORD_BCRYPT);
      $token = bin2hex(random_bytes(15));
      $insertOneResult = $users->insertOne([
        'userid' => $userid,
        'username' => $username,
        'useremail' => $useremail,
        'userphone' => $userphone,
        'useraddress' => $useraddress,
        'userpassword' => $hash,
        'status' => "active",
        'token' => $token,
      ]);
    ?>
      <script>
        alert("user registered successfully");
        location.replace('userlogin.php');
      </script>
    <?php
    } else {
    ?>
      <script>
        alert("passwords do not match");
        location.replace('usersignup.php');
      </script>
<?php
    }
  }
}
?>

<body>
  <div class="login-root">
    <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
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
      <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
        <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center tradehub">
          <h1><a href="index.php" rel="dofollow" style="color:rgb(255, 136, 0)">TradeHUB</a></h1>
        </div>
        <div class="formbg-outer">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
              <span class="padding-bottom--15" style="color:rgb(255, 136, 0)">Create your account</span>
              <form action="usersignup.php" method="post" id="stripe-login">
                <!-- username  -->
                <div class="field padding-bottom--24">
                  <label for="name" style="color:rgb(255, 136, 0)">Name</label>
                  <input type="text" name="username" style="box-shadow:0 0 2px #ff4c68" required>
                </div>
                <!-- useremail  -->
                <div class="field padding-bottom--24">
                  <label for="email" style="color:rgb(255, 136, 0)">Email</label>
                  <input type="email" name="useremail" style="box-shadow:0 0 2px #ff4c68" required>
                </div>
                <!-- userphone  -->
                <div class="field padding-bottom--24">
                  <label for="phone" style="color:rgb(255, 136, 0)">phone</label>
                  <input type="text" name="userphone" style="box-shadow:0 0 2px #ff4c68" required>
                </div>
                <!-- useraddress  -->
                <div class="field padding-bottom--24">
                  <label for="address" style="color:rgb(255, 136, 0)">address</label>
                  <input type="text" name="useraddress" style="box-shadow:0 0 2px #ff4c68" required>
                </div>
                <!-- userpassword  -->
                <div class="field padding-bottom--24">
                  <label for="password" style="color:rgb(255, 136, 0)">Create Password</label>
                  <input type="password" name="userpassword" style="box-shadow:0 0 2px #ff4c68" required>
                </div>
                <!-- confirmpassword  -->
                <div class="field padding-bottom--24">
                  <label for="confirmpassword" style="color:rgb(255, 136, 0)">Confirm Password</label>
                  <input type="password" name="cuserpassword" style="box-shadow:0 0 2px #ff4c68" required>
                </div>

                <div class="field padding-bottom--24">
                  <input type="submit" name="submit" value="Continue" style="background-color:rgb(255, 136, 0)">
                </div>
              </form>
            </div>
          </div>

          <div class="footer-link padding-top--24">
            <span style="color:rgb(255, 136, 0)">Already have an account? <a href="userlogin.php" style="color:rgb(255, 136, 0)">Log In</a></span>
            <div class="listing padding-top--24 padding-bottom--24 flex-flex center-center">
              <span><a href="index.php" style="color:#ff4c68">© TradeHUB</a></span>
              <span><a href="contactus.php" style="color:#ff4c68">Contact</a></span>
              <span><a href="tandc.php" style="color:#ff4c68">Privacy & terms</a></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>