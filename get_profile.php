<?php
// connect to MongoDB database
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
// get session variable from localstorage
$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : "";

// prepare query to fetch user profile
$filter = ['user_id' => $user_id];
$options = [];
$query = new MongoDB\Driver\Query($filter, $options);
// execute query to fetch user profile
$cursor = $manager->executeQuery('mydb.profiles', $query);
$profile = $cursor->toArray()[0];

echo json_encode($profile);
?>
