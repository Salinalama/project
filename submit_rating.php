<?php
require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = (int)$_POST['student_id'];
    $attendance = (int)$_POST['attendance'];
    $skill_rating = (float)$_POST['skill_rating'];
    $test_score = (int)$_POST['test_score'];
    $instructor_feedback = $_POST['instructor_feedback'];

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

    // Update student rating in the database
    $sql = "UPDATE students 
            SET rating_score = $rating, 
                performance_level = '$performance',
                attendance = $attendance,
                skill_rating = $skill_rating,
                test_score = $test_score,
                instructor_feedback = '$instructor_feedback'
            WHERE user_id = $student_id";

    if (mysqli_query($conn, $sql)) {
        echo "Rating updated successfully! <a href='students_list.php'>Back to Student List</a>";
    } else {
        echo "Error updating rating: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
