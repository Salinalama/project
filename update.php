<?php
require_once 'connect.php';

$sql = "UPDATE users
        SET
        username = '" . $_POST['username'] . "', 
        email = '" . $_POST['email'] . "'

        WHERE user_id = " . $_GET['user_id'];

//executing a query in database
$query = mysqli_query($conn, $sql);

if ($query) {
    //success
    header('location: select.php');
    exit;
} else {
    echo mysqli_error($conn);
}