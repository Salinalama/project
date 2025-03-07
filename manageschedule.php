<?php require_once 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event List</title>
    <link rel="stylesheet" href="table_style.css">

</head>

<body>
    <h2 style="text-align: center;">Event List</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Course Name</th>
            <th>Course Date</th>
            <th>Instructor</th>
            <th>Action</th>
        </tr>
        <?php
        // Fetch events from the database
        $sql = "SELECT * FROM events ORDER BY course_date DESC";
        $query = mysqli_query($conn, $sql);
        $i = 1;

        if (mysqli_num_rows($query) <= 0) {
            echo "<tr><td colspan='5'>No events found.</td></tr>";
        } else {
            while ($row = mysqli_fetch_assoc($query)) {
        ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['Course_name']; ?></td>
                    <td><?php echo $row['Course_date']; ?></td>
                    <td><?php echo $row['Instructor']; ?></td>
                    <td>
                        <a href="edit_event.php?id=<?php echo $row['id']; ?>">Edit</a>
                        <a href="delete_event.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this event?')">Delete</a>
                        <a href="add_event.php" class="add-button">Add </a>
                    </td>
                </tr>
        <?php
            }
        }
        ?>
    </table>
</body>

</html>