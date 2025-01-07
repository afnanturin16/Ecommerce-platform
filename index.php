<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Website</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- External CSS -->
    <link rel="stylesheet" href="style.css">
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

    <!-- Hero Section -->
    <header class="hero-section">
        <div class="container text-center text-white d-flex align-items-center justify-content-center flex-column">
            <h1 class="display-4">Welcome to T-Valy</h1>
            <p class="lead">Your one-stop destination for all your shopping needs!</p>
            <a href="product.php" class="btn btn-primary btn-lg">Shop Now</a>
        </div>
    </header>
        <!-- Features Section -->
        <section class="features-section py-5">
        <div class="container">
            <h2 class="text-center mb-5">Why Shop With Us?</h2>
            <div class="row text-center">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="icon mb-3 text-primary">
                                <i class="bi bi-truck" style="font-size: 2rem;"></i>
                            </div>
                            <h5 class="card-title">Fast Shipping</h5>
                            <p class="card-text">Get your products delivered to your doorstep in no time.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="icon mb-3 text-primary">
                                <i class="bi bi-shield-check" style="font-size: 2rem;"></i>
                            </div>
                            <h5 class="card-title">Secure Payments</h5>
                            <p class="card-text">Shop with confidence with our safe and secure payment methods.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="icon mb-3 text-primary">
                                <i class="bi bi-star" style="font-size: 2rem;"></i>
                            </div>
                            <h5 class="card-title">Quality Products</h5>
                            <p class="card-text">Only the best products curated for our customers.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- faq section -->
         <!-- FAQ Section -->
    <section class="faq-section py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Frequently Asked Questions</h2>
            <div class="accordion" id="faqAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faqHeading1">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1" aria-expanded="true" aria-controls="faqCollapse1">
                            What is T-Valy?
                        </button>
                    </h2>
                    <div id="faqCollapse1" class="accordion-collapse collapse show" aria-labelledby="faqHeading1" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            T-Valy is your one-stop destination for all your shopping needs, offering a wide range of products at unbeatable prices.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faqHeading2">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2" aria-expanded="false" aria-controls="faqCollapse2">
                            How do I track my order?
                        </button>
                    </h2>
                    <div id="faqCollapse2" class="accordion-collapse collapse" aria-labelledby="faqHeading2" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            You can track your order through email.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faqHeading3">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3" aria-expanded="false" aria-controls="faqCollapse3">
                            What is the return policy?
                        </button>
                    </h2>
                    <div id="faqCollapse3" class="accordion-collapse collapse" aria-labelledby="faqHeading3" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            We offer a 30-day return policy for unused and unopened items. 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- footer section -->
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


    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
