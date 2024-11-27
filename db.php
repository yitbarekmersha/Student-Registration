<?php
// db.php - Database connection file

$servername = "localhost"; // your database host, typically localhost
$username = "root";        // your database username
$password = "";            // your database password
$dbname = "student_registration"; // name of your database

// Create a connection to the MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    
    // Execute the query
    if ($stmt->execute()) {
        echo "Student registered successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
