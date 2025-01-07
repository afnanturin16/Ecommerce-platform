<?php
session_start();

// Ensure only users can access
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit;
}

// Database connection
$host = 'localhost';
$db = 'tvaly';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";

// Handle order placement
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['place_order'])) {
    $product_id = intval($_POST['product_id']);
    $user_id = $_SESSION['user_id'];

    $query = "INSERT INTO orders (user_id, product_id) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $user_id, $product_id);

    if ($stmt->execute()) {
        $message = "Order placed successfully!";
    } else {
        $message = "Error placing order: " . $stmt->error;
    }
    $stmt->close();
}

// Fetch all products
$products_query = "SELECT * FROM products";
$products_result = $conn->query($products_query);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color:rgb(3, 27, 51);
            font-family: 'Arial', sans-serif;
        }
        h1, h2 {
            color: #343a40;
            text-align: center;
        }
        .container {
            background-color:rgb(83, 191, 241);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        table {
            background-color:rgb(119, 131, 145);
        }
        .table-dark {
            background-color: #343a40;
            color:rgb(118, 143, 148);
        }
        .btn-primary {
            background-color: #0d6efd;
            border: none;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
            transition: background-color 0.3s ease;
        }
        .btn-danger:hover {
            background-color: #b02a37;
        }
        img {
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        .welcome-text {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .alert-info {
            background-color: #d1ecf1;
            color: #0c5460;
            border-color: #bee5eb;
        }
        .no-products {
            text-align: center;
            font-style: italic;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container my-4">
        <h1 class="mb-4">User Dashboard</h1>
        <div class="welcome-text">
            <p>Welcome, <strong><?php echo htmlspecialchars($_SESSION['user_name']); ?></strong>!</p>
            <form method="POST" action="logout.php" style="margin: 0;">
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
        
        <?php if (!empty($message)) { ?>
            <div class="alert alert-info"><?php echo $message; ?></div>
        <?php } ?>

        <!-- View Products -->
        <h2>Available Products</h2>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($products_result->num_rows > 0) { ?>
                    <?php while ($product = $products_result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($product['name']); ?></td>
                            <td><?php echo htmlspecialchars($product['description']); ?></td>
                            <td><?php echo htmlspecialchars($product['price']); ?></td>
                            <td>
                                <?php if (!empty($product['image'])) { ?>
                                    <img src="image/products/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" style="width: 100px; height: auto;">
                                <?php } else { ?>
                                    <p>No image available</p>
                                <?php } ?>
                            </td>
                            <td>
                                <form method="POST" style="display: inline;">
                                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                    <button type="submit" name="place_order" class="btn btn-primary btn-sm">Order</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="5" class="no-products">No products available.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

