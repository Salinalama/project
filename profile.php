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
    <h3 style="background-color: #b7c393 ;">Profile Information</h3>
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
            /* background-color: #a7a157; */
            width: 40%;
            margin: 100px 500px;
            text-align: center;
            height: 30%;
            font-size: 22px;
            border: 1px solid rgb(0, 0, 0); /* Green border */
            border-radius: 10px; /* Rounded corners */
            background-color:rgb(244, 242, 242); /* Light background */
           
        }
        .card h3 {
            background-color: #b7c393;
            color: white;
            padding: 10px; 
            margin: 0; /*filled the color*/
            border-radius: 10px 10px 0 0; /* Rounded top corners */
            text-align: center;
}

       

    </style>
</head>

<body>
    
</body>
</html>