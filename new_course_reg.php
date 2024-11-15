<?php
session_start();
if ($_SESSION['authuser'] != 1) {
    echo "ACCESS DENIED";
    exit();
}

$connect = mysqli_connect("localhost", "root", "123456789") or die("Check your server connection.");

mysqli_select_db($connect, "2008b4a5723p");

?>
<html>
<head>
    <title>Course Registration</title>
    <link rel="stylesheet" type="text/css" href="text.css" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            margin: 0;
        }
        .card {
            background: #ffffff;
            border: 1px solid #dddddd;
            border-radius: 8px;
            width: 500px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
            text-align: center;
        }
        .card h2 {
            margin-bottom: 20px;
            color: #333333;
        }
        .course-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .course-table th, .course-table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #dddddd;
        }
        .course-table th {
            background-color: #007bff;
            color: white;
        }
        .card input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #dddddd;
            border-radius: 4px;
        }
        .card .myButton {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #007bff;
            border: none;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }
        .card .myButton:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Course Registration</h2>
        <h3>Available Courses</h3>
        <table class="course-table">
            <thead>
                <tr>
                    <th>Course Name</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT course.name FROM course";
                $results = mysqli_query($connect, $query) or die(mysqli_error($connect));
                while ($rows = mysqli_fetch_assoc($results)) {
                    echo "<tr>";
                    foreach ($rows as $value) {
                        echo "<td>" . htmlspecialchars($value) . "</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <form method="post" action="student_course.php">
            <input type="text" name="name" placeholder="Your User Name" required>
            <input type="text" name="course" placeholder="Course ID" required>
            <input type="submit" class="myButton" name="submit" value="Register">
        </form>
    </div>
</body>
</html>
