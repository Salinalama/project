<?php
require_once 'connect.php';
session_start();

// Fetch all students
$sql = "SELECT user_id, username FROM users WHERE user_type = 'student'";
$result = mysqli_query($conn, $sql);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $date = date('Y-m-d'); // Get today's date

    foreach ($_POST['attendance'] as $student_id => $status) {
        // Insert or update attendance (Prevent duplicates)
        $check_query = "SELECT * FROM attendance WHERE student_id = $student_id AND date = '$date'";
        $check_result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($check_result) == 0) {
            $insert_query = "INSERT INTO attendance (student_id, date, status) VALUES ($student_id, '$date', '$status')";
            mysqli_query($conn, $insert_query);
        }
    }
    echo "<script>alert('Attendance recorded successfully!');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Take Attendance</title>
    <link rel="stylesheet" href="table_style.css">
 </head>
<body>
    <h2 style="text-align: center;">Mark Attendance</h2>
    <form method="POST">
        <table border="1">
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Attendance</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['user_id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td>
                        <input type="radio" name="attendance[<?php echo $row['user_id']; ?>]" value="Present" required> Present
                        <input type="radio" name="attendance[<?php echo $row['user_id']; ?>]" value="Absent"> Absent
                    </td>
                </tr>
            <?php } ?>
        </table>
        <br>
        <button type="submit">Submit Attendance</button>
        <button onclick="location.href='view_attendance.php'" type="button">View Attendance</button>
    </form>
</body>
</html>
