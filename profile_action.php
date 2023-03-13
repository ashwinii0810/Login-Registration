<?php
require_once 'config.php';
require_once 'vendor/autoload.php';

use MongoDB\Client;

// Get the input data
$age = $_POST['age'];
$dob = $_POST['dob'];
$contact = $_POST['contact'];

// Get the user ID from the session
$user_id = $_SESSION['user_id'];

// Update the user profile in MySQL
$stmt = $conn->prepare("UPDATE users SET age = ?, dob = ?, contact = ? WHERE id = ?");
$stmt->bind_param("sssi", $age, $dob, $contact, $user_id);
$stmt->execute();

// Update the user profile in MongoDB
$client = new Client("mongodb://localhost:27017");
$collection = $client->test->users;
$result = $collection->updateOne(
    ['user_id' => $user_id],
    ['$set' => ['age' => $age, 'dob' => $dob, 'contact' => $contact]],
    ['upsert' => true]
);

if($result->getModifiedCount() == 1 || $result->getUpsertedCount() == 1){
	$response = array(
		'status' => 'success',
		'message' => 'Profile updated successfully.'
	);
} else {
	$response = array(
		'status' => 'error',
		'message' => 'Failed to update profile.'
	);
}

echo json_encode($response);
?>
