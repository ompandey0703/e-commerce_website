<?php
include 'dbcon.php';
?>
<html>

<head>
  <title> USER LOG IN FORM</title>
  <link rel="stylesheet" type="text/css" href="userloginstyle1.css">
</head>

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
              <span class="padding-bottom--15" style="color:rgb(255, 136, 0)">Sign in to your account</span>
              <form action="loginvalidation.php" method="post" id="stripe-login">
                <div class="field padding-bottom--24">
                  <label for="email" style="color:rgb(255, 136, 0)">Email</label>
                  <input type="email" name="useremail" style="box-shadow:0 0 2px #ff4c68" value="<?php if (isset($_COOKIE['useremail'])) {
                                                                                                    echo $_COOKIE['useremail'];
                                                                                                  } ?>">
                </div>
                <div class="field padding-bottom--24">
                  <div class="grid--50-50">
                    <label for="password" style="color:rgb(255, 136, 0)">Password</label>
                    <div class="reset-pass">
                      <a href="forgotpassword.php" style="color:rgb(255, 136, 0)">Forgot your password?</a>
                    </div>
                  </div>
                  <input type="password" style="box-shadow:0 0 2px #ff4c68" name="userpassword" value="<?php if (isset($_COOKIE['userpassword'])) {
                                                                                                          echo $_COOKIE['userpassword'];
                                                                                                        } ?>">
                </div>
                <div class="field field-checkbox padding-bottom--24 flex-flex align-center">
                  <label for="checkbox" style="color:rgb(255, 136, 0)">
                    <input type="checkbox" name="rememberme" style="accent-color:#ff4c68"> Stay signed in for a week
                  </label>
                </div>
                <div class="field padding-bottom--24">
                  <input type="submit" name="submit" value="Continue" style="background-color:rgb(255, 136, 0);box-shadow:0 0 2px rgb(255,136,0)">
                </div>
              </form>
            </div>
          </div>
          <div class="footer-link padding-top--24">
            <span style="color:rgb(255, 136, 0)">Don't have an account? <a href="usersignup.php" style="color:rgb(255, 136, 0)">Sign up</a></span>

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