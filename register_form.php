<?php
include 'connect2.php';

if (isset($_POST['register'])) {
    // Retrieve and sanitize inputs
    $fullname = $conn->real_escape_string($_POST['name']);
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Us
    
    $checkQuery = $conn->prepare("SELECT * FROM user WHERE email = ? OR username = ?");
    $checkQuery->bind_param("ss", $email, $username);
    $checkQuery->execute();
    $result = $checkQuery->get_result();

    if ($result->num_rows > 0) {
        echo "Email or Username already exists!";
    } else {
        $insertQuery = $conn->prepare("INSERT INTO users (name, username, email, password) VALUES (?, ?, ?, ?)");
        $insertQuery->bind_param("ssss", $fullname, $username, $email, $password);

        if ($insertQuery->execute()) {
            echo "Registration successful!";
            header("Location: admin.html");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    }

    $checkQuery->close();
    $insertQuery->close();
}

$conn->close();
?>
