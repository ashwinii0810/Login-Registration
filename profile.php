<?php
// connect to MongoDB database
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
// get session variable from localstorage
$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : "";
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
$result = $manager->executeBulkWrite('mydb.profiles', $bulk);
if($result){
    echo "success"; // return success message to AJAX call
}

    else
{
    echo "Insert operation failed: " . $result->getWriteErrors()[0]->getMessage();
}

?>
