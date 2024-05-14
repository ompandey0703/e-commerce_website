<?php
include 'dbcon.php';
session_start();
if (!isset($_SESSION['username'])) {
?>
  <script>
    location.replace('index.php')
  </script>
<?php
}
?>

<?php
if (isset($_POST['submit'])) {
  $userid = $_SESSION['userid'];
  $username = $_POST['username'];
  $useremail = $_POST['useremail'];
  $userphone = $_POST['userphone'];
  $useraddress = $_POST['useraddress'];
  $userpassword = $_POST['userpassword'];
  $hash = password_hash($userpassword, PASSWORD_BCRYPT);

  // $query = "UPDATE users SET username = '$username', useremail = '$useremail', userphone = '$userphone', useraddress = '$useraddress', userpassword = '$hash' WHERE userid = $userid;";
  // $run = mysqli_query($con, $query);
  $updateResult = $users->updateMany(
    ['userid' => $userid], // Filter to find the user by useremail
    ['$set' => ['username' => $username, 'useremail' => $useremail, 'userphone' => $userphone, 'useraddress' => $useraddress, 'userpassword' => $hash]]  // Update the username field
  );
  if ($updateResult->getModifiedCount() > 0) {


    $_SESSION['username'] = $username;
    $_SESSION['useremail'] = $useremail;
    $_SESSION['userphone'] = $userphone;
    $_SESSION['useraddress'] = $useraddress;
    $_SESSION['userpassword'] = $hash;
    $_SESSION['unhashedpassword'] = $userpassword;
?>
    <script>
      alert("profile updated successfully");
      location.replace('myprofile.php');
    </script>
  <?php
  } else {
  ?>
    <script>
      alert("unable to update profile at the moment");
      location.replace('myprofile.php');
    </script>
<?php
  }
}
?>