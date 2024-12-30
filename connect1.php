<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "login_info";

// Create a new connection
$conn = new mysqli($host, $user, $pass, $db);

// Check the connection
if ($conn->connect_error) {
    die("Failed to connect to the database: " . $conn->connect_error);
}
?>
