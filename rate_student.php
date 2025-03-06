<?php
require_once 'connect.php';

if (!isset($_GET['user_id']) || empty($_GET['user_id'])) {
    die("Invalid student selection.");
}

$student_id = (int)$_GET['user_id']; // Get student ID dynamically

$sql = "SELECT * FROM students WHERE user_id = $student_id";
$result = mysqli_query($conn, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    die("Student not found.");
}

$student = mysqli_fetch_assoc($result);
?>

<h2>Rate Student: <?php echo $student['username']; ?></h2>

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
