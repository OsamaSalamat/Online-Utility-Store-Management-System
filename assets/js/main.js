/**
 * Online Store - Client-side validation and UI helpers
 */

document.addEventListener('DOMContentLoaded', function () {

    // Registration form validation
    const registerForm = document.getElementById('registerForm');
    if (registerForm) {
        registerForm.addEventListener('submit', function (e) {
            clearErrors(registerForm);

            let valid = true;

            const fullName = document.getElementById('full_name');
            const email = document.getElementById('email');
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('confirm_password');

            if (fullName.value.trim().length < 3) {
                showError(fullName, 'Full name must be at least 3 characters.');
                valid = false;
            }

            if (!isValidEmail(email.value.trim())) {
                showError(email, 'Please enter a valid email address.');
                valid = false;
            }

            if (password.value.length < 6) {
                showError(password, 'Password must be at least 6 characters.');
                valid = false;
            }

            if (password.value !== confirmPassword.value) {
                showError(confirmPassword, 'Passwords do not match.');
                valid = false;
            }

            if (!valid) {
                e.preventDefault();
            }
        });
    }

    // Login form validation
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', function (e) {
            clearErrors(loginForm);

            let valid = true;

            const email = document.getElementById('email');
            const password = document.getElementById('password');

            if (!isValidEmail(email.value.trim())) {
                showError(email, 'Please enter a valid email address.');
                valid = false;
            }

            if (password.value.length === 0) {
                showError(password, 'Password is required.');
                valid = false;
            }

            if (!valid) {
                e.preventDefault();
            }
        });
    }

    // Search form - require at least category or keyword
    const searchForm = document.getElementById('searchForm');
    if (searchForm) {
        searchForm.addEventListener('submit', function (e) {
            const category = document.getElementById('category_id');
            const keyword = document.getElementById('keyword');

            if (parseInt(category.value) === 0 && keyword.value.trim() === '') {
                e.preventDefault();
                alert('Please select a category or enter a keyword to search.');
            }
        });
    }

    // Auto-dismiss flash alerts after 5 seconds
    const alerts = document.querySelectorAll('.alert-success');
    alerts.forEach(function (alert) {
        setTimeout(function () {
            alert.style.transition = 'opacity 0.5s';
            alert.style.opacity = '0';
            setTimeout(function () {
                alert.remove();
            }, 500);
        }, 5000);
    });
});

function isValidEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function showError(input, message) {
    input.classList.add('error');
    const errorEl = document.createElement('div');
    errorEl.className = 'field-error';
    errorEl.textContent = message;
    input.parentNode.appendChild(errorEl);
}

function clearErrors(form) {
    form.querySelectorAll('.error').forEach(function (el) {
        el.classList.remove('error');
    });
    form.querySelectorAll('.field-error').forEach(function (el) {
        el.remove();
    });
}
