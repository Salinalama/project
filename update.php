<?php
require_once 'connect.php';

$sql = "UPDATE users
        SET
        username = '" . $_POST['username'] . "', 
        email = '" . $_POST['email'] . "'

        WHERE id = " . $_GET['id'];

//executing a query in database
$query = mysqli_query($conn, $sql);

if ($query) {
    //success
    header('location: select.php');
    exit;
} else {
    echo mysqli_error($conn);
}