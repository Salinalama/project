<?php
// Database connection parameters
include 'connect1.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $user = $_POST['username'];
    // $email = $_POST['email'];
    $pass = $_POST['password'];

    // Secure the password
    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

    // Prepare SQL query to insert user data
    $sql = "INSERT INTO user (username,  password) VALUES ('$user', '$hashed_password')";

    // Execute query
    if (mysqli_query($conn, $sql)) {
        echo "User registered successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
