<?php
require_once 'connect.php';

$sql = "SELECT user_id, username FROM users where user_type ='student'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student list</title>
    <link rel="stylesheet" href="table_style.css">
</head>
<body>
    
</body>
</html>
<h2 style="text-align: center;">Students List</h2>
<table border="1">
    <tr>
        <th>Username</th>
        <th>Action</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['username']; ?></td>
            <td>
                <a href="rate_student.php?user_id=<?php echo $row['user_id']; ?>">Evaluate</a>
            </td>
        </tr>
    <?php } ?>
</table>
