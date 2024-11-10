
<?php
session_start();
include('db.php');  // Include the database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validation: Check if username is valid (alphanumeric, min 5 characters)
    if (!preg_match('/^[a-zA-Z0-9]{5,}$/', $username)) {
        echo "Username must be alphanumeric and at least 5 characters. please go back fix it";
        exit();
    }

    // Validation: Check if password is valid (contains letters, numbers, special characters)
    if (!preg_match('/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) {
        echo "Password must contain at least one letter, one number, and one special character.please go back fix it";
        exit();
    }

    // Check if passwords match
    if ($password !== $confirmPassword) {
      echo "Passwords do not match.please go back fix it";
        exit();
    }

    // Hash the password before storing it
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Insert user data into the database
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";

    if (mysqli_query($conn, $sql)) {
        echo"Registration successful! Please go back and login";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
}
?>
