<?php
session_start(); 
require_once 'connect.php'; // Database connection

// Fetch user details using session username
$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username = '$username'";
$query = mysqli_query($conn, $sql);

// Check if user exists
if ($query && mysqli_num_rows($query) > 0) {
    $user = mysqli_fetch_assoc($query); // Get user details
} else {
    echo "<p>Error: User not found.</p>";
}
?>

<!-- Display Profile Section -->
<div class="card">
    <h3>Profile Information</h3>
    <p><strong>Username:</strong> <?php echo $user['username']; ?></p>
    <p><strong>Full name:</strong> <?php echo $user['fullname'] ?? 'N/A'; ?></p>
    <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
</div>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .card{
            background-color: #a7a157;
            width: 50%;
            margin: 20%;
        }
       

    </style>
</head>

<body>
    
</body>
</html>