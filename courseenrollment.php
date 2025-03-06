<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Enrollment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        .enroll-section {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input, select, button {
            width: 95%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: rgba(240, 128, 128, 0.9);
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #ff6347;
        }
        .error {
            color: red;
            font-size: 12px;
        }
            
    </style>
</head>
<body>

<section id="enroll-form" class="enroll-section">
    <h2>Enroll in a Course</h2>
    <form id="enrollmentForm" action="" method="post" onsubmit="return validateForm()">
        <label for="full-name">Full Name:</label>
        <input type="text" id="full-name" name="full-name" required>
        <span id="nameError" class="error"></span>

        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required>
        <span id="emailError" class="error"></span>

        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" required pattern="\d{10}">
        <span id="phoneError" class="error"></span>

        <label for="vehicle-type">Select Vehicle Type:</label>
        <select id="vehicle-type" name="vehicle-type" required>
            <option value="">Choose</option>
            <option value="car">Car</option>
            <option value="motorcycle">Motorcycle</option>
            <option value="scooter">Scooter</option>
        </select>
        <span id="vehicleError" class="error"></span>

        <label for="course-type">Select Course Type:</label>
        <select id="course-type" name="course-type" required>
            <option value="">Choose</option>
            <option value="beginner">Beginner's Course</option>
            <option value="advanced">Advanced Techniques</option>
            <option value="test-preparation">Test Preparation</option>
        </select>
        <span id="courseError" class="error"></span>

        <label for="course-time">Select Course Time:</label>
        <select id="course-time" name="course-time" required>
            <option value="">Choose</option>
            <option value="morning">Morning (9 AM - 10 AM)</option>
            <option value="afternoon">Afternoon (12 AM - 1 PM)</option>
            <option value="evening">Evening (2 PM - 3 PM)</option>
        </select>
        <span id="timeError" class="error"></span>

        <label for="start-date">Select Start Date:</label>
        <input type="date" id="start-date" name="start-date" required>
        <span id="dateError" class="error"></span>

        <label for="payment-method">Select Payment Method:</label>
        <select id="payment-method" name="payment-method" required>
            <option value="">Choose</option>
            <option value="credit-card">Credit Card</option>
            <option value="bank-transfer">Bank Transfer</option>
            <option value="cash">Cash</option>
        </select>
        <span id="paymentError" class="error"></span>

        <button type="submit">Enroll Now</button>
    </form>
</section>



<script>
function validateForm() {
    let isValid = true;

    const fullName = document.getElementById('full-name').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const vehicleType = document.getElementById('vehicle-type').value;
    const courseType = document.getElementById('course-type').value;
    const courseTime = document.getElementById('course-time').value;
    const startDate = document.getElementById('start-date').value;
    const paymentMethod = document.getElementById('payment-method').value;

    if (fullName === "") {
        document.getElementById('nameError').innerText = "Full Name is required.";
        isValid = false;
    } else {
        document.getElementById('nameError').innerText = "";
    }

    if (email === "") {
        document.getElementById('emailError').innerText = "Email is required.";
        isValid = false;
    } else {
        document.getElementById('emailError').innerText = "";
    }

    if (phone === "" || !/^\d{10}$/.test(phone)) {
        document.getElementById('phoneError').innerText = "Valid phone number is required.";
        isValid = false;
    } else {
        document.getElementById('phoneError').innerText = "";
    }

    if (vehicleType === "") {
        document.getElementById('vehicleError').innerText = "Please select a vehicle type.";
        isValid = false;
    } else {
        document.getElementById('vehicleError').innerText = "";
    }

    if (courseType === "") {
        document.getElementById('courseError').innerText = "Please select a course type.";
        isValid = false;
    } else {
        document.getElementById('courseError').innerText = "";
    }

    if (courseTime === "") {
        document.getElementById('timeError').innerText = "Please select a course time.";
        isValid = false;
    } else {
        document.getElementById('timeError').innerText = "";
    }

    if (startDate === "") {
        document.getElementById('dateError').innerText = "Please select a start date.";
        isValid = false;
    } else {
        document.getElementById('dateError').innerText = "";
    }

    if (paymentMethod === "") {
        document.getElementById('paymentError').innerText = "Please select a payment method.";
        isValid = false;
    } else {
        document.getElementById('paymentError').innerText = "";
    }

    return isValid;
}
</script>



<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    $fullName = trim($_POST['full-name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $vehicleType = $_POST['vehicle-type'];
    $courseType = $_POST['course-type'];
    $courseTime = $_POST['course-time'];
    $startDate = $_POST['start-date'];
    $paymentMethod = $_POST['payment-method'];

    if (empty($fullName)) {
        $errors[] = "Full Name is required.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required.";
    }
    if (!preg_match("/^\d{10}$/", $phone)) {
        $errors[] = "Valid phone number is required.";
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
    if (empty($startDate)) {
        $errors[] = "Start date is required.";
    }
    if (empty($paymentMethod)) {
        $errors[] = "Payment method is required.";
    }

    if (empty($errors)) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "project";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO enrollments (full_name, email, phone, vehicle_type, course_type, course_time, start_date, payment_method) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $fullName, $email, $phone, $vehicleType, $courseType, $courseTime, $startDate, $paymentMethod);

        if ($stmt->execute()) {
            echo "<p>Enrollment successful!</p>";
        } else {
            echo "<p>Error: " . $stmt->error . "</p>";
        }

        $stmt->close();
        $conn->close();
    } else {
        foreach ($errors as $error) {
            echo "<p class='error'>$error</p>";
        }
    }
}
?>

</body>
</html>