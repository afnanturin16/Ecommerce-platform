<?php
session_start();

// Ensure only admins can access
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
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

// Handle product posting with image upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_product'])) {
    $name = htmlspecialchars($_POST['name']);
    $description = htmlspecialchars($_POST['description']);
    $price = floatval($_POST['price']);
    
    // Handle file upload
    $image = "";
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_name = basename($_FILES['image']['name']);
        $image_path = "image/" . $image_name;
        
        if (move_uploaded_file($image_tmp_name, $image_path)) {
            $image = $image_name;
        } else {
            $message = "Error uploading image.";
        }
    }

    $query = "INSERT INTO products (name, description, price, image) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssds", $name, $description, $price, $image);

    if ($stmt->execute()) {
        $message = "Product added successfully!";
    } else {
        $message = "Error adding product: " . $stmt->error;
    }
    $stmt->close();
}

// Handle order deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_order_id'])) {
    $order_id = intval($_POST['delete_order_id']);

    $query = "DELETE FROM orders WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $order_id);

    if ($stmt->execute()) {
        $message = "Order deleted successfully!";
    } else {
        $message = "Error deleting order: " . $stmt->error;
    }
    $stmt->close();
}

// Handle order approval
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['approve_order_id'])) {
    $order_id = intval($_POST['approve_order_id']);

    $query = "UPDATE orders SET status = 'approved' WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $order_id);

    if ($stmt->execute()) {
        $message = "Order approved successfully!";
    } else {
        $message = "Error approving order: " . $stmt->error;
    }
    $stmt->close();
}

// Fetch all orders
$orders_query = "SELECT orders.id, user.uname, products.name AS product_name, orders.status 
                 FROM orders 
                 JOIN user ON orders.user_id = user.id 
                 JOIN products ON orders.product_id = products.id";
$orders_result = $conn->query($orders_query);

// Fetch contact messages
$contacts_query = "SELECT * FROM contacts ORDER BY created_at DESC";
$contacts_result = $conn->query($contacts_query);

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color:rgb(1, 40, 78);
            font-family: 'Arial', sans-serif;
        }
        h1, h2 {
            color:rgb(255, 255, 255);
            text-align: center;
        }
        .container {
            background-color:rgb(35, 95, 151);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }
        table {
            background-color: #ffffff;
        }
        .table-bordered {
            border: 1px solid #dee2e6;
        }
        .table thead {
            background-color: #343a40;
            color: #ffffff;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-success {
            background-color: #28a745;
            border: none;
            transition: background-color 0.3s ease;
        }
        .btn-success:hover {
            background-color: #218838;
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
            transition: background-color 0.3s ease;
        }
        .btn-danger:hover {
            background-color: #b02a37;
        }
        .alert-info {
            background-color: #d1ecf1;
            color: #0c5460;
            border-color: #bee5eb;
        }
        .welcome-text {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .no-data {
            text-align: center;
            font-style: italic;
            color: #6c757d;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="welcome-text">
        <h1>Admin Dashboard</h1>
        <form method="POST" action="logout.php" style="margin: 0;">
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
    
    <?php if (!empty($message)) { ?>
        <div class="alert alert-info"><?php echo $message; ?></div>
    <?php } ?>

    <!-- Add Product Section -->
    <h2>Add Product</h2>
    <form method="POST" class="mb-4" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" id="price" name="price" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Product Image</label>
            <input type="file" id="image" name="image" class="form-control" accept="image/*">
        </div>
        <button type="submit" name="add_product" class="btn btn-primary">Add Product</button>
    </form>

    <!-- Manage Orders Section -->
    <h2>Manage Orders</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>User</th>
                <th>Product</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($orders_result->num_rows > 0) { ?>
                <?php while ($order = $orders_result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $order['id']; ?></td>
                        <td><?php echo htmlspecialchars($order['uname']); ?></td>
                        <td><?php echo htmlspecialchars($order['product_name']); ?></td>
                        <td><?php echo ucfirst(htmlspecialchars($order['status'])); ?></td>
                        <td>
                            <?php if ($order['status'] === 'pending') { ?>
                                <form method="POST" style="display: inline;">
                                    <input type="hidden" name="approve_order_id" value="<?php echo $order['id']; ?>">
                                    <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                </form>
                            <?php } ?>
                            <form method="POST" style="display: inline;">
                                <input type="hidden" name="delete_order_id" value="<?php echo $order['id']; ?>">
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="5" class="no-data">No orders found.</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- Manage Contact Messages Section -->
    <h2>Contact Messages</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($contacts_result->num_rows > 0) { ?>
                <?php while ($contact = $contacts_result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $contact['id']; ?></td>
                        <td><?php echo htmlspecialchars($contact['name']); ?></td>
                        <td><?php echo htmlspecialchars($contact['email']); ?></td>
                        <td><?php echo htmlspecialchars($contact['message']); ?></td>
                        <td><?php echo htmlspecialchars($contact['created_at']); ?></td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="5" class="no-data">No messages found.</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- Export Orders -->
    <form method="POST" action="export_orders.php" class="mt-4">
        <button type="submit" class="btn btn-success">Export Orders to CSV</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

