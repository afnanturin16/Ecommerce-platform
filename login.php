<?php
// Database connection configuration
$host = 'localhost';
$db = 'tvaly';
$user = 'root';
$pass = '';

// Start session
session_start();

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Fetch user from database
    $query = "SELECT * FROM user WHERE uemail = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['upass'])) {
            // Store user info in session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['uname'];
            $_SESSION['role'] = $user['role'];

            // Redirect based on role
            if ($user['role'] === 'admin') {
                header("Location: admin_dashboard.php");
            } else {
                header("Location: dashboard.php");
            }
            exit;
        } else {
            $message = "Invalid password.";
        }
    } else {
        $message = "No user found with this email.";
    }
    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Background styling */
        body {
            background: linear-gradient(135deg,rgb(3, 33, 77) 0%,rgba(56, 86, 138, 0.71) 100%);
            font-family: 'Arial', sans-serif;
            color: #ffffff;
        }

        /* Centering the login card */
        .login-section {
            background-color: rgba(255, 255, 255, 0.1);
        }

        /* Login card styling */
        .card {
            background-color: #ffffff;
            border: none;
            border-radius: 12px;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
        }

        /* Form styling */
        .form-label {
            font-weight: bold;
            color: #333333;
        }

        .form-control {
            border-radius: 8px;
        }

        /* Button styling */
        .btn-primary {
            background-color:rgb(8, 20, 75);
            border: none;
            border-radius: 8px;
            font-weight: bold;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #4e0ca3;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        /* Link styling */
        .text-decoration-none {
            color: #6a11cb;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .text-decoration-none:hover {
            color: #4e0ca3;
        }

        /* Alert styling */
        .alert-danger {
            border-radius: 8px;
            font-weight: bold;
        }

        /* Additional text styling */
        .text-center p {
            color: #333333;
        }

        /* Responsive adjustments */
        @media (max-width: 576px) {
            .card {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <div class="login-section d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
            <h2 class="text-center mb-4">Login</h2>
            <?php if (!empty($message)) { ?>
                <div class="alert alert-danger"><?php echo $message; ?></div>
            <?php } ?>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
            <hr>
            <div class="text-center">
                <p class="mb-0">Don't have an account? <a href="register.php" class="text-decoration-none">Register</a></p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

