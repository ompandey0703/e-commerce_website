<?php
include '../dbcon.php';
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  // $emailquery = "select * from admins where adminemail='$email'";
  // $selectedmail = mysqli_query($con, $emailquery);
  // $countemail = mysqli_num_rows($selectedmail);
  $countemail = $admins->count(['adminemail' => $email]);
  if ($countemail == 0) {
?>
    <script>
      alert("invalid email");
      location.replace('index.php');
    </script>
    <?php
  } else {
    $res = $admins->findOne(['adminemail' => $email]);
    // $count = $users->count(['useremail' => $useremail]);
    $dbpassword = $res['adminpassword'];
    if ($dbpassword == $password) {
      // redirect to dashboard
      session_start();
      $_SESSION['adminname'] = $res['adminname'];
      $_SESSION['adminemail'] = $email;
      $_SESSION['adminid'] = $res['adminid'];
      $_SESSION['adminpassword'] = $res['adminpassword'];
    ?>
      <script>
        location.replace('admindashboard.php');
      </script>
    <?php
    } else {
    ?>
      <script>
        alert("invalid password");
        location.replace('index.php');
      </script>
<?php
    }
  }
}
?>