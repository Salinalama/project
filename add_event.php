<?php
require_once 'connect.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $course_name = $_POST['Course_name'];
    $course_date = $_POST['Course_date'];
    $instructor = $_POST['Instructor'];

    // Insert the new event into the database
    $sql = "INSERT INTO events (Course_name, Course_date, Instructor) VALUES ('$Event_name', '$Event_date', '$Instructor')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Event added successfully!'); window.location.href='events.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Upcoming Schedules</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 20px;
            color: #333;
        }

        form {
            width: 50%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        input[type="text"], input[type="date"], textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #2c3e50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #1a252f;
        }

        a {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: #3498db;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Add Upcoming Schedules</h2>
    <form action="" method="POST">
        Event Name: <input type="text" name="course_name" required><br><br>
        Event Date: <input type="date" name="course_date" required><br><br>
        Event Description: <textarea name="instructor" rows="5" required></textarea><br><br>
        <input type="submit" value="Add ">
        <a href="events.php">Back to Event List</a>
    </form>
</body>
</html>