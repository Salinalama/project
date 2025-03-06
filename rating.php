<?php
// Student Data (Example: Fetch these from your database)
$attendance_percentage = 85;  // % of classes attended
$skill_average = 4.2; // Out of 5
$test_score = 80; // Written + Practical Exam Score (out of 100)
$instructor_feedback = "Positive"; // Options: "Positive", "Needs Improvement", "Negative"

// Initialize Rating Points
$rating = 0;

// 1. Attendance Rating (30%)
if ($attendance_percentage >= 90) {
    $rating += 30;
} elseif ($attendance_percentage >= 75) {
    $rating += 20;
} elseif ($attendance_percentage >= 50) {
    $rating += 10;
}

// 2. Skill Evaluation Rating (30%)
if ($skill_average >= 4.5) {
    $rating += 30;
} elseif ($skill_average >= 3.5) {
    $rating += 20;
} elseif ($skill_average >= 2.5) {
    $rating += 10;
}

// 3. Test Score Rating (30%)
if ($test_score >= 90) {
    $rating += 30;
} elseif ($test_score >= 75) {
    $rating += 20;
} elseif ($test_score >= 50) {
    $rating += 10;
}

// 4. Instructor Feedback (10%)
if ($instructor_feedback == "Positive") {
    $rating += 10;
} elseif ($instructor_feedback == "Needs Improvement") {
    $rating += 5;
}

// Determine Performance Level
if ($rating >= 80) {
    $performance = "⭐ Excellent";
} elseif ($rating >= 60) {
    $performance = "✅ Good";
} elseif ($rating >= 40) {
    $performance = "⚠️ Needs Improvement";
} else {
    $performance = "❌ Poor";
}

// Display Student Rating
echo "<h2>Student Performance Rating</h2>";
echo "<p><strong>Total Score:</strong> $rating / 100</p>";
echo "<p><strong>Performance Level:</strong> $performance</p>";
?>
