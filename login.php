<?php
// connect to MySQL database using PDO
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydbpdo";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // prepare statement to retrieve data from database
    $stmt = $conn->prepare("SELECT * FROM users WHERE email=:email AND password=:password");
    // bind parameters to statement
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    // get data from form submission
    $email = $_POST['email'];
    $password = $_POST['password'];
    // execute statement
    $stmt->execute();
    $result = $stmt->fetchAll();
    if(count($result) > 0){
        session_start(); // start session
        //$_SESSION['user_id'] = $result[0]['id']; // set session variable
        echo "success"; // return success message to AJAX call
    }
    else{
        echo "failure"; // return failure message to AJAX call
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null; // close database connection
?>
