<?php
require_once 'connect.php';
if (isset($_GET['user_id']) && !empty($_GET['user_id'])) {
    //access granted
    $user_id = (int)$_GET['user_id']; //data type casting

    if ($user_id <= 0) {
        //cross checking if invalid id passed from url query e.g. id=asdjdas
        header('location: select.php');
        exit;
    }

    //old records from database tables are retrieved in order to display in the form
    $sql_1 = "SELECT * FROM users WHERE user_id = " . $user_id;
    $query_1 = mysqli_query($conn, $sql_1);

    //validates if there is data in a table or not.
    if (mysqli_num_rows($query_1) <= 0) {
        header('location: select.php');
        exit;
    }

    //Retrieving a single row of existing data from a database table
    $old_data = mysqli_fetch_assoc($query_1);
} else {
    header('location: select.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="update.php?user_id=<?php echo $old_data['user_id']; ?>" method="POST" enctype="" name="form">

        Name: <input type="text" name="username" value="<?php echo $old_data['username']; ?>"> <br><br>
        Email: <input type="email" name="email" value="<?php echo $old_data['email']; ?>"> <br><br>

      
        <input type="submit" value="Update">
    </form>
</body>

</html>