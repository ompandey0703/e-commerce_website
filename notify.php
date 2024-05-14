<?php
include 'dbcon.php'; // Include your database connection // Start the session

// Check if the user is logged in
if (!isset($_GET['username'])) {
    // Redirect the user to the login page or handle the situation accordingly
    header("Location: userlogin.php");
    exit(); // Stop further execution
}

// Now you can safely access $_SESSION['username'] as the user is logged in

// Fetch the seller's username from the session
$sellerUsername = $_GET['username'];

// Query the users collection to find the seller's information
$seller = $users->findOne(['username' => $sellerUsername]);

// Get the seller's ID from the fetched data
$sellerid = $seller['userid'];


// Query the items collection to find items listed by the seller
$sellerItems = $items->find(['sellerid' => $sellerid]);

// Array to store item IDs listed by the seller
$itemIds = [];

foreach ($sellerItems as $item) {
    $itemIds[] = $item['itemid'];
}

// Query the BUYREQUEST collection to find requests for the seller's items
$buyRequests = $buyrequest->find(['itemid' => ['$in' => $itemIds]]);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-yYg5V3gDZRk5IVZsFLJznig3FRvPEc6cJq8oE+WFsnqu2G9IbbV7t0GbhRYdLlT+" crossorigin="anonymous">
    <!-- Custom CSS -->
    <style>
        /* Custom Styles */
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .notification-message {
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: 10px;
            margin-bottom: 20px;
            padding: 20px;
        }

        .notification-header {
            background-color: #ff6b6b;
            color: #fff;
            padding: 10px;
            border-radius: 10px 10px 0 0;
            margin-bottom: 10px;
        }

        .notification-body {
            color: #333;
            margin-bottom: 10px;
        }

        h3 {
            color: #ff6b6b;
            margin-bottom: 10px;
            margin-left: 40%;
            font-size: 10vh;
        }

        .btn-go-back {
            background-color: #ff4c68;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 50%;
            margin-top: 20%;
            transition: background-color 0.3s ease;

        }

        .btn {
            margin-top: 5%;
            margin-bottom: 5%;

        }

        .btn-go-back:hover {
            background-color: #ff6b6b;
        }
    </style>
</head>

<body>
    <div class="container">
        <h3 margin-left:50px>Notifications</h3>
        <?php foreach ($buyRequests as $request) : ?>
            <?php
            $itemid = $request['itemid'];
            // Fetch item details from the items collection
            $item = $items->findOne(['itemid' => $itemid]);
            $itemName = $item['itemname'];
            // Fetch buyer details from the users collection
            $buyerid = $request['customerid'];
            $buyer = $users->findOne(['userid' => $buyerid]);
            $buyerName = $buyer['username'];
            $buyerEmail = $buyer['useremail'];
            ?>
            <!-- Notification Message -->
            <div class="notification-message">

                <div class="notification-header">
                    New Buyer
                </div>
                <div class="notification-body">
                    <h4> <strong>Item:</strong> <?php echo $itemName; ?></h4>
                    <p><strong>Buyer:</strong> <?php echo $buyerName; ?></p>
                    <p><strong>Email:</strong> <?php echo $buyerEmail; ?></p>
                    <p>Contact the buyer for further details.</p>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="text-center btn" margin-left:0%>
            <a href="index.php" class="btn btn-go-back">Go Back</a>
        </div>
    </div>
    </div>
</body>

</html>