<?php
include '../dbcon.php';
$catid = (int)$_GET['catid'];
// $query = "delete from categories where categoryid='$catid'";
// $run = mysqli_query($con, $query);

$deleteResult = $categories->deleteOne(['categoryid' => $catid]);

?>
<script>
  alert("category deleted successfully");
  location.replace('categories.php');
</script>