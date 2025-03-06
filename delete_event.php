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

    // Cross-checking if the event exists in the database
    $sql = "SELECT * FROM events WHERE id = " . $event_id;
    $query = mysqli_query($conn, $sql);

    // Validate if there is data in the table or not
    if (mysqli_num_rows($query) <= 0) {
        header('location: manageschedule.php');
        exit;
    }

    // Delete the event from the database
    $delete_sql = "DELETE FROM events WHERE id = " . $event_id;
    $delete_query = mysqli_query($conn, $delete_sql);

    if ($delete_query) {
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
?>