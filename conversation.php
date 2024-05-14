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

// Get the receiver's username from the URL parameter
if (isset($_GET['user'])) {
    $receiverUsername = $_GET['user'];
} else {
    header("Location: inbox.php"); // Redirect to inbox if username not provided
    exit();
}

// Fetch the receiver's ID
$receiver = $users->findOne(['username' => $receiverUsername]);
if ($receiver) {
    $receiverId = $receiver['userid'];
} else {
    echo "<script>alert('Recipient username does not exist.');</script>";
    exit();
}

// Fetch messages exchanged between the current user and the receiver and sort by timestamp
$messagesCursor = $messages->find([
    '$or' => [
        ['$and' => [['senderid' => $userId], ['receiverid' => $receiverId]]],
        ['$and' => [['senderid' => $receiverId], ['receiverid' => $userId]]]
    ]
], ['sort' => ['timestamp' => 1]]);

// Check if the form is submitted for sending a message
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['message'])) {
    $messageText = $_POST['message'];

    // Insert the message into the database
    $messageData = [
        'senderid' => $userId,
        'receiverid' => $receiverId,
        'message' => $messageText,
        'timestamp' => time()
    ];
    $messages->insertOne($messageData);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inbox: <?php echo $receiverUsername; ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-yYg5V3gDZRk5IVZsFLJznig3FRvPEc6cJq8oE+WFsnqu2G9IbbV7t0GbhRYdLlT+" crossorigin="anonymous">
    <!-- Custom CSS -->
    <style>
        /* Custom Styles */
        body {
            background-color: #ffd6ba;
            /* Light orange */
        }

        .heading {
            text-align: center;
        }

        .container {
            margin-top: 50px;
        }

        .message-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ff7b9c;
            /* Pink */
            border-radius: 10px;
            background-color: #ffe0f0;
            /* Light pink */
        }

        .message {
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
            max-width: 70%;
            /* Adjust as needed */
        }

        .message.sent {
            background-color: #ff7b9c;
            /* Pink */
            color: #fff;
            /* White text for sender */
            align-self: flex-end;
        }

        .message.received {
            background-color: #ff9671;
            /* Orange */
            color: #fff;
            /* White text for receiver */
            align-self: flex-start;
            margin-right: 0;
            margin-left: 27%;
        }

        .input-group {
            margin-left: 31%;
            margin-bottom: 20px;
            display: block;

        }

        .input-group textarea {
            height: 30px;
            border-radius: 10px;
            font-size: 20px;

        }

        .form-control {
            width: 50%;
            height: 120px;
            /* Increased height */
        }

        .send-button,
        .back-button {
            width: 200px;
            margin: 10px auto;
            /* Adjusted margin */
            display: block;
            background-color: #ff7b9c;
            /* Pink */
            border-color: #ff7b9c;
            /* Pink */
            border-radius: 10px;
            height: 30px;
        }

        .send-button:hover,
        .back-button:hover {
            background-color: #ff639c;
            /* Darker pink on hover */
            border-color: #ff639c;
            /* Darker pink on hover */
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="heading">Inbox: <?php echo $receiverUsername; ?></h2>
        <div class="message-container" id="message-container">
            <?php foreach ($messagesCursor as $message) : ?>
                <div class="message <?php echo ($message['senderid'] == $userId) ? 'sent' : 'received'; ?>">
                    <?php echo $message['message']; ?>
                </div>
            <?php endforeach; ?>
        </div>
        <form id="message-form" action="" method="post">
            <div class="input-group">
                <textarea class="form-control" placeholder="Type your message" name="message" required></textarea>
            </div>
            <button class="btn btn-primary send-button" type="submit">Send</button>
        </form>
        <form action="inbox.php">
            <button class="btn btn-secondary back-button" type="submit">Back to Inbox</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Function to load messages without page reload
        function loadMessages() {
            $.ajax({
                url: window.location.href,
                cache: false,
                success: function(data) {
                    $('#message-container').html($(data).find('#message-container').html());
                }
            });
        }

        // Submit message form via AJAX
        $('#message-form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function() {
                    $('#message-form')[0].reset(); // Clear the form
                    loadMessages(); // Reload messages
                }
            });
        });

        // Load messages initially
        $(document).ready(function() {
            loadMessages();
        });

        // Set interval to periodically load messages
        setInterval(function() {
            loadMessages();
        }, 5000); // Adjust the interval as needed
    </script>
</body>

</html>