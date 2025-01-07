<?php
// Database connection details
$host = 'localhost';
$db = 'tvaly';
$user = 'root';
$pass = '';

// Connect to the database
$conn = new mysqli($host, $user, $pass, $db);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set headers to download the file as CSV
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="orders.csv"');

// Open output stream to write to the CSV file
$output = fopen('php://output', 'w');

// Add CSV column headers
fputcsv($output, ['Order ID', 'User', 'Product', 'Status', 'Total Price']);

// Query to get all orders
$query = "SELECT orders.id, user.uname, products.name AS product_name, orders.status, orders.total_price
          FROM orders
          JOIN user ON orders.user_id = user.id
          JOIN products ON orders.product_id = products.id";

$result = $conn->query($query);

// Write each row to the CSV
while ($order = $result->fetch_assoc()) {
    fputcsv($output, [
        $order['id'],
        $order['uname'],
        $order['product_name'],
        $order['status'],
        $order['total_price']
    ]);
}

// Close the database connection
$conn->close();

// Close the output stream
fclose($output);
exit;
?>
