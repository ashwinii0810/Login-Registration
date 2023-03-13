<?php
// connect to MongoDB database
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

// get user_id and profile data from POST request
$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : "";
$age = isset($_POST['age']) ? $_POST['age'] : "";
$dob = isset($_POST['dob']) ? $_POST['dob'] : "";
$contact = isset($_POST['contact']) ? $_POST['contact'] : "";

// create document to insert into collection
$document = [
    'user_id' => $user_id,
    'age' => $age,
    'dob' => $dob,
    'contact' => $contact
];

// prepare insert command
$bulk = new MongoDB\Driver\BulkWrite();
$insert = $bulk->insert($document);

// execute insert command
try {
    $result = $manager->executeBulkWrite('mydb.profiles', $bulk);
    echo "success";
} catch (Exception $e) {
    echo "Insert operation failed: " . $e->getMessage();
}
?>
