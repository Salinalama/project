<?php
require_once 'connect.php';

// Check database connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch attendance records
$sql = "SELECT a.date, u.username, a.status 
        FROM attendance a 
        JOIN users u ON a.student_id = u.user_id 
        ORDER BY a.date DESC";

$result = mysqli_query($conn, $sql);

// Debugging: Check if query executed successfully
if (!$result) {
    die("Query Failed: " . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Report</title>
    <link rel="stylesheet" href="table_style.css">
</head>
<body>
    <h2 style="text-align: center;">Attendance Report</h2>
    
    <?php if (mysqli_num_rows($result) > 0) { ?>
        <table border="1">
            <tr>
                <th>Date</th>
                <th>Student Name</th>
                <th>Status</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                </tr>
            <?php } ?>
        </table>
    <?php } else { ?>
        <p>No attendance records found.</p>
    <?php } ?>

</body>
</html>
