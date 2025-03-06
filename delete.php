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

    //cross checking from if the error id value is passed from url query string e.g. id=13211513351
    $sql_1 = "SELECT * FROM users WHERE user_id = " . $user_id;
    $query_1 = mysqli_query($conn, $sql_1);

    //validates if there is data in a table or not.
    if (mysqli_num_rows($query_1) <= 0) {
        header('location: select.php');
        exit;
    }

    $sql = "DELETE FROM users WHERE user_id = " . $user_id;
    $query = mysqli_query($conn, $sql);

    if ($query) {
        //success
        header('location: select.php');
        exit;
    } else {
        header('location: select.php');
        exit;
    }
} else {
    header('location: select.php');
    exit;
}