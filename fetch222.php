<?php
require 'vendor/autoload.php'; // Load MongoDB library
require 'dbcon.php';
// Fetch data from MongoDB
$users = $collection_toshit->find();

echo "<h2>User Details</h2>";
foreach ($users as $user) {
  echo "Name: " . $user['name'] . "<br>";
  echo "Email: " . $user['email'] . "<br><br>";
}





// new chatgpt

$userid = 3; // The user ID you want to find

$user = $collection_toshit->findOne(['userid' => $userid]);

if ($user) {
  echo "<h2>User Details</h2>";
  echo "Name: " . $user['name'] . "<br>";
  echo "Email: " . $user['email'] . "<br><br>";
} else {
  echo "User not found.";
}
