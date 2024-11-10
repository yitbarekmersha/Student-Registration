
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">
    <!-- Sign-up and Login Section -->
    <div class="auth-container">
        <!-- Sign-up Form -->
        <div id="signUpForm">
            <h2>Welcome to student registration system <br>Please Sign Up to continue!</h2>
            <form id="signup" method="POST" action="register.php">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                    <div class="error" id="usernameError"></div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                    <div class="error" id="passwordError"></div>
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" required>
                    <div class="error" id="confirmPasswordError"></div>
                </div>
                <button type="submit">Sign Up</button>
            </form>
            <p>Already have an account? <a href="#" onclick="showLogin()">Login here</a></p>
        </div>

        <!-- Login Form -->
        <div id="loginForm" style="display:none;">
            <h2>Login</h2>
            <form id="login" method="POST" action="login.php">
                <div class="form-group">
                    <label for="loginUsername">Username</label>
                    <input type="text" id="loginUsername" name="username" required>
                    <div class="error" id="loginUsernameError"></div>
                </div>
                <div class="form-group">
                    <label for="loginPassword">Password</label>
                    <input type="password" id="loginPassword" name="password" required>
                    <div class="error" id="loginPasswordError"></div>
                </div>
                <button type="submit">Login</button>
            </form>
            <p>Don't have an account? <a href="#" onclick="showSignUp()">Sign up here</a></p>
        </div>
    </div>

    <!-- Registration Form (only accessible after login) -->
    

<script src="script.js"></script>

</body>
</html>
