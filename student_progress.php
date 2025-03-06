<?php
session_start(); // Start the session
require_once 'connect.php';

// Check if username is set in the session
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    die("User not logged in. Please <a href='login.php'>login</a>.");
}

$username = $_SESSION['username']; // Get logged-in student's username

// Fetch the student's progress report
$sql = "SELECT username, rating_score, performance_level FROM students WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Database error: " . mysqli_error($conn));
}

if ($row = mysqli_fetch_assoc($result)) {
    echo "<h2>Progress Report for " . htmlspecialchars($row['username']) . "</h2>";
    echo "<p><strong>Rating Score:</strong> " . htmlspecialchars($row['rating_score']) . "/100</p>";
    echo "<p><strong>Performance Level:</strong> " . htmlspecialchars($row['performance_level']) . "</p>";
} else {
    echo "No progress report found.";
}
?>