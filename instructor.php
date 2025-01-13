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
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            color: #333;
        }

        /* Navbar Styles */
        .navbar {
            background-color: #2c3e50;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h1 {
            font-size: 24px;
        }

        .navbar .logout {
            background-color: #e74c3c;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .navbar .logout:hover {
            background-color: #c0392b;
        }

        /* Layout Styles */
        .dashboard {
            display: flex;
            height: calc(100vh - 60px);
        }

        .sidebar {
            width: 250px;
            background-color: #34495e;
            color: white;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            margin: 5px 0;
            border-radius: 5px;
            display: block;
        }

        .sidebar a:hover {
            background-color: #1abc9c;
        }

        .main-content {
            flex-grow: 1;
            padding: 20px;
            background-color: #ecf0f1;
        }

        .main-content h2 {
            margin-bottom: 20px;
        }

        .card {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card h3 {
            margin-bottom: 10px;
        }
    </style>
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
            <a href="schedule.php">View Schedule</a>
            <a href="students.php">Assigned Students</a>
            <a href="performance.php">Performance Overview</a>
            <a href="notifications.php">Notifications</a>
            <a href="profile.php">Profile Settings</a>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <h2>Welcome, <?php echo ($_SESSION['username']); ?>!</h2>
            <!-- <div class="card">
                <h3>Today's Classes</h3>
                <p>You have 3 classes scheduled for today.</p>
                <p><a href="schedule.php">View Full Schedule</a></p>
            </div>
            <div class="card">
                <h3>Quick Stats</h3>
                <p>Assigned Students: 25</p>
                <p>Classes Completed This Month: 18</p>
            </div>
            <div class="card">
                <h3>Notifications</h3>
                <p>No new notifications.</p>
                <p><a href="notifications.php">View All Notifications</a></p>
            </div> -->
        </div>
    </div>

</body>
</html>
