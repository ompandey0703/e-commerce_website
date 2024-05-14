<?php
include '../dbcon.php';
$reportid = (int)$_GET['reportid'];
// $q = "select * from reports where reportid=$reportid";
// $s = mysqli_query($con,$q);
// $r = mysqli_fetch_assoc($s);
$r = $reports->findOne(['reportid' => $reportid]);

if ($r['reportstatus'] == "pending") {
  // close the report
  // $query = "update reports set reportstatus='closed' where reportid=$reportid";
  // mysqli_query($con, $query);
  $updateResult = $reports->updateOne(
    ['reportid' => $reportid], // Filter to find the user by useremail
    ['$set' => ['reportstatus' => 'closed']] // Update the username field
  );

  if ($updateResult->getModifiedCount() > 0) {
?>
    <script>
      alert('report closed');
    </script>
  <?php
  }
} else {
  // open the report
  // $query = "update reports set reportstatus='open' where reportid=$reportid";
  // mysqli_query($con, $query);
  $updateResult = $reports->updateOne(
    ['reportid' => $reportid], // Filter to find the user by useremail
    ['$set' => ['reportstatus' => 'pending']] // Update the username field
  );

  if ($updateResult->getModifiedCount() > 0) {
  ?>
    <script>
      alert('report opened');
    </script>
<?php
  }
}
?>
<script>
  location.replace('admindashboard.php');
</script>