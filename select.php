<?php require_once 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="table_style.css">
    
</head>

<body>
    <table border="1">
        <tr>
            <th>ID.</th>
            <th>Username</th>
            <th>Email</th>
            <th>Action</th>
            
            
        </tr>
        <?php
        $sql = "SELECT * FROM users where user_type='student'";

        $query = mysqli_query($conn, $sql);
        $i = 1;

        if (mysqli_num_rows($query) <= 0) {
            echo "No data found in table.";
        } else {
            while ($row = mysqli_fetch_assoc($query)) {
                // echo "<pre>";
                // print_r($row);
                // echo "</pre>";

        ?>
                <tr>
                    <td><?php echo $i++ . "."; ?></td>
                 
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    
                    <td>
                        <a href="edit.php?user_id=<?php echo $row['user_id']; ?>">Edit</a>
                        <a href="delete.php?user_id=<?php echo $row['user_id']; ?>" onclick="return confirm('Are you sure you want to delete your data?')">Delete</a>
                    </td>
                </tr>
        <?php
            }
        }
        ?>
    </table>
</body>

</html>
