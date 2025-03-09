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
    <h2 style="text-align: center;">Upcoming classes</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Course Name</th>
            <th>Course Date</th>
            <th>Instructor</th>
     
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
                    
                </tr>
        <?php
            }
        }
        ?>
    </table>
</body>

</html>