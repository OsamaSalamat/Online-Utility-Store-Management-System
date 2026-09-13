<?php
$pageTitle = 'Search Products';
require_once 'includes/header.php';
require_once 'config/database.php';

requireLogin();

$conn = getConnection();

$categoriesResult = $conn->query('SELECT category_id, category_name FROM categories ORDER BY category_name');
$categories = $categoriesResult->fetch_all(MYSQLI_ASSOC);

$selectedCategory = isset($_GET['category_id']) ? (int) $_GET['category_id'] : 0;
$searchKeyword = trim($_GET['keyword'] ?? '');

$products = [];
$selectedCategoryName = '';

if ($selectedCategory > 0 || $searchKeyword !== '') {
    $sql = 'SELECT p.product_id, p.product_name, p.description, p.price, p.stock,
                   c.category_name
            FROM products p
            INNER JOIN categories c ON p.category_id = c.category_id
            WHERE 1=1';
    $params = [];
    $types = '';

    if ($selectedCategory > 0) {
        $sql .= ' AND p.category_id = ?';
        $params[] = $selectedCategory;
        $types .= 'i';

        foreach ($categories as $cat) {
            if ((int) $cat['category_id'] === $selectedCategory) {
                $selectedCategoryName = $cat['category_name'];
                break;
            }
        }
    }

    if ($searchKeyword !== '') {
        $sql .= ' AND (p.product_name LIKE ? OR p.description LIKE ?)';
        $searchTerm = '%' . $searchKeyword . '%';
        $params[] = $searchTerm;
        $params[] = $searchTerm;
        $types .= 'ss';
    }

    $sql .= ' ORDER BY p.product_name';

    $stmt = $conn->prepare($sql);
    if (!empty($params)) {
        $stmt->bind_param($types, ...$params);
    }
    $stmt->execute();
    $result = $stmt->get_result();
    $products = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
}

$conn->close();
?>

<section class="products-section">
    <h2>Search Products by Category</h2>
    <p class="section-subtitle">Select a category or enter a keyword to find products</p>

    <form method="GET" action="products.php" class="search-form" id="searchForm">
        <div class="search-row">
            <div class="form-group">
                <label for="category_id">Category</label>
                <select id="category_id" name="category_id">
                    <option value="0">-- All Categories --</option>
                    <?php foreach ($categories as $cat): ?>
                        <option value="<?= (int) $cat['category_id'] ?>"
                            <?= $selectedCategory === (int) $cat['category_id'] ? 'selected' : '' ?>>
                            <?= sanitize($cat['category_name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="keyword">Keyword (optional)</label>
                <input type="text" id="keyword" name="keyword"
                       value="<?= sanitize($searchKeyword) ?>"
                       placeholder="Search by product name...">
            </div>

            <div class="form-group form-group-btn">
                <label>&nbsp;</label>
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>

    <?php if ($selectedCategory > 0 || $searchKeyword !== ''): ?>
        <div class="results-header">
            <h3>
                Search Results
                <?php if ($selectedCategoryName): ?>
                    in <span class="highlight"><?= sanitize($selectedCategoryName) ?></span>
                <?php endif; ?>
                <?php if ($searchKeyword): ?>
                    for "<span class="highlight"><?= sanitize($searchKeyword) ?></span>"
                <?php endif; ?>
            </h3>
            <span class="result-count"><?= count($products) ?> product(s) found</span>
        </div>

        <?php if (empty($products)): ?>
            <div class="empty-state">
                <p>No products found matching your search criteria.</p>
                <a href="products.php" class="btn btn-outline">Clear Search</a>
            </div>
        <?php else: ?>
            <div class="product-grid">
                <?php foreach ($products as $product): ?>
                    <div class="product-card">
                        <div class="product-category"><?= sanitize($product['category_name']) ?></div>
                        <h4 class="product-name"><?= sanitize($product['product_name']) ?></h4>
                        <p class="product-desc"><?= sanitize($product['description']) ?></p>
                        <div class="product-footer">
                            <span class="product-price">$<?= number_format((float) $product['price'], 2) ?></span>
                            <span class="product-stock">
                                <?= (int) $product['stock'] > 0 ? 'In Stock (' . (int) $product['stock'] . ')' : 'Out of Stock' ?>
                            </span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    <?php else: ?>
        <div class="category-list">
            <h3>Browse by Category</h3>
            <div class="category-grid">
                <?php foreach ($categories as $cat): ?>
                    <a href="products.php?category_id=<?= (int) $cat['category_id'] ?>" class="category-card">
                        <span class="category-name"><?= sanitize($cat['category_name']) ?></span>
                        <span class="category-arrow">&rarr;</span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
</section>

<?php require_once 'includes/footer.php'; ?>
