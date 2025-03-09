<?php
session_start(); // Start the session

// Redirect to login if the student is not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login page
    exit();
}

// Database Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the student's details
$student_username = $_SESSION['username']; // Use the session username
$sql = "SELECT * FROM enrollments WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $student_username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $student = $result->fetch_assoc(); // Fetch the student's record
} else {
    die("Student not found.");
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <style>
        body {
        
            font-family: Arial, sans-serif;
            background-color:rgb(255, 255, 255);
            padding: 20px;
        }
        .dashboard-container {
            max-width: 600px;
            margin: 0 auto;
            background-color:rgb(248, 248, 248);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .dashboard-container h2 {
            text-align: center;
            color: #333;
            background-color:  #7e9c92;
            margin: 0;
            padding: 10px;
            
        }
        .student-details {
            margin-top: 20px;
        }
        .student-details p {
            font-size: 18px;
            margin: 10px 0;
        }
        .student-details strong {
            color: #555;
        }
        .logout-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #4CAF50;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="dashboard-container">
    <h2>Your enrollment details</h2>
    <div class="student-details">
        <p><strong>Full Name:</strong> <?php echo $student['full_name']; ?></p>
        <p><strong>Username:</strong> <?php echo $student['username']; ?></p>
        <p><strong>Email:</strong> <?php echo $student['email']; ?></p>
        <p><strong>Phone:</strong> <?php echo $student['phone']; ?></p>
        <p><strong>Vehicle Type:</strong> <?php echo $student['vehicle_type']; ?></p>
        <p><strong>Course Type:</strong> <?php echo $student['course_type']; ?></p>
        <p><strong>Course Time:</strong> <?php echo $student['course_time']; ?></p>
        <p><strong>Start Date:</strong> <?php echo $student['start_date']; ?></p>
        <p><strong>Payment Method:</strong> <?php echo $student['payment_method']; ?></p>
 

</body>
</html>