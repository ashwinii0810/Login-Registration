<?php
// connect to MySQL database using PDO
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydbpdo";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // check if form fields are not empty
    if(empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])) {
        echo "Please fill out all fields.";
    } else {
        // prepare statement to insert data into database
        $stmt = $conn->prepare("INSERT INTO users (username, email, password)
        VALUES (:username, :email, :password)");
        // bind parameters to statement
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        // get data from form submission
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        // execute statement
        $stmt->execute();
        echo "success"; // return success message to AJAX call
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null; // close database connection
?>
