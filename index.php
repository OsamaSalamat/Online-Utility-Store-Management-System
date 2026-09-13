<?php
$pageTitle = 'Home';
require_once 'includes/header.php';
require_once 'config/database.php';

$conn = getConnection();
$result = $conn->query('SELECT COUNT(*) AS total FROM categories');
$categoryCount = $result->fetch_assoc()['total'];
$result = $conn->query('SELECT COUNT(*) AS total FROM products');
$productCount = $result->fetch_assoc()['total'];
$conn->close();
?>

<section class="hero">
    <h1>Welcome to Online Utility Store</h1>
    <p>Customer Module - CS619 Prototype Assignment</p>
    <div class="hero-actions">
        <?php if (!isLoggedIn()): ?>
            <a href="register.php" class="btn btn-primary btn-lg">Create Account</a>
            <a href="login.php" class="btn btn-outline btn-lg">Login</a>
        <?php else: ?>
            <a href="products.php" class="btn btn-primary btn-lg">Browse Products</a>
        <?php endif; ?>
    </div>
</section>

<section class="features">
    <div class="feature-card">
        <div class="feature-icon">1</div>
        <h3>Customer Registration</h3>
        <p>Create your account with name, email, phone, and address to start shopping.</p>
        <a href="register.php" class="link">Register Now &rarr;</a>
    </div>
    <div class="feature-card">
        <div class="feature-icon">2</div>
        <h3>Customer Login</h3>
        <p>Secure login with email and password. Session-based authentication.</p>
        <a href="login.php" class="link">Login Here &rarr;</a>
    </div>
    <div class="feature-card">
        <div class="feature-icon">3</div>
        <h3>Search by Category</h3>
        <p>Find products quickly by selecting a category from our catalog.</p>
        <a href="products.php" class="link">Search Products &rarr;</a>
    </div>
</section>

<section class="stats">
    <div class="stat-item">
        <span class="stat-number"><?= (int) $categoryCount ?></span>
        <span class="stat-label">Categories</span>
    </div>
    <div class="stat-item">
        <span class="stat-number"><?= (int) $productCount ?></span>
        <span class="stat-label">Products</span>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
