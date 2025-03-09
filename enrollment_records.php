<?php
// Database Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all enrollments from the database
$sql = "SELECT * FROM enrollments";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page - Enrollments</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #7e9c92;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .no-data {
            text-align: center;
            color: #777;
            padding: 20px;
        }
    </style>
</head>
<body>

<h1>Enrollment Records</h1>

<?php
if ($result->num_rows > 0) {
    // Display data in a table
    echo "<table>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Vehicle Type</th>
                <th>Course Type</th>
                <th>Course Time</th>
                <th>Start Date</th>
                <th>Payment Method</th>
            </tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["full_name"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["phone"] . "</td>
                <td>" . $row["vehicle_type"] . "</td>
                <td>" . $row["course_type"] . "</td>
                <td>" . $row["course_time"] . "</td>
                <td>" . $row["start_date"] . "</td>
                <td>" . $row["payment_method"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p class='no-data'>No enrollments found.</p>";
}

$conn->close();
?>

</body>
</html>