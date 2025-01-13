<?php require_once 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 20px;
            color: #333;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #2c3e50;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        a {
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
        }

        a:hover {
            color: #2980b9;
            text-decoration: underline;
        }

        .confirm {
            color: #e74c3c;
        }
    </style>
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
        $sql = "SELECT * FROM users";

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
                        <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete your data?')">Delete</a>
                    </td>
                </tr>
        <?php
            }
        }
        ?>
    </table>
</body>

</html>
