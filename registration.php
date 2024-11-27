<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    // If not logged in, redirect to login page
    header("Location: login.php");
    exit();
}

// If the user is logged in, display the registration form
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Student Registration and File/Directory Management</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">
    <h2>Student Registration Form </br> PART 1</h2>
    <form id="registrationForm" method="POST" action="" enctype="multipart/form-data">
        <div class="form-group">
            <label for="fullName">Full Name</label>
            <input type="text" id="fullName" name="fullName" required>
            <div class="error" id="nameError"></div>
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" required>
            <div class="error" id="emailError"></div>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" id="phone" name="phone" required>
            <div class="error" id="phoneError"></div>
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <select id="gender" name="gender" required>
                <option value="">Select</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
        <div class="form-group">
            <label for="fieldOfStudy">Field of Study</label>
            <select id="fieldOfStudy" name="fieldOfStudy" required>
                <option value="">Select</option>
                <option value="IT">IT</option>
                <option value="CS">Computer Science</option>
            </select>
        </div>
        <div class="form-group">
            <label for="profilePic">Profile Picture</label>
            <input type="file" id="profilePic" name="profilePic" accept="image/*">
            <div class="error" id="fileError"></div>
        </div>
        <button type="submit">Submit</button>
    </form>

    <?php
    // Handle form submission for student registration
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Registration Form Processing
        if (isset($_POST['fullName']) && isset($_POST['email'])) {
            // Set a cookie for the user's full name
            setcookie('userFullName', $_POST['fullName'], time() + (86400 * 30), "/"); // Expires in 30 days
            echo "<div class='result'>
                    <h3>You have registered successfully!!!<br>Submitted Information</h3>
                    <p><strong>Full Name:</strong> " . htmlspecialchars($_POST['fullName']) . "</p>
                    <p><strong>Email:</strong> " . htmlspecialchars($_POST['email']) . "</p>
                    <p><strong>Phone Number:</strong> " . htmlspecialchars($_POST['phone']) . "</p>
                    <p><strong>Gender:</strong> " . htmlspecialchars($_POST['gender']) . "</p>
                    <p><strong>Field of Study:</strong> " . htmlspecialchars($_POST['fieldOfStudy']) . "</p>";

            // File upload handling for Profile Picture
            if (isset($_FILES['profilePic']) && $_FILES['profilePic']['error'] == 0) {
                $uploadDir = 'uploads/';
                $uploadedFile = $uploadDir . basename($_FILES['profilePic']['name']);

                // Check if the file is a valid image
                if (getimagesize($_FILES['profilePic']['tmp_name'])) {
                    // Move the uploaded file to the server
                    if (move_uploaded_file($_FILES['profilePic']['tmp_name'], $uploadedFile)) {
                        echo "<p><strong>Profile Picture:</strong> <img src='$uploadedFile' alt='Profile Picture' width='100'></p>";
                    } else {
                        echo "<p class='error'>Sorry, there was an error uploading your file.</p>";
                    }
                } else {
                    echo "<p class='error'>Please upload a valid image file.</p>";
                }
            }
            echo "</div>";
        }
// Directory Management: Create Directory
if (isset($_POST['createDirectory'])) {
    $dirName = $_POST['newDirName'];
    if (!empty($dirName) && !is_dir($dirName)) {
        mkdir($dirName, 0777);
        echo "<p>Directory '$dirName' created successfully.</p>";
    } else {
        echo "<p>Directory creation failed. Please check the directory name.</p>";
    }
}

// Directory Management: Rename Directory
if (isset($_POST['renameDirectory'])) {
    $oldDirName = $_POST['oldDirName'];
    $newDirName = $_POST['newDirName'];
    if (is_dir($oldDirName) && !is_dir($newDirName)) {
        rename($oldDirName, $newDirName);
        echo "<p>Directory '$oldDirName' renamed to '$newDirName' successfully.</p>";
    } else {
        echo "<p>Renaming failed. Please check the directory names.</p>";
    }
}

// Directory Management: Delete Directory
if (isset($_POST['deleteDirectory'])) {
    $dirToDelete = $_POST['deleteDirName'];
    if (is_dir($dirToDelete)) {
        rmdir($dirToDelete);
        echo "<p>Directory '$dirToDelete' deleted successfully.</p>";
    } else {
        echo "<p>Directory deletion failed. The directory may not exist.</p>";
    }
}
// File Management: Upload File
if (isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] == 0) {
    $uploadDir = 'files/';
    $uploadedFile = $uploadDir . basename($_FILES['fileToUpload']['name']);
    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadedFile)) {
        echo "<p>File uploaded successfully: $uploadedFile</p>";
    } else {
        echo "<p>Error uploading file.</p>";
    }
}

// File Management: Write to File
if (isset($_POST['writeToFile'])) {
    $fileName = $_POST['fileName'];
    $content = $_POST['fileContent'];
    if (file_put_contents($fileName, $content) !== false) {
        echo "<p>Content written to file '$fileName'.</p>";
    } else {
        echo "<p>Failed to write to file '$fileName'.</p>";
    }
}

// File Management: Read from File
if (isset($_POST['readFile'])) {
    $fileName = $_POST['fileName'];
    if (file_exists($fileName)) {
        $content = file_get_contents($fileName);
        echo "<p>Content of '$fileName':<br><pre>$content</pre></p>";
    } else {
        echo "<p>File '$fileName' not found.</p>";
    }
}

// File Management: Rename File
if (isset($_POST['renameFile'])) {
    $oldName = $_POST['oldFileName'];
    $newName = $_POST['newFileName'];
    if (file_exists($oldName)) {
        if (rename($oldName, $newName)) {
            echo "<p>File renamed from '$oldName' to '$newName'.</p>";
        } else {
            echo "<p>Failed to rename file.</p>";
        }
    } else {
        echo "<p>File '$oldName' does not exist.</p>";
    }
}

// File Management: Delete File
if (isset($_POST['deleteFile'])) {
    $fileName = $_POST['deleteFileName'];
    if (file_exists($fileName)) {
        if (unlink($fileName)) {
            echo "<p>File '$fileName' deleted successfully.</p>";
        } else {
            echo "<p>Failed to delete file '$fileName'.</p>";
        }
    } else {
        echo "<p>File '$fileName' not found.</p>";
    }
}
// Display the user's full name from the cookie if available
if (isset($_COOKIE['userFullName'])) {
echo "<p>Welcome back, " . $_COOKIE['userFullName'] . "!</p>";
}
}
?>