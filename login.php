<?php
$pageTitle = 'Login';
require_once 'includes/header.php';
require_once 'config/database.php';

$errors = [];
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($email === '') {
        $errors[] = 'Email is required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address.';
    }

    if ($password === '') {
        $errors[] = 'Password is required.';
    }

    if (empty($errors)) {
        $conn = getConnection();

        $stmt = $conn->prepare('SELECT customer_id, full_name, email, password FROM customers WHERE email = ?');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            if (password_verify($password, $row['password'])) {
                $_SESSION['customer_id'] = $row['customer_id'];
                $_SESSION['customer_name'] = $row['full_name'];
                $_SESSION['customer_email'] = $row['email'];

                setFlash('success', 'Welcome back, ' . $row['full_name'] . '!');
                redirect('products.php');
            } else {
                $errors[] = 'Invalid email or password.';
            }
        } else {
            $errors[] = 'Invalid email or password.';
        }

        $stmt->close();
        $conn->close();
    }
}
?>

<section class="auth-section">
    <div class="auth-card">
        <h2>Customer Login</h2>
        <p class="auth-subtitle">Sign in to your account</p>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-error">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= sanitize($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" action="login.php" id="loginForm" novalidate>
            <div class="form-group">
                <label for="email">Email Address *</label>
                <input type="email" id="email" name="email"
                       value="<?= sanitize($email) ?>"
                       placeholder="Enter your email" required>
            </div>

            <div class="form-group">
                <label for="password">Password *</label>
                <input type="password" id="password" name="password"
                       placeholder="Enter your password" required>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>

        <p class="auth-footer">
            Don't have an account? <a href="register.php">Register here</a>
        </p>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
