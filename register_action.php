<?php
require_once 'config.php';

// Get the input data
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Check if the username or email already exists
$stmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
$stmt->bind_param("ss", $username, $email);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0){
	$response = array(
		'status' => 'error',
		'message' => 'Username or email already exists.'
	);
}else{
	// Hash the password
	$password_hash = password_hash($password, PASSWORD_DEFAULT);

	// Insert the user into the database
	$stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
	$stmt->bind_param("sss", $username, $email, $password_hash);
	$stmt->execute();

	$response = array(
		'status' => 'success',
		'message' => 'User registered successfully.'
	);
}

echo json_encode($response);
?>
