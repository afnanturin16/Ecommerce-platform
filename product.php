<?php
// Database connection
$host = 'localhost';
$db = 'tvaly';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all products from the database
$products_query = "SELECT * FROM products";
$products_result = $conn->query($products_query);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">T-Valy</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="product.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-light btn-sm" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-light btn-sm" href="register.php">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <h2 class="text-center mb-5">Our Products</h2>
        <div class="row">
            <?php if ($products_result->num_rows > 0) { ?>
                <?php while ($product = $products_result->fetch_assoc()) { ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <!-- Display product image -->
                            <?php if (!empty($product['image'])) { ?>
                                <img src="image/<?php echo $product['image']; ?>" class="card-img-top" alt="<?php echo $product['name']; ?>">
                            <?php } else { ?>
                                <img src="images/default.jpg" class="card-img-top" alt="Default Image">
                            <?php } ?>
                            
                            <div class="card-body text-center">
                                <h5 class="card-title"><?php echo $product['name']; ?></h5>
                                <p class="card-text"><?php echo $product['description']; ?></p>
                                <p class="text-primary fw-bold">$<?php echo number_format($product['price'], 2); ?></p>
                                <!-- <a href="#" class="btn btn-primary">Add to Cart</a> -->
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <p>No products available.</p>
            <?php } ?>
        </div>
    </div>

    <!-- Footer Section -->
    <footer class="footer-section">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5 class="text-uppercase fw-bold mb-4">About T-Valy</h5>
                    <p>Discover a wide range of products at unbeatable prices. Shop from the comfort of your home and enjoy fast delivery.</p>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5 class="text-uppercase fw-bold mb-4">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-decoration-none text-black">Home</a></li>
                        <li><a href="#" class="text-decoration-none text-black">Products</a></li>
                        <li><a href="#" class="text-decoration-none text-black">About Us</a></li>
                        <li><a href="#" class="text-decoration-none text-black">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-12 mb-4">
                    <h5 class="text-uppercase fw-bold mb-4">Contact Us</h5>
                    <p><i class="bi bi-geo-alt-fill"></i> 66 Brac City, Dhaka, Bangladesh</p>
                    <p><i class="bi bi-envelope-fill"></i> support@tvaly.com</p>
                    <p><i class="bi bi-telephone-fill"></i> +1 234 567 890</p>
                </div>
            </div>
            <div class="text-center mt-4">
                <p class="mb-0">&copy; 2024 T-Valy. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
