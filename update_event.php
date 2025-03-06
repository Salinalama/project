<?php
require_once 'connect.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Access granted
    $event_id = (int)$_GET['id']; // Data type casting

    if ($event_id <= 0) {
        // Cross-checking if invalid ID is passed from URL query
        header('location: manageschedule.php');
        exit;
    }

    // Fetch old records from the database to ensure the event exists
    $sql = "SELECT * FROM events WHERE id = " . $event_id;
    $query = mysqli_query($conn, $sql);

    // Validate if there is data in the table or not
    if (mysqli_num_rows($query) <= 0) {
        header('location: manageschedule.php');
        exit;
    }

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $course_name = $_POST['course_name'];
        $course_date = $_POST['course_date'];
        $instructor = $_POST['instructor'];

        // Update the event in the database
        $update_sql = "UPDATE events SET Course_name = '$course_name', Course_date = '$course_date', Instructor = '$instructor' WHERE id = $event_id";
        $update_query = mysqli_query($conn, $update_sql);

        if ($update_query) {
            // Success
            header('location: manageschedule.php');
            exit;
        } else {
            // Error
            header('location: manageschedule.php');
            exit;
        }
    } else {
        header('location: manageschedule.php');
        exit;
    }
} else {
    header('location: manageschedule.php');
    exit;
}
?>