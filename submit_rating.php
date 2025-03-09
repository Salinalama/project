<?php
require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input data
    $student_id = (int)$_POST['student_id'];
    $attendance = (int)$_POST['attendance'];
    $skill_rating = (float)$_POST['skill_rating'];
    $test_score = (int)$_POST['test_score'];
    $instructor_feedback = mysqli_real_escape_string($conn, $_POST['instructor_feedback']);

    // Fetch username from the users table
    $fetch_username_sql = "SELECT username FROM users WHERE user_id = $student_id";
    $fetch_username_result = mysqli_query($conn, $fetch_username_sql);

    if (!$fetch_username_result || mysqli_num_rows($fetch_username_result) == 0) {
        die("Error: Student not found in the users table.");
    }

    $user_data = mysqli_fetch_assoc($fetch_username_result);
    $username = mysqli_real_escape_string($conn, $user_data['username']);

    // Rating Calculation
    $rating = 0;

    // Attendance Rating (30%)
    if ($attendance >= 90) { $rating += 30; }
    elseif ($attendance >= 75) { $rating += 20; }
    elseif ($attendance >= 50) { $rating += 10; }

    // Skill Evaluation Rating (30%)
    if ($skill_rating >= 4.5) { $rating += 30; }
    elseif ($skill_rating >= 3.5) { $rating += 20; }
    elseif ($skill_rating >= 2.5) { $rating += 10; }

    // Test Score Rating (30%)
    if ($test_score >= 90) { $rating += 30; }
    elseif ($test_score >= 75) { $rating += 20; }
    elseif ($test_score >= 50) { $rating += 10; }

    // Instructor Feedback (10%)
    if ($instructor_feedback == "Positive") { $rating += 10; }
    elseif ($instructor_feedback == "Needs Improvement") { $rating += 5; }

    // Performance Level
    if ($rating >= 80) { $performance = "⭐ Excellent"; }
    elseif ($rating >= 60) { $performance = "✅ Good"; }
    elseif ($rating >= 40) { $performance = "⚠️ Needs Improvement"; }
    else { $performance = "❌ Poor"; }

    // Use INSERT ... ON DUPLICATE KEY UPDATE to handle missing records
    $sql = "INSERT INTO students (user_id, username, attendance, skill_rating, test_score, instructor_feedback, rating_score, performance_level)
            VALUES ($student_id, '$username', $attendance, $skill_rating, $test_score, '$instructor_feedback', $rating, '$performance')
            ON DUPLICATE KEY UPDATE
                username = VALUES(username),
                attendance = VALUES(attendance),
                skill_rating = VALUES(skill_rating),
                test_score = VALUES(test_score),
                instructor_feedback = VALUES(instructor_feedback),
                rating_score = VALUES(rating_score),
                performance_level = VALUES(performance_level)";

    // Debugging: Print the SQL query
    // echo "<pre>SQL Query: $sql</pre>";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo "Rating updated successfully! <a href='students_list.php'>Back to Student List</a>";
    } else {
        echo "Error updating rating: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>