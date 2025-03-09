<?php
require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $student_id = (int)$_POST['student_id'];
    $teacher_id = (int)$_POST['teacher_id'];
    $assigned_at = date("Y-m-d H:i:s"); // Current timestamp

    // Validate inputs
    if (empty($student_id) || empty($teacher_id)) {
        die("Invalid input. Please ensure both student and teacher are selected.");
    }

    // Check if the student already has an assignment
    $check_sql = "SELECT * FROM assign_student WHERE student_id = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("i", $student_id);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        // Update the existing assignment
        $update_sql = "UPDATE assign_student SET teacher_id = ?, assigned_at = ? WHERE student_id = ?";
        $update_stmt = $conn->prepare($update_sql);

        if ($update_stmt) {
            $update_stmt->bind_param("isi", $teacher_id, $assigned_at, $student_id);

            if ($update_stmt->execute()) {
                echo "Teacher assignment updated successfully! <a href='students_list.php'>Back to Student List</a>";
            } else {
                echo "Error updating assignment: " . $update_stmt->error;
            }

            $update_stmt->close();
        } else {
            echo "Error preparing update statement: " . $conn->error;
        }
    } else {
        // Insert a new assignment
        $insert_sql = "INSERT INTO assign_student (student_id, teacher_id, assigned_at) VALUES (?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);

        if ($insert_stmt) {
            $insert_stmt->bind_param("iis", $student_id, $teacher_id, $assigned_at);

            if ($insert_stmt->execute()) {
                echo "Teacher assigned successfully! <a href='student_list.php'>Back to Student List</a>";
            } else {
                echo "Error assigning teacher: " . $insert_stmt->error;
            }

            $insert_stmt->close();
        } else {
            echo "Error preparing insert statement: " . $conn->error;
        }
    }

    $check_stmt->close();
} else {
    echo "Invalid request method.";
}

$conn->close();
?>