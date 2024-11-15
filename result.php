<?php
session_start();
if ($_SESSION['authuser'] != 1) {
    echo "ACCESS DENIED";
    exit();
}

$connect = mysqli_connect("localhost", "root", "123456789") or die("Check your server connection");
$uname = $_GET['myusername'];
$upass = $_GET['mypassword'];

$_SESSION['username'] = $uname;
$_SESSION['pass'] = $upass;

mysqli_select_db($connect, "2008b4a5723p");
$query = "SELECT * FROM members WHERE username='$uname' and password='$upass'";

$results = mysqli_query($connect, $query) or die(mysqli_error($connect));

if ($row = mysqli_fetch_array($results)) {
    echo "<div class='card'>
            <h2>Welcome, " . $row['username'] . "!</h2>
            <div class='user-info'>
                <p><strong>Username:</strong> " . $row['username'] . "</p>
                <p><strong>Branch:</strong> " . $row['branch'] . "</p>
                <p><strong>Year of Passing:</strong> " . $row['year'] . "</p>
            </div>
          </div>";
} else {
    echo "<div class='card error'>
            <h2>Login Failed</h2>
            <p>Invalid username or password.</p>
          </div>";
    exit();
}

echo "<div class='card'>
        <h2>Registered Courses</h2>
        <table class='table'>
            <tr>
                <th>Action</th>
                <th>Course ID</th>
                <th>Credits</th>
                <th>Instructor</th>
            </tr>";

$query = "SELECT regis.cname, course.credit, course.instructor 
          FROM course 
          INNER JOIN regis 
          ON course.name = regis.cname 
          AND regis.uname = '$uname';";

$results = mysqli_query($connect, $query) or die(mysqli_error($connect));

while ($rows = mysqli_fetch_assoc($results)) {
    echo "<tr>
            <td><a href='Remove_Course.php?cname=$rows[cname]&uuname=$uname'>Remove</a></td>";
    foreach ($rows as $value) {
        echo "<td>$value</td>";
    }
    echo "</tr>";
}

echo "  </table>
      </div>";
?>
<br/>

<div class="buttons">
    <form method="post" action="default.php">
        <input type="submit" class="myButton" name="add" value="Logout">
    </form>
    <form method="post" action="add.php">
        <input type="submit" class="myButton" name="add" value="Add User Information">
    </form>
    <form method="post" action="new_course_reg.php">
        <input type="submit" class="myButton" name="add" value="Course Registration">
    </form>
    <form method="get" action="edit_course.php">
        <input type="submit" class="myButton" name="add" value="Edit Course(s)">
    </form>
</div>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="text.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f8f9fa;
        }
        .card {
            background: #ffffff;
            border: 1px solid #dddddd;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card h2 {
            margin-top: 0;
            color: #333333;
        }
        .card .user-info p {
            margin: 5px 0;
        }
        .card.error {
            border-color: #ff4d4d;
            background: #ffe6e6;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        .table th, .table td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }
        .table th {
            background-color: #f2f2f2;
        }
        .buttons form {
            display: inline-block;
            margin-right: 10px;
        }
        .myButton {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        .myButton:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
</body>
</html>
