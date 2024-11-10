<?php
session_start();
include('db.php');  // Include the database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // Fetch the user data from the database
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // User found
        $user = mysqli_fetch_assoc($result);
        
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Password is correct, start session
            $_SESSION['loggedIn'] = true;
            $_SESSION['username'] = $user['username'];  // Store username in session
            
            // Redirect to registration page (or any protected page)
            header("Location: registration.php");
            exit();
        } else {
            echo "Incorrect password. please go back and make it correct!";
        }
    } else {
        echo "No user found with that username.please go back and set correct user name and password";
    }

    // Close the connection
    mysqli_close($conn);
}
?>
