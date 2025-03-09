<?php
require_once 'connect.php';

if (!isset($_GET['user_id']) || empty($_GET['user_id'])) {
    die("Invalid student selection.");
}

$student_id = (int)$_GET['user_id']; // Get student ID dynamically

$sql = "SELECT u.user_id, u.username, u.email, 
               s.attendance, s.skill_rating, s.test_score, s.instructor_feedback
        FROM users u
        LEFT JOIN students s ON u.user_id = s.user_id
        WHERE u.user_id = $student_id";
$result = mysqli_query($conn, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    die("Student not found.");
}

$student = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate Student</title>
    <style>
        .card {
            width: 40%;
            margin: 100px auto; /* Centered horizontally */
            text-align: center;
            padding: 20px;
            font-size: 22px;
            border: 1px solid rgb(0, 0, 0); /* Black border */
            border-radius: 10px; /* Rounded corners */
            background-color: rgb(244, 242, 242); /* Light background */
        }
        .card h3 {
            background-color: #b7c393;
            color: white;
            padding: 10px;
            margin: 0; /* Filled the color */
            border-radius: 10px 10px 0 0; /* Rounded top corners */
            text-align: center;
        }
        .card label {
            display: block;
            margin: 15px 0 5px;
            font-weight: bold;
        }
        .card input[type="number"],
        .card select {
            width: 80%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 18px;
        }
        .card button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            margin-top: 20px;
        }
        .card button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="card">
    <h3>Rate Student: <?php echo $student['username']; ?></h3>

    <form action="submit_rating.php" method="POST">
        <input type="hidden" name="student_id" value="<?php echo $student['user_id']; ?>">
        
        <label>Attendance (%):</label>
        <input type="number" name="attendance" value="<?php echo $student['attendance']; ?>" required><br>

        <label>Skill Rating (Out of 5):</label>
        <input type="number" name="skill_rating" step="0.1" min="1" max="5" value="<?php echo $student['skill_rating']; ?>" required><br>

        <label>Test Score (Out of 100):</label>
        <input type="number" name="test_score" min="0" max="100" value="<?php echo $student['test_score']; ?>" required><br>

        <label>Instructor Feedback:</label>
        <select name="instructor_feedback">
            <option value="Positive">Positive</option>
            <option value="Needs Improvement">Needs Improvement</option>
            <option value="Negative">Negative</option>
        </select><br>

        <button type="submit">Submit Rating</button>
    </form>
</div>

</body>
</html>