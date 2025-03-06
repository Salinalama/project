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

    // Fetch old records from the database to display in the form
    $sql = "SELECT * FROM events WHERE id = " . $event_id;
    $query = mysqli_query($conn, $sql);

    // Validate if there is data in the table or not
    if (mysqli_num_rows($query) <= 0) {
        header('location: manageschedule.php');
        exit;
    }

    // Retrieve a single row of existing data
    $old_data = mysqli_fetch_assoc($query);
} else {
    header('location: manageschedule.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
</head>
<body>
    <h2>Edit Event</h2>
    <form action="update_event.php?id=<?php echo $old_data['id']; ?>" method="POST">
        Course Name: <input type="text" name="course_name" value="<?php echo $old_data['Course_name']; ?>"> <br><br>
        Course Date: <input type="date" name="course_date" value="<?php echo $old_data['Course_date']; ?>"> <br><br>
        Instructor: <input type="text" name="instructor" value="<?php echo $old_data['Instructor']; ?>"> <br><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>