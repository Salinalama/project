<?php
session_start();
require_once 'connect.php';

// Check if instructor is logged in
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'instructor') {
    die("Access denied. Please log in as an instructor.");
}

$instructor_id = $_SESSION['user_id']; // Logged-in instructor's ID

// Fetch students assigned to this instructor
$sql = "SELECT users.user_id, users.username, users.email 
        FROM assign_student 
        JOIN users ON assign_student.student_id = users.user_id 
        WHERE assign_student.teacher_id = $instructor_id";

$query = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor Dashboard</title>
    <link rel="stylesheet" href="dashboard_style.css">
</head>
<body>

<div class="navbar">
    <h1>Instructor Dashboard</h1>
    <button class="logout" onclick="location.href='logout.php'">Logout</button>
</div>

<div class="content">
    <h2>Assigned Students</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Student Name</th>
            <th>Email</th>
        </tr>
        <?php
        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                echo "<tr>
                        <td>{$row['user_id']}</td>
                        <td>{$row['username']}</td>
                        <td>{$row['email']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='3' style='text-align:center;'>No students assigned.</td></tr>";
        }
        ?>
    </table>
</div>

</body>
</html>
