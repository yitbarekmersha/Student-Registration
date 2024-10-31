document.getElementById('registrationForm').addEventListener('submit', function (event) {
    const fullName = document.getElementById('fullName').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;

    // Clear previous error messages
    document.getElementById('nameError').innerText = '';
    document.getElementById('emailError').innerText = '';
    document.getElementById('phoneError').innerText = '';

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

