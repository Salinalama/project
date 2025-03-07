<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progress Report</title>
    <link rel="stylesheet" href="styling.css">  <!-- Add this line to link external CSS -->
</head>
<body>

<div class="report-card">
    <?php
    session_start();
    require_once 'connect.php';

    if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
        die("User not logged in. Please <a href='login.php'>login</a>.");
    }

    $username = $_SESSION['username'];
    $sql = "SELECT username, rating_score, performance_level FROM students WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Database error: " . mysqli_error($conn));
    }

    $row = mysqli_fetch_assoc($result);
    ?>

    <?php if ($row): ?>
        <h2>Progress Report for <?php echo htmlspecialchars($row['username']); ?></h2>
        <p><strong>Rating Score:</strong> <span class="highlight"><?php echo htmlspecialchars($row['rating_score']); ?>/100</span></p>
        <p><strong>Performance Level:</strong> <?php echo htmlspecialchars($row['performance_level']); ?></p>
    <?php else: ?>
        <p>No progress report found.</p>
    <?php endif; ?>
</div>

</body>
</html>
