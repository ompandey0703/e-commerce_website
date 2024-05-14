<?php
include '../dbcon.php';
$userid = (int)$_GET['userid'];
// $q = "select * from users where userid=$userid";
// $s = mysqli_query($con,$q);
// $r = mysqli_fetch_assoc($s);
$r = $users->findOne(['userid' => $userid]);
if ($r['status'] == "active") {
  // block the user
  // $query = "update users set status='blocked' where userid=$userid";
  // mysqli_query($con, $query);
  $updateResult = $users->updateOne(
    ['userid' => $userid], // Filter to find the user by useremail
    ['$set' => ['status' => 'blocked']] // Update the username field
  );

  if ($updateResult->getModifiedCount() > 0) {
?>
    <script>
      alert('user blocked');
    </script>
  <?php
  }
} else {
  // unblock the user
  $updateResult = $users->updateOne(
    ['userid' => $userid], // Filter to find the user by useremail
    ['$set' => ['status' => 'active']] // Update the username field
  );
  if ($updateResult->getModifiedCount() > 0) {
  ?>
    <script>
      alert('user unbolcked');
    </script>
<?php
  }
}
?>
<script>
  location.replace('admindashboard.php');
</script>