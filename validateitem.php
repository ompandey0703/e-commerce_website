<?php
include 'dbcon.php';
session_start();

$itemcategory = $_POST['itemcategory'];
$itemname = $_POST['itemname'];
$itemcondition = $_POST['itemcondition'];
$itemdescription = $_POST['itemdescription'];
$itemprice = $_POST['itemprice'];

$itemstatus = "available";

$sellerid = $_SESSION['userid'];

$r = $categories->findOne(['categoryname' => $itemcategory]);

$categoryid = $r['categoryid'];

$pic = $_FILES['itempic'];
$picname = $pic['name'];
$picpath = $pic['tmp_name'];
$dest = 'upload/' . $picname;
move_uploaded_file($picpath, $dest);

$itemid = 0;
$maxItem = $items->findOne([], ['sort' => ['itemid' => -1]]);

if ($maxItem) {
    $itemid =  $maxItem['itemid'] + 1;
} else {
    $itemid = 1;
}

$insertOneResult = $items->insertOne([
    'itemid' => $itemid,
    'sellerid' => $sellerid,
    'categoryid' => $categoryid,
    'itemname' => $itemname,
    'itemcondition' => $itemcondition,
    'itemdescription' => $itemdescription,
    'itempic' => $dest,
    'itemprice' => $itemprice,
    'itemstatus' => $itemstatus,
]);

if ($insertOneResult->getInsertedCount() > 0) {
?>
    <script>
        alert("item available for sale. Thanks !");
        location.replace('index.php');
    </script>
<?php
} else {
?>
    <script>
        alert("SORRY ! unable to process the request");
        location.replace('index.php');
    </script>
<?php
}
?>