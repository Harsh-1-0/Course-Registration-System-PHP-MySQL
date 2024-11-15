<?php
session_start();
if ($_SESSION['authuser'] != 1) {
    echo "ACCESS DENIED";
    exit();
}

$name = $_POST['myusername'];
$pass = $_POST['mypassword'];

if ($name != "admin" || $pass != "admin") {
    echo "ACCESS DENIED";
    exit();
}
?>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="text.css" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #ADD8E6;
        }
        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px 40px;
            width: 400px;
            text-align: center;
        }
        .card h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
        }
        .form-group input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            color: white;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }
        .form-group input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h2>Admin Dashboard</h2>
            <form method="post" action="select_course.php" class="form-group">
                <input type="text" name="cname" placeholder="COURSE ID" required>
                <input type="submit" class="myButton" name="submit" value="Students Enrolled">
            </form>

            <form method="post" action="select_student.php" class="form-group">
                <input type="text" name="name" placeholder="STUDENT NAME" required>
                <input type="submit" class="myButton" name="submit" value="Courses Enrolled">
            </form>

            <form method="post" action="add_course.php" class="form-group">
                <input type="submit" class="myButton" name="wel" value="ADD NEW COURSE">
            </form>

            <form method="post" action="admin_edit_course.php" class="form-group">
                <input type="submit" class="myButton" name="submit" value="EDIT EXISTING STUDENT COURSE">
            </form>
        </div>
    </div>
</body>
</html>
