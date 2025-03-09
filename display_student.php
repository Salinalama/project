<?php
require_once 'connect.php'; // Include database connection
?>

<link rel="stylesheet" href="table_style.css">
<h2 style="text-align: center;">Progress Report</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Student Name</th>
        <th>Email</th>
       
    </tr>
    <?php
    // Ensure the connection is established
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM users WHERE user_type='student'";
    $query = mysqli_query($conn, $sql);
    $i = 1;

    if (!$query) {
        die("Query failed: " . mysqli_error($conn)); // Debugging query issues
    }

    if (mysqli_num_rows($query) <= 0) {
        echo "<tr><td colspan='4' style='text-align:center;'>No students found.</td></tr>";
    } else {
        while ($row = mysqli_fetch_assoc($query)) {
            ?>
            <tr>
                <td><?php echo $i++ . "."; ?></td>
                <td><a href="view_reports.php?user_id=<?php echo $row['user_id']; ?>"><?php echo $row['username']; ?></a></td>
                <td><?php echo $row['email']; ?></td>
                
            </tr>
    <?php
        }
    }
    ?>
</table>
