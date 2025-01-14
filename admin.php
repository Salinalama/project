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
        <h1>Admin Dashboard</h1>
        <button class="logout" onclick="location.href='logout.php'">Logout</button>
    </div>

    <!-- Dashboard Layout -->
    <div class="dashboard">
        <!-- Sidebar -->
        <div class="sidebar">
            <a href="select.php">Manage Students</a>
            <a href="#">Manage Instructors</a>
            <a href="#">Manage Schedules</a>
            <!-- <a href="#">Manage Vehicles</a> -->
            <a href="#">Reports</a>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <h2>Welcome, <?php echo ($_SESSION['username']); ?>!</h2>
            <!-- <div class="card">
                <h3>Overview</h3>
                <p>Number of Students: 120</p>
                <p>Number of Instructors: 15</p>
                <p>Upcoming Classes: 8</p>
            </div>
            <div class="card">
                <h3>Quick Actions</h3>
                <p>Use the sidebar to manage system resources.</p>
            </div> -->
        </div>
    </div>

</body>
</html>
