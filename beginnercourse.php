<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enroll in Beginner's Course</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin: 10px 0 5px;
            font-weight: bold;
        }
        input, select, button {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Enroll in Beginner's Course</h2>
        <form action="" method="POST">
            <label for="fullName">Full Name</label>
            <input type="text" id="fullName" name="fullName" required>

            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" required>

            <label for="contactNumber">Contact Number</label>
            <input type="tel" id="contactNumber" name="contactNumber" required>

            <label for="startDate">Preferred Start Date</label>
            <input type="date" id="startDate" name="startDate" required>

            <label for="vehicleType">Type of Vehicle</label>
            <select id="vehicleType" name="vehicleType" required>
                <option value="car">Car</option>
                <option value="motorbike">Motorbike</option>
                
                <option value="scooter">Scooter</option>
            </select>

            <label for="paymentMethod">Payment Method</label>
            <select id="paymentMethod" name="paymentMethod" required>
                <option value="creditCard">Credit Card</option>
                <option value="paypal">PayPal</option>
                <option value="bankTransfer">Bank Transfer</option>
            </select>

            <button type="submit" name="submit">Submit</button>
        </form>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Database configuration
        $host = 'localhost'; // Replace with your host
        $user = 'root'; // Replace with your database username
        $password = ''; // Replace with your database password
        $dbname = 'driving_school';

        // Create a connection
        $conn = new mysqli($host, $user, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Collect form data
        $fullName = $conn->real_escape_string($_POST['fullName']);
        $email = $conn->real_escape_string($_POST['email']);
        $contactNumber = $conn->real_escape_string($_POST['contactNumber']);
        $startDate = $conn->real_escape_string($_POST['startDate']);
        $vehicleType = $conn->real_escape_string($_POST['vehicleType']);
        $paymentMethod = $conn->real_escape_string($_POST['paymentMethod']);

        // Insert data into the database
        $sql = "INSERT INTO enrollments (full_name, email, contact_number, start_date, vehicle_type, payment_method)
                VALUES ('$fullName', '$email', '$contactNumber', '$startDate', '$vehicleType', '$paymentMethod')";

        if ($conn->query($sql) === TRUE) {
            echo "<p style='text-align: center; color: green;'>Enrollment successful! Thank you, $fullName.</p>";
        } else {
            echo "<p style='text-align: center; color: red;'>Error: " . $conn->error . "</p>";
        }

        // Close the connection
        $conn->close();
    }
    ?>
</body>
</html>
