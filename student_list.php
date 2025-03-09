<?php
require_once 'connect.php';

// Fetch students (user_type = 'student')
$sql_students = "SELECT user_id, username FROM users WHERE user_type = 'student'";
$result_students = mysqli_query($conn, $sql_students);

// Fetch instructors (user_type = 'instructor')
$sql_teachers = "SELECT user_id, username FROM users WHERE user_type = 'instructor'"; 
$result_teachers = mysqli_query($conn, $sql_teachers);
$teachers = [];
while ($row = mysqli_fetch_assoc($result_teachers)) {
    $teachers[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link rel="stylesheet" href="table_style.css">
</head>
<body>
    
<h2 style="text-align: center;">Students List</h2>
<table border="1">
    <tr>
        <th>Username</th>
        <th>Assign to Instructor</th>
        <!-- <th>Action</th> -->
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result_students)) { ?>
        <tr>
            <td><?php echo $row['username']; ?></td>
            <td>
                <form action="assign_teacher.php" method="POST">
                    <input type="hidden" name="student_id" value="<?php echo $row['user_id']; ?>">
                    <select name="teacher_id" required>
    <option value="" selected disabled>Select Instructor</option> <!-- Default option -->
    <?php foreach ($teachers as $teacher) { ?>
        <option value="<?php echo $teacher['user_id']; ?>"><?php echo $teacher['username']; ?></option>
    <?php } ?>
</select>
                    <button type="submit">Assign</button>
                </form>
            </td>
        </tr>
    <?php } ?>
</table>

</body>
</html>
