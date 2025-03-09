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
    <title>Instructor Dashboard - Driving School Management</title>
    <link rel="stylesheet" href="dashboard_style.css">
    
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <h1>Instructor Dashboard</h1>
        <button class="logout" onclick="location.href='logout.php'">Logout</button>
    </div>

    <!-- Dashboard Layout -->
    <div class="dashboard">
        <!-- Sidebar -->
        <div class="sidebar">
            <a href="manageschedule1.php">View Schedule</a>
            <!-- <a href="display_assignstudent.php">Assigned Students</a> -->
            <a href="students_list.php">Evaluate Student</a>
            <a href="profile.php" onclick="location.href='profile.php'" >Profile </a>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <h2>Welcome, <?php echo ($_SESSION['username']); ?>!</h2>
            
        </div>
    </div>

</body>
</html>
