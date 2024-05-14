<?php
include 'dbcon.php';
session_start();
if (isset($_SESSION['username'])) {

    $itemid = (int)$_GET['itemid'];
    $likerid = (int)$_SESSION['userid'];
    $count = $likes->count(['itemid' => $itemid, 'likerid' => $likerid]);

    if ($count == 0) {
        // not liked before
        $insertOneResult = $likes->insertOne([
            'itemid' => $itemid,
            'likerid' => $likerid
        ]);
?>
        <script>
            window.history.back();
            // location.replace('index.php');
        </script>

    <?php
    } else {
        // liked before
        $deleteResult = $likes->deleteOne(['itemid' => $itemid, 'likerid' => $likerid]);

    ?>
        <script>
            window.history.back();
            // location.replace('index.php');
        </script>

    <?php
    }
} else {
    ?>
    <script>
        alert("Please login to like any product");
        location.replace('index.php');
    </script>
<?php
}
?>