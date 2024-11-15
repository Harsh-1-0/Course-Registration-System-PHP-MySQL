<?php
session_start();
if ($_SESSION['authuser'] != 1) {
    echo "ACCESS DENIED";
    exit();
}
?>

<html>
<head>
    <title>Add User Information</title>
    <link rel="stylesheet" type="text/css" href="text.css" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .card {
            background: #ffffff;
            border: 1px solid #dddddd;
            border-radius: 8px;
            width: 400px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }
        .card h2 {
            margin-bottom: 20px;
            color: #333333;
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
        <h2>Add User Information</h2>
        <form method="post" action="modify.php">
            <input type="text" name="info" placeholder="Add User Information Name" required><br />
            <input type="text" name="value" placeholder="Add Information" required><br />
            <input type="submit" class="myButton" name="submit" value="Submit">
        </form>
    </div>
</body>
</html>
