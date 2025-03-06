<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoGEAR Driving School</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f9f9f9;
            margin-top: 80px; /* Adjust to match the navbar's height */

        }

        header {
            background-color: #b7c393;
            position: fixed;
           top: 0;
           left: 0;
            width: 100%;
            z-index: 1000;
           box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);

        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }

        .navbar h1 {
            font-size: 24px;
            color: #fff;
        }

        .navbar ul {
            list-style: none;
            display: flex;
            gap: 15px;
        }

        .navbar ul li {
            display: inline;
        }

        .navbar ul li a {
            text-decoration: none;
            color: #fff;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .navbar ul li a:hover {
            background-color: #7e9c92;
        }

        .signIn {
            padding: 10px 20px;
            background-color: #ff0000;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .signIn:hover {
            background-color: #d40000;
        }

        .hero {
            margin-top: 80px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 40px 5%;
            background-color: #fff;
        }

        .hero .text-content {
            flex: 1;
            margin-right: 20px;
        }

        .hero .text-content h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .hero .text-content p {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .hero img {
            flex: 1;
            max-width: 500px;
            border-radius: 10px;
        }

        section {
            padding: 40px 5%;
        }

        .about-section, .courses-section {
            background-color: #b7c393; /*note*/
            margin: 20px auto;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            
        }
        .about-section{
            text-align: center;
            max-width: 90%;
        }

        .courses-section h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .courses-section .course-card {
            display: inline-block;
            width: 30%;
            margin: 10px;
            padding: 20px;
            background-color: #f4f4f4;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-align: center;
            vertical-align: top;
            min-height: 250px;
        }

        .course-card h3 {
            margin-bottom: 10px;
        }

        .course-card p {
            margin-bottom: 20px;
        }

        .course-card .btn {
            padding: 10px 15px;
            background-color: #7e9c92;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
        }

        .course-card .btn:hover {
            background-color: #b7c393;
        }

        .contact-section {
            text-align: center;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        footer a {
            color: #fff;
            text-decoration: underline;
        }

        footer a:hover {
            color: #ff6347;
        }
    </style>
</head>

<body>
<header>
    <nav class="navbar">
        <h1>GoGEAR</h1>
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="#courses">Courses</a></li>
            <li><a href="#contact">Contact Us</a></li>
        </ul>
        <button class="signIn" onclick="location.href='login.php';">Login</button>
    </nav>
</header>
<section id="home" class="hero">
    <div class="text-content">
        <h2>Welcome to GoGEAR Driving School</h2>
        <p>We provide an all-in-one platform for seamless student tracking, scheduling, billing, and enhanced operational efficiency.</p>
        <button class="signIn" onclick="location.href='#courses';">View Courses</button>
    </div>
    <img src="driving.png" alt="Driving School">
</section>


<section id="courses" class="courses-section">
    <h2>Our Courses</h2>

    <div class="course-card">
        <h3>Beginner's Course</h3>
        <p>Learn the basics of driving in a safe and supportive environment.</p>
        <button class="btn details-btn" onclick="toggleDetails('beginner-details')">View Details</button>
        <a href="login1.php" class="btn">Enroll Now</a>
      
    <div id="beginner-details" class="course-details">
            
                <li>Basic driving techniques</li>
                <li>Traffic rules and regulations</li>
                <li>Safe driving practices</li>
           
            <p><strong>Duration:</strong> 4 weeks</p>
            <p><strong>Fee:</strong> NPR 10,000</p>
        </div>
        
    </div>

    <div class="course-card">
        <h3>Advanced Techniques</h3>
        <p>Refine your skills with advanced driving techniques.</p>
        
        <button class="btn details-btn" onclick="toggleDetails('advanced-details')">View Details</button>
        <a href="login1.php" class="btn">Enroll Now</a>
        <div id="advanced-details" class="course-details">
            <ul>
                <li>Advanced maneuvering</li>
                <li>Highway and night driving</li>
                <li>Defensive driving techniques</li>
            </ul>
            <p><strong>Duration:</strong> 6 weeks</p>
            <p><strong>Fee:</strong> NPR 15,000</p>
        </div>
    </div>

    <div class="course-card">
        <h3>Test Preparation</h3>
        <p>Get ready for your driving test with expert guidance.</p>
        
        <button class="btn details-btn" onclick="toggleDetails('test-prep-details')">View Details</button>
        <a href="login1.php" class="btn">Enroll Now</a>
        <div id="test-prep-details" class="course-details">
            <ul>
                <li>Mock tests and evaluations</li>
                <li>Review of traffic signs and rules</li>
                <li>Personalized feedback and improvement tips</li>
            </ul>
            <p><strong>Duration:</strong> 3 weeks</p>
            <p><strong>Fee:</strong> NPR 8,000</p>
        </div>
    </div>

</section>

<script>
function toggleDetails(id) {
    const details = document.getElementById(id);
    if (details.style.display === "none" || details.style.display === "") {
        details.style.display = "block";
    } else {
        details.style.display = "none";
    }
}
</script>

<section id="about" class="about-section">
    <h2>About Us</h2>
    <p>At GoGEAR, we are committed to delivering top-notch driving education to make you a confident and responsible driver. Our certified instructors and modern techniques ensure the best learning experience.</p>
</section>



<section id="contact" class="contact-section">
    <h2>Contact Us</h2>
    <p>Email: info@gogear.com</p>
    <p>Phone: +123 456 7890</p>
</section>

<footer>
    <p>&copy; 2024 GoGEAR. All Rights Reserved.</p>
    <p><a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
</footer>

</body>

</html>