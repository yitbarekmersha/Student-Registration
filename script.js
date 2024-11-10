// script.js
document.getElementById('registrationForm').addEventListener('submit', function (event) {
    const fullName = document.getElementById('fullName').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;

    // Clear previous error messages
    document.getElementById('nameError').innerText = '';
    document.getElementById('emailError').innerText = '';
    document.getElementById('phoneError').innerText = '';
/*const errorMessages = document.querySelectorAll(".error-message");
        errorMessages.forEach(message => message.textContent = "");
    */
    let isValid = true;
    
    // Validation
    if (!/^[A-Za-z\s]+$/.test(fullName)) {
        document.getElementById('nameError').innerText = 'Please enter a valid full name.';
        isValid = false;
    }

    if (!/^\S+@\S+\.\S+$/.test(email)) {
        document.getElementById('emailError').innerText = 'Please enter a valid email address.';
        isValid = false;
    }

    if (!/^\d+$/.test(phone)) {
        document.getElementById('phoneError').innerText = 'Please enter a valid phone number.';
        isValid = false;
    }

    // If invalid, prevent form submission
    if (!isValid) {
        event.preventDefault();
    }
});

function showSignUp() {
    document.getElementById('signUpForm').style.display = 'block';
    document.getElementById('loginForm').style.display = 'none';
}

function showLogin() {
    document.getElementById('signUpForm').style.display = 'none';
    document.getElementById('loginForm').style.display = 'block';
}

// Validating sign-up form before submission
document.getElementById('signup').onsubmit = function (event) {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    let valid = true;

    // Validate username (alphanumeric, min 5 chars)
    const usernameRegex = /^[a-zA-Z0-9]{5,}$/;
    if (!usernameRegex.test(username)) {
        document.getElementById('usernameError').textContent = 'Username must be alphanumeric and at least 5 characters long.';
        valid = false;
    } else {
        document.getElementById('usernameError').textContent = '';
    }

    // Validate password (contains letters, numbers, special chars)
    const passwordRegex = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if (!passwordRegex.test(password)) {
        document.getElementById('passwordError').textContent = 'Password must contain at least one letter, one number, and one special character.';
        valid = false;
    } else {
        document.getElementById('passwordError').textContent = '';
    }

    // Password confirmation
    if (password !== confirmPassword) {
        document.getElementById('confirmPasswordError').textContent = 'Passwords do not match.';
        valid = false;
    } else {
        document.getElementById('confirmPasswordError').textContent = '';
    }

    if (!valid) event.preventDefault();
};

// Validating login form
document.getElementById('login').onsubmit = function (event) {
    const username = document.getElementById('loginUsername').value;
    const password = document.getElementById('loginPassword').value;
    // Add additional validation as needed (e.g., check for empty fields)
    if (!username || !password) {
        event.preventDefault();
        alert('Please enter both username and password.');
    }
};



function showSignUp() {
    document.getElementById('signUpForm').style.display = 'block';
    document.getElementById('loginForm').style.display = 'none';
}

function showLogin() {
    document.getElementById('signUpForm').style.display = 'none';
    document.getElementById('loginForm').style.display = 'block';
}

// Validating sign-up form before submission
document.getElementById('signup').onsubmit = function (event) {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    let valid = true;

    // Validate username (alphanumeric, min 5 chars)
    const usernameRegex = /^[a-zA-Z0-9]{5,}$/;
    if (!usernameRegex.test(username)) {
        document.getElementById('usernameError').textContent = 'Username must be alphanumeric and at least 5 characters long.';
        valid = false;
    } else {
        document.getElementById('usernameError').textContent = '';
    }

    // Validate password (contains letters, numbers, special chars)
    const passwordRegex = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if (!passwordRegex.test(password)) {
        document.getElementById('passwordError').textContent = 'Password must contain at least one letter, one number, and one special character.';
        valid = false;
    } else {
        document.getElementById('passwordError').textContent = '';
    }

    // Password confirmation
    if (password !== confirmPassword) {
        document.getElementById('confirmPasswordError').textContent = 'Passwords do not match.';
        valid = false;
    } else {
        document.getElementById('confirmPasswordError').textContent = '';
    }

    if (!valid) event.preventDefault();
};

// Validating login form
document.getElementById('login').onsubmit = function (event) {
    const username = document.getElementById('loginUsername').value;
    const password = document.getElementById('loginPassword').value;
    // Add additional validation as needed (e.g., check for empty fields)
    if (!username || !password) {
        event.preventDefault();
        alert('Please enter both username and password.');
    }
};







