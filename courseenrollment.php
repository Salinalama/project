<?php
// PHP code for form submission and validation
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    // Database Connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("<p class='error'>Connection failed: " . $conn->connect_error . "</p>");
    }

    // Sanitize Inputs
    $fullName = trim($_POST['full-name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $vehicleType = trim($_POST['vehicle-type']);
    $courseType = trim($_POST['course-type']);
    $courseTime = trim($_POST['course-time']);
    $startDate = trim($_POST['start-date']);
    $paymentMethod = trim($_POST['payment-method']);

    // Validations
    if (empty($fullName)) {
        $errors[] = "Full Name is required.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required.";
    }
    if (!preg_match("/^\d{10}$/", $phone)) {
        $errors[] = "Valid phone number (10 digits) is required.";
    }
    if (empty($vehicleType)) {
        $errors[] = "Vehicle type is required.";
    }
    if (empty($courseType)) {
        $errors[] = "Course type is required.";
    }
    if (empty($courseTime)) {
        $errors[] = "Course time is required.";
    }

    // Check if date is today or later
    $today = date("Y-m-d");
    if (empty($startDate)) {
        $errors[] = "Start date is required.";
    } elseif ($startDate < $today) {
        $errors[] = "Start date cannot be in the past.";
    }

    if (empty($paymentMethod)) {
        $errors[] = "Payment method is required.";
    }

    // Check if the email or phone already exists in the database
    if (empty($errors)) {
        $checkStmt = $conn->prepare("SELECT * FROM enrollments WHERE email = ? OR phone = ?");
        $checkStmt->bind_param("ss", $email, $phone);
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            $errors[] = "A student with this email or phone number is already enrolled.";
        }

        $checkStmt->close();
    }

    // If no errors, insert into database
    if (empty($errors)) {
        $stmt = $conn->prepare("INSERT INTO enrollments (full_name, email, phone, vehicle_type, course_type, course_time, start_date, payment_method) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $fullName, $email, $phone, $vehicleType, $courseType, $courseTime, $startDate, $paymentMethod);

        if ($stmt->execute()) {
            echo "<p style='color: green; font-weight: bold;'>Enrollment successful!</p>";
        } else {
            echo "<p class='error'>Error: " . $stmt->error . "</p>";
        }

        $stmt->close();
    } else {
        foreach ($errors as $error) {
            echo "<p class='error'>$error</p>";
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Enrollment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 50px;
            margin-left: 20%;
            width: 60%;
            
        }
        .form-container {
            width: 60%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            color: #333;
            margin-bottom: 20px;
            background-color: #7e9c92;
            padding: 10px;
            color: white;
            border-radius: 10px 10px 0 0;
        }
        .form-container input, .form-container select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-container button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #45a049;
        }
        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Student Enrollment Form</h2>

    <!-- Enrollment Form -->
    <form method="POST" onsubmit="return validateForm()">
        <!-- Full Name -->
        <input type="text" id="full-name" name="full-name" placeholder="Enter Full Name" required>
        <p id="nameError" class="error"></p>

        <!-- Email -->
        <input type="email" id="email" name="email" placeholder="Enter Email" required>
        <p id="emailError" class="error"></p>

        <!-- Phone -->
        <input type="text" id="phone" name="phone" placeholder="Enter Phone (10 digits)" required>
        <p id="phoneError" class="error"></p>

        <!-- Vehicle Type -->
        <select id="vehicle-type" name="vehicle-type" required>
            <option value="">Select Vehicle Type</option>
            <option value="Car">Car</option>
            <option value="Motorcycle">Motorcycle</option>
            <option value="Truck">Truck</option>
        </select>
        <p id="vehicleError" class="error"></p>

        <!-- Course Type -->
        <select id="course-type" name="course-type" required>
            <option value="">Select Course Type</option>
            <option value="Beginner">Beginner</option>
            <option value="Advanced">Advanced</option>
            <option value="Test preparation">Test Preparation</option>
        </select>
        <p id="courseError" class="error"></p>

        <!-- Course Time -->
        <select id="course-time" name="course-time" required>
            <option value="">Select Course Time</option>
            <option value="Morning(9-10)">Morning(9-10)</option>
            <option value="Afternoon(2-3)">Afternoon(2-3)</option>
            <option value="Evening(5-6)">Evening(5-6)</option>
        </select>
        <p id="timeError" class="error"></p>

        <!-- Start Date -->
        <input type="date" id="start-date" name="start-date" required>
        <p id="dateError" class="error"></p>

        <!-- Payment Method -->
        <select id="payment-method" name="payment-method" required>
            <option value="">Select Payment Method</option>
            <option value="Credit Card">Credit Card</option>
            <option value="Debit Card">Debit Card</option>
            <option value="Cash">Cash</option>
        </select>
        <p id="paymentError" class="error"></p>

        <!-- Submit Button -->
        <button type="submit">Submit</button>
    </form>
</div>

<script>
// JavaScript for client-side validation
function validateForm() {
    let isValid = true;

    // Get form elements
    const fullName = document.getElementById('full-name').value.trim();
    const email = document.getElementById('email').value.trim();
    const phone = document.getElementById('phone').value.trim();
    const vehicleType = document.getElementById('vehicle-type').value;
    const courseType = document.getElementById('course-type').value;
    const courseTime = document.getElementById('course-time').value;
    const startDate = document.getElementById('start-date').value;
    const paymentMethod = document.getElementById('payment-method').value;

    // Clear previous errors
    document.querySelectorAll('.error').forEach(el => el.innerText = "");

    // Name validation
    if (fullName === "") {
        document.getElementById('nameError').innerText = "Full Name is required.";
        isValid = false;
    }

    // Email validation
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!email.match(emailPattern)) {
        document.getElementById('emailError').innerText = "Valid email is required.";
        isValid = false;
    }

    // Phone validation (only 10 digits allowed)
    if (!phone.match(/^\d{10}$/)) {
        document.getElementById('phoneError').innerText = "Valid phone number (10 digits) is required.";
        isValid = false;
    }

    // Vehicle type validation
    if (vehicleType === "") {
        document.getElementById('vehicleError').innerText = "Please select a vehicle type.";
        isValid = false;
    }

    // Course type validation
    if (courseType === "") {
        document.getElementById('courseError').innerText = "Please select a course type.";
        isValid = false;
    }

    // Course time validation
    if (courseTime === "") {
        document.getElementById('timeError').innerText = "Please select a course time.";
        isValid = false;
    }

    // Start date validation (cannot be in the past)
    const today = new Date();
    const selectedDate = new Date(startDate);
    if (selectedDate < today) {
        document.getElementById('dateError').innerText = "Start date cannot be in the past.";
        isValid = false;
    }

    // Payment method validation
    if (paymentMethod === "") {
        document.getElementById('paymentError').innerText = "Please select a payment method.";
        isValid = false;
    }

    return isValid;
}
</script>

</body>
</html>


