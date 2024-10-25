<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Student Registration</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">
    <h2>Student Registration Form</h2>
    <form id="registrationForm" method="POST" action="">
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
        <button type="submit">Submit</button>
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
        <div class="result">
            <h3>Submitted Information</h3>
            <p><strong>Full Name:</strong> <?php echo htmlspecialchars($_POST['fullName']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($_POST['email']); ?></p>
            <p><strong>Phone Number:</strong> <?php echo htmlspecialchars($_POST['phone']); ?></p>
            <p><strong>Gender:</strong> <?php echo htmlspecialchars($_POST['gender']); ?></p>
            <p><strong>Field of Study:</strong> <?php echo htmlspecialchars($_POST['fieldOfStudy']); ?></p>
        </div>
    <?php endif; ?>
</div>

<script src="script.js"></script>

</body>
</html>
