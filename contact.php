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
<!-- contact section -->
 <!-- Contact Section -->
<div class="container py-5">
    <h2 class="text-center mb-5">Contact Us</h2>
    <div class="row">
        <!-- Contact Form Section -->
        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title text-center">Get in Touch</h5>
                    <p class="card-text text-center">We'd love to hear from you! Please reach out to us for any questions or feedback.</p>
                    <form method="POST" action="process_contact.php">
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Your Message</label>
                            <textarea class="form-control" id="message" name="message" rows="4" placeholder="Write your message" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Send Message</button>
                    </form>

                </div>
            </div>
        </div>

        <!-- Contact Info Section -->
        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card h-100">
                <img src="image/contact.jpg" class="card-img-top" alt="Contact Us">
                <div class="card-body text-center">
                    <h5 class="card-title">Our Office</h5>
                    <p class="card-text">Visit us at our office for any inquiries or assistance. We're here to help!</p>
                    <p><strong>Address:</strong> 66 Brac City, Dhaka, Bangladesh</p>
                    <p><strong>Phone:</strong> +1 (123) 456-7890</p>
                    <p><strong>Email:</strong> contact@tvaly.com</p>
                    <a href="mailto:contact@tvaly.com" class="btn btn-primary">Email Us</a>
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
