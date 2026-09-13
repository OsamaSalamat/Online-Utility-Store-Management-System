<?php
$pageTitle = 'Register';
require_once 'includes/header.php';
require_once 'config/database.php';

$errors = [];
$formData = [
    'full_name' => '',
    'email' => '',
    'phone' => '',
    'address' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formData['full_name'] = trim($_POST['full_name'] ?? '');
    $formData['email'] = trim($_POST['email'] ?? '');
    $formData['phone'] = trim($_POST['phone'] ?? '');
    $formData['address'] = trim($_POST['address'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';

    if ($formData['full_name'] === '') {
        $errors[] = 'Full name is required.';
    } elseif (strlen($formData['full_name']) < 3) {
        $errors[] = 'Full name must be at least 3 characters.';
    }

    if ($formData['email'] === '') {
        $errors[] = 'Email is required.';
    } elseif (!filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address.';
    }

    if ($password === '') {
        $errors[] = 'Password is required.';
    } elseif (strlen($password) < 6) {
        $errors[] = 'Password must be at least 6 characters.';
    }

    if ($password !== $confirmPassword) {
        $errors[] = 'Passwords do not match.';
    }

    if (empty($errors)) {
        $conn = getConnection();

        $stmt = $conn->prepare('SELECT customer_id FROM customers WHERE email = ?');
        $stmt->bind_param('s', $formData['email']);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $errors[] = 'This email is already registered. Please login.';
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $insert = $conn->prepare(
                'INSERT INTO customers (full_name, email, password, phone, address) VALUES (?, ?, ?, ?, ?)'
            );
            $insert->bind_param(
                'sssss',
                $formData['full_name'],
                $formData['email'],
                $hashedPassword,
                $formData['phone'],
                $formData['address']
            );

            if ($insert->execute()) {
                setFlash('success', 'Registration successful! Please login with your credentials.');
                redirect('login.php');
            } else {
                $errors[] = 'Registration failed. Please try again.';
            }
            $insert->close();
        }

        $stmt->close();
        $conn->close();
    }
}
?>

<section class="auth-section">
    <div class="auth-card">
        <h2>Customer Registration</h2>
        <p class="auth-subtitle">Create a new account to access the store</p>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-error">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= sanitize($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" action="register.php" id="registerForm" novalidate>
            <div class="form-group">
                <label for="full_name">Full Name *</label>
                <input type="text" id="full_name" name="full_name"
                       value="<?= sanitize($formData['full_name']) ?>"
                       placeholder="Enter your full name" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address *</label>
                <input type="email" id="email" name="email"
                       value="<?= sanitize($formData['email']) ?>"
                       placeholder="Enter your email" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone"
                       value="<?= sanitize($formData['phone']) ?>"
                       placeholder="Enter your phone number">
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" name="address" rows="3"
                          placeholder="Enter your address"><?= sanitize($formData['address']) ?></textarea>
            </div>

            <div class="form-group">
                <label for="password">Password *</label>
                <input type="password" id="password" name="password"
                       placeholder="Minimum 6 characters" required>
            </div>

            <div class="form-group">
                <label for="confirm_password">Confirm Password *</label>
                <input type="password" id="confirm_password" name="confirm_password"
                       placeholder="Re-enter your password" required>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </form>

        <p class="auth-footer">
            Already have an account? <a href="login.php">Login here</a>
        </p>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
