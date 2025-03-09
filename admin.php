<?php
session_start(); // Start the session
if (!isset($_SESSION['username'])) {
    // Redirect to login page if user is not logged in
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Driving School Management</title>
    <link rel="stylesheet" href="dashboard_style.css">
    
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <h1>Admin Dashboard</h1>
        <button class="logout" onclick="location.href='logout.php'">Logout</button>
    </div>

    <!-- Dashboard Layout -->
    <div class="dashboard">
        <!-- Sidebar -->
        <div class="sidebar">
            <a href="select.php">Manage Students</a>
            <a href="manageinstructor.php">Manage Instructors</a>
            <a href="manageschedule.php">Manage Schedules</a>
            <!-- <a href="attendance.php">Mark attendance</a> -->
            <a href="student_list.php">Assign student</a>
            <a href="enrollment_records.php">Enrollment Records</a>


            <!-- <a href="#">Manage Vehicles</a> -->
            <a href="display_student.php">Reports</a>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <h2>Welcome, <?php echo ($_SESSION['username']); ?>!</h2>
            
        </div>
    </div>

</body>
</html>
