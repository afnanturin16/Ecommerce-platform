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

<!-- About Us Section -->
<div class="container py-5">
    <h2 class="text-center mb-5">About Us</h2>
    <div class="row">
        <!-- About the Company -->
        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card h-100">
                <img src="image/ab1.jpg" class="card-img-top" alt="About Us">
                <div class="card-body text-center">
                    <h5 class="card-title">Who We Are</h5>
                    <p class="card-text">We are a team of passionate individuals dedicated to delivering high-quality products and services that make a difference in people's lives. Our mission is to create solutions that solve real problems with innovation and excellence.</p>
                    <p class="text-primary fw-bold">Founded in 2024</p>
                </div>
            </div>
        </div>

        <!-- Our Vision -->
        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card h-100">
                <div class="card h-100">
                    <img src="image/ab7.jpg" class="card-img-top" alt="About Us">
                    <div class="card-body text-center">
                        <h5 class="card-title">Our Vision</h5>
                        <p class="card-text">To become a leader in our industry by constantly innovating and delivering exceptional products and services that exceed customer expectations. We aim to build lasting relationships based on trust, integrity, and customer satisfaction.</p>
                        <p class="text-primary fw-bold">Commitment to Excellence</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="row mt-5">
        <!-- Our Team -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <img src="image/tt.jpg" class="card-img-top" alt="Team Member 1">
                <div class="card-body text-center">
                    <h5 class="card-title">Shahjalal Afnan Turin</h5>
                    <p class="card-text">Co-Founder and CEO</p>
                    <p class="text-primary fw-bold">Leader and visionary behind the company</p>
                </div>
            </div>
        </div>
        <!-- Team Member 2 -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <img src="image/rr2.jpg" class="card-img-top" alt="Team Member 2">
                <div class="card-body text-center">
                    <h5 class="card-title">Nurul Hafiz Rizvi</h5>
                    <p class="card-text">Co-Founder and CTO</p>
                    <p class="text-primary fw-bold">Expert in managing day-to-day operations</p>
                </div>
            </div>
        </div>
        <!-- Team Member 3 -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <img src="image/kaka2.jpg" class="card-img-top" alt="Team Member 3">
                <div class="card-body text-center">
                    <h5 class="card-title">Syed Mehboob Monjur</h5>
                    <p class="card-text">Marketing Specialist</p>
                    <p class="text-primary fw-bold">Creating innovative solutions for our clients</p>
                </div>
            </div>
        </div>
    </div>
</div>


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
