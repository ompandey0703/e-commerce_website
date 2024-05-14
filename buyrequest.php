<?php
include 'dbcon.php';
session_start();
$itemid = (int)$_GET['itemid'];

$r = $items->findOne(['itemid' => $itemid]);

$sellerid = $r['sellerid'];

$seller = $users->findOne(['userid' => $sellerid]);

if (isset($_SESSION['userid'])) {
    if ($r['itemstatus'] == "available") {
        // process the request
        $customerid = (int)$_SESSION['userid'];

        $insertOneResult = $buyrequest->insertOne([
            'customerid' => $customerid,
            'itemid' => $itemid,
        ]);

        if ($insertOneResult->getInsertedCount() > 0) {
?>
            <script>
                alert("your request has been recorded. Request again if you didn't receive the confirmation mail from us.");
            </script>
            <?php
            // send a confirmation-mail to buyer
            $username = $_SESSION['username'];
            $item = $r['itemname'];
            $selleremail = $seller['useremail'];

            $to = $_SESSION['useremail'];
            $from = "From: toshitpant0808@gmail.com";
            $subject = "purchase request generated";
            $body = "hello $username your request for ( $item ) has been recorded. You can contact to seller. Contact details are as follows ; Email: $selleremail . We have also sent your mail id to the seller. In case of any problem, feel free to contact us. Our mail id and helpline numbers are mentioned in Contact Us page. Thank You !";
            mail($to, $subject, $body, $from);

            // send a mail to seller
            $sellername = $seller['username'];
            $buyeremail = $_SESSION['useremail'];


            $to2 = $seller['useremail'];
            $from2 = "From: toshitpant0808@gmail.com";
            $subject2 = "buy request";
            $body2 = "hello $sellername, someone is interested in buying your ( $item ). You can contact to buyer. Contact details are as follows ; Email: $buyeremail . We have also sent your mail id to the buyer. In case of any problem, feel free to contact us. Our mail id and helpline numbers are mentioned in Contact Us page. Thank You !";
            mail($to2, $subject2, $body2, $from2);

            // redirect to view more
            ?>
            <script>
                location.replace('viewmore.php?itemid=<?php echo $itemid; ?>');
            </script>
        <?php


        } else {
        ?>
            <script>
                alert("Sorry ! we are unable to process the request. Please logout and try again.");
                location.replace('index.php');
            </script>
        <?php
        }
    } else {
        ?>
        <script>
            alert("Sorry ! this item is not available.");
            location.replace('viewmore.php?itemid=<?php echo $itemid; ?>');
        </script>
    <?php
    }
} else {
    // please login first
    ?>
    <script>
        alert("please login to buy any product");
        location.replace('index.php');
    </script>
<?php
}

?>