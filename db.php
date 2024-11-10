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
?>
