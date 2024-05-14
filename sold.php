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
$itemid = (int) $_GET['itemid'];
// $query = "UPDATE items SET itemstatus = 'not available' WHERE itemid = $itemid;";
// $run = mysqli_query($con, $query);
$status = 'not available';
$updateResult = $items->updateOne(
  ['itemid' => $itemid],
  ['$set' => ['itemstatus' => $status]]
);


if ($updateResult->getModifiedCount() > 0) {
?>
  <script>
    alert("item removed");
    location.replace('myproducts.php');
  </script>
<?php
} else {

?>
  <script>
    alert("Unable to remove item");
    location.replace('myproducts.php');
  </script>
<?php
}

?>