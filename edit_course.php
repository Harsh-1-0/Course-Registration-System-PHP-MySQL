<form name="form1" method="post" action="default.php">
    <input type="submit" class="myButton" name="Submit" value="Student Login">
</form>

<?php
session_start();
if ($_SESSION['authuser'] != 1) {
    echo "ACCESS DENIED";
    exit();
}

$connect = mysqli_connect("localhost", "root", "123456789") or die("Check your server connection.");
$name = $_SESSION['username'];
mysqli_select_db($connect, "2008b4a5723p");

echo "<h2>Courses Taken by '$name'</h2>";

$query = "SELECT regis.cname, course.credit, course.instructor 
          FROM course 
          INNER JOIN regis 
          ON course.name = regis.cname 
          AND regis.uname = '$name'";

$results = mysqli_query($connect, $query) or die(mysqli_error($connect));

?>
<html>
<head>
    <title>Courses Taken</title>
    <link rel="stylesheet" type="text/css" href="text.css" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            padding: 20px;
            margin: 0;
        }
        .card {
            background: #ffffff;
            border: 1px solid #dddddd;
            border-radius: 8px;
            width: 600px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px auto;
            text-align: center;
        }
        h2 {
            color: #333333;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #dddddd;
        }
        table th {
            background-color: #007bff;
            color: white;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #dddddd;
            border-radius: 4px;
        }
        .myButton {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #007bff;
            border: none;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }
        .myButton:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Courses Taken by '<?php echo htmlspecialchars($name); ?>'</h2>
        <table>
            <thead>
                <tr>
                    <th>Course Name</th>
                    <th>Credits</th>
                    <th>Instructor</th>
                </tr>
            </thead>
            <tbody>
                <?php
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

        <form method="post" action="course_edited.php">
            <input type="text" name="name" placeholder="Your Username" required>
            <input type="text" name="course" placeholder="Course to Change" required>
            <input type="text" name="new" placeholder="New Course" required>
            <input type="submit" class="myButton" name="submit" value="Change Course">
        </form>
    </div>
</body>
</html>
