<?php
// Include your database connection
include 'dbcon.php';

// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect the user to the login page or handle the situation accordingly
    header("Location: userlogin.php");
    exit(); // Stop further execution
}

// Fetch the current user's ID
$userUsername = $_SESSION['username'];
$user = $users->findOne(['username' => $userUsername]);
$userId = $user['userid'];

// Use aggregation to fetch distinct user IDs from messages where the current user is either the sender or receiver
$pipeline = [
    ['$match' => ['$or' => [['senderid' => $userId], ['receiverid' => $userId]]]],
    ['$group' => ['_id' => null, 'senderIds' => ['$addToSet' => '$senderid'], 'receiverIds' => ['$addToSet' => '$receiverid']]],
    ['$project' => ['_id' => 0, 'userIds' => ['$setUnion' => ['$senderIds', '$receiverIds']]]]
];
$result = $messages->aggregate($pipeline)->toArray();

// Extract distinct user IDs from the result
$distinctUserIds = [];
if (!empty($result)) {
    $distinctUserIds = $result[0]['userIds'];
}

// Fetch details of users with whom the current user has conversations
$conversationUsers = $users->find(['userid' => ['$in' => $distinctUserIds]]);

// Check if the form is submitted for sending a message
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['receiver']) && isset($_POST['message'])) {
    // Get the receiver's username and message from the form
    $receiverUsername = $_POST['receiver'];
    $messageText = $_POST['message'];

    // Find the receiver's ID from the database
    $receiver = $users->findOne(['username' => $receiverUsername]);
    if ($receiver) {
        $receiverId = $receiver['userid'];

        // Insert the message into the database
        $messageData = [
            'senderid' => $userId,
            'receiverid' => $receiverId,
            'message' => $messageText,
            'timestamp' => time() // You can use MongoDB's ObjectId or any other timestamp format
        ];
        $messages->insertOne($messageData);

        // Reload the page after form submission
        echo "<script>window.location.href = 'inbox.php';</script>";
        exit();
    } else {
        echo "<script>alert('Recipient username does not exist. Please enter a valid username.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inbox</title>
    <!-- Bulma CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <!-- Custom CSS -->
    <style>
        /* Custom Styles */
        body {
            background-color: #ff7e5f;
            /* Pink-Orange */
            font-family: 'Roboto', sans-serif;
            /* Optional: Use Google Fonts */
        }

        .conversation-list-item {
            cursor: pointer;
            padding: 10px;
            border-bottom: 1px solid #fff;
            /* White */
        }

        .conversation-list-item:hover {
            background-color: #ff9f7e;
            /* Lighter Pink-Orange */
        }

        .send-message-form {
            border: 1px solid #fff;
            /* White */
            padding: 20px;
            border-radius: 10px;
        }

        .send-message-form .button.is-primary {
            background-color: #ff6b3e;
            /* Darker Pink-Orange */
            border-color: #ff6b3e;
            /* Darker Pink-Orange */
            transition: background-color 0.3s ease;
            /* Right margin set to auto for centering */
        }

        .send-message-form .button.is-primary:hover {
            background-color: #ff5126;
            /* Darker Orange on Hover */
            border-color: #ff5126;
            /* Darker Orange on Hover */
        }

        .send-message-form .button.is-danger {
            margin-top: 20px;
            /* Margin for the "Go Back" button */
        }
    </style>
</head>

<body>
    <section class="section">
        <div class="container">
            <h2 class="title has-text-centered has-text-white">Inbox</h2>
            <div class="columns">
                <div class="column is-half">
                    <h4 class="subtitle has-text-white">Conversations</h4>
                    <ul class="conversation-list">
                        <?php foreach ($conversationUsers as $conversationUser) : ?>
                            <li class="conversation-list-item" onclick="openConversation('<?php echo $conversationUser['username']; ?>')">
                                <?php echo $conversationUser['username']; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="column is-half">
                    <h4 class="subtitle has-text-white">Send Message</h4>
                    <div class="send-message-form">
                        <form id="sendMessageForm" action="" method="post">
                            <div class="field">
                                <label class="label has-text-white">Recipient Username:</label>
                                <div class="control">
                                    <input class="input" type="text" name="receiver" required>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label has-text-white">Message:</label>
                                <div class="control">
                                    <textarea class="textarea" name="message" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control has-text-centered">
                                    <button type="submit" class="button is-primary">Send</button>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control has-text-centered">
                                    <a href="index.php" class="button is-danger">Go Back</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function openConversation(username) {
            // Redirect to conversation page with the selected user
            window.location.href = `conversation.php?user=${username}`;
        }
    </script>
</body>

</html>