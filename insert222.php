<?php
require 'vendor/autoload.php'; // Load MongoDB library
require 'dbcon.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Insert data into MongoDB
    $insertOneResult = $collection_toshit->insertOne([
        'name' => $name,
        'email' => $email,
    ]);

    echo "User details inserted successfully!";
}
