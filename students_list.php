<?php
require_once 'connect.php';

$sql = "SELECT user_id, username FROM students";
$result = mysqli_query($conn, $sql);
?>

<h2>Students List</h2>
<table border="1">
    <tr>
        <th>Username</th>
        <th>Action</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['username']; ?></td>
            <td>
                <a href="rate_student.php?user_id=<?php echo $row['user_id']; ?>">Rate</a>
            </td>
        </tr>
    <?php } ?>
</table>
