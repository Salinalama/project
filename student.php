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
    <title>Student Dashboard - Driving School Management</title>
    <link rel="stylesheet" href="dashboard_style.css">

 
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <h1>Student Dashboard</h1>
        <button class="logout" onclick="location.href='logout.php'">Logout</button>
    </div>

    <!-- Dashboard Layout -->
    <div class="dashboard">
        <!-- Sidebar -->
        <div class="sidebar">
            <a href="manageschedule1.php">View Schedule</a>
            <a href="student_progress.php">Progress Report</a>
            <a href="courseenrollment.php">Course Enrollment Form</a>
            <a href="view_enrollmentsdetail.php">Enrollment details</a>
            <a href="profile.php">Profile</a>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <h2>Welcome, <?php echo ($_SESSION['username']); ?>!</h2>

         
        </div>
    </div>

</body>
</html>
