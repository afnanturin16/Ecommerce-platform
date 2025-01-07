<?php
// Database connection configuration
$host = 'localhost'; // Change if not running locally
$db = 'tvaly'; // Your database name
$user = 'root'; // Your MySQL username
$pass = ''; // Your MySQL password

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $uname = htmlspecialchars($_POST['uname']);
    $uemail = filter_var($_POST['uemail'], FILTER_SANITIZE_EMAIL);
    $uaddress = htmlspecialchars($_POST['uaddress']);
    $upass = password_hash($_POST['upass'], PASSWORD_BCRYPT);
    $role = htmlspecialchars($_POST['role']); // Admin or user

    // Check for duplicate email
    $query = "SELECT * FROM user WHERE uemail = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $uemail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $message = "Error: Email already exists!";
    } else {
        // Insert user/admin into the database
        $insert_query = "INSERT INTO user (uname, uemail, upass, uaddress, role) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insert_query);
        $stmt->bind_param("sssss", $uname, $uemail, $upass, $uaddress, $role);

        if ($stmt->execute()) {
            $message = ucfirst($role) . " registered successfully!";
        } else {
            $message = "Error: " . $stmt->error;
        }
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <style>
    /* Body Styling */
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(135deg,rgb(3, 33, 77) 0%,rgba(56, 86, 138, 0.71) 100%);
      color: #333;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    /* Container Styling */
    .container {
      background-color: #fff;
      max-width: 600px;
      width: 80%;
      margin: auto;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
    }

    /* Header Styling */
    h2 {
      text-align: center;
      color: #6a11cb;
      margin-bottom: 20px;
    }

    /* Form Elements */
    label {
      font-weight: bold;
      margin-top: 10px;
      display: block;
    }

    input, select {
      width: 95%;
      padding: 10px;
      margin-top: 5px;
      border: 2px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
    }

    input:focus, select:focus {
      border-color: #6a11cb;
      outline: none;
      box-shadow: 0px 0px 5px rgba(106, 17, 203, 0.5);
    }

    /* Button Styling */
    button {
      margin-top: 20px;
      padding: 10px;
      width: 100%;
      background-color:rgb(3, 21, 78);
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }

    button:hover {
      background-color: #4e0ca3;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    }

    /* Error Message Styling */
    .message {
      margin-top: 20px;
      color: red;
      font-weight: bold;
      text-align: center;
    }

    /* Responsive Design */
    @media (max-width: 576px) {
      .container {
        padding: 15px;
      }

      button {
        font-size: 14px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Register</h2>
    <?php if (!empty($message)) { ?>
      <p class="message"><?php echo $message; ?></p>
    <?php } ?>
    <form method="POST">
      <label for="uname">Full Name</label>
      <input type="text" id="uname" name="uname" placeholder="Enter your full name" required>

      <label for="uemail">Email</label>
      <input type="email" id="uemail" name="uemail" placeholder="Enter your email" required>

      <label for="uaddress">Address</label>
      <input type="text" id="uaddress" name="uaddress" placeholder="Enter your address" required>

      <label for="upass">Password</label>
      <input type="password" id="upass" name="upass" placeholder="Enter a password" required>

      <label for="role">Role</label>
      <select id="role" name="role" required>
        <option value="user">User</option>
        <option value="admin">Admin</option>
      </select>

      <button type="submit">Register</button>
    </form>
  </div>
</body>
</html>

