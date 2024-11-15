<?php
session_start();
if ($_SESSION['authuser'] != 1) {
    echo "ACCESS DENIED";
    exit();
}

// Database connection
$connect = mysqli_connect("localhost", "root", "123456789") or die("Check your server connection.");
mysqli_select_db($connect, "2008b4a5723p");

// Fetching courses
$name = htmlspecialchars($_POST['name']);
$query = "SELECT cname FROM regis WHERE uname='$name'";
$results = mysqli_query($connect, $query) or die(mysqli_error($connect));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses Enrolled</title>
    <link rel="stylesheet" type="text/css" href="text.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            max-width: 800px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: #007bff;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="admin_page.php" class="back-link">Admin Login</a>
        <h2>Courses Enrolled by: <?php echo htmlspecialchars($name); ?></h2>
        <table>
            <tr>
                <th>Course Name</th>
            </tr>
            <?php while ($rows = mysqli_fetch_assoc($results)) : ?>
                <tr>
                    <?php foreach ($rows as $value) : ?>
                        <td><?php echo htmlspecialchars($value); ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
