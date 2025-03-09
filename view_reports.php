<?php
require_once 'connect.php'; // Include database connection

// Check if user_id is provided in the URL
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // Fetch student details from the `students` table
    $query = mysqli_query($conn, "SELECT * FROM students WHERE user_id = $user_id");
    $student = mysqli_fetch_assoc($query);

    // If no data found, show an error
    if (!$student) {
        die("No report found for this student.");
    }
} else {
    die("Invalid request.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Report</title>
    <link rel="stylesheet" href="dashboard_style.css">
    <link rel="stylesheet" href="table_style.css">

</head>
<body>

<div class="navbar">
    <h1>Report of student: <?php echo $student['username']; ?></h1>
    <button class="logout" onclick="location.href='admin.php'">Back to Dashboard</button>
</div>

<div style="margin-top: 5%;" class="content">
    <table border="1">
        <tr>
            <th>Attendance</th>
            <th>Skill Rating</th>
            <th>Test Score</th>
            <th>Instructor Feedback</th>
            <th>Rating Score</th>
            <th>Performance Level</th>
        </tr>
        <tr>
            <td><?php echo isset($student['attendance']) ? $student['attendance'] . '%' : 'N/A'; ?></td>
            <td><?php echo isset($student['skill_rating']) ? $student['skill_rating'] : 'N/A'; ?></td>
            <td><?php echo isset($student['test_score']) ? $student['test_score'] : 'N/A'; ?></td>
            <td><?php echo isset($student['instructor_feedback']) ? $student['instructor_feedback'] : 'N/A'; ?></td>
            <td><?php echo isset($student['rating_score']) ? $student['rating_score'] : 'N/A'; ?></td>
            <td><?php echo isset($student['performance_level']) ? $student['performance_level'] : 'N/A'; ?></td>
        </tr>
    </table>
</div>

</body>
</html>
