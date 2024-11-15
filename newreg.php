<?php
session_start();
if ($_SESSION['authuser'] != 1) {
    echo "ACCESS DENIED";
    exit();
}
$connect = mysqli_connect("localhost", "root", "123456789") or die("check your server connection.");
mysqli_select_db($connect, "2008b4a5723p");
?>
<!DOCTYPE html>
<html>
<head>
    <title>STUDENT REGISTRATION</title>
    <style>
        /* General styling */
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f3f4f6;
        }

        /* Card container styling */
        .card {
            background-color: #fff;
            width: 320px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .card h2 {
            color: #333;
            margin-bottom: 20px;
        }

        /* Form input styling */
        .card input[type="text"],
        .card input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        /* Submit button styling */
        .card input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        .card input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>STUDENT REGISTRATION</h2>
        <form method="post" action="insert_data.php">
            Name: <input type="text" name="name"><br/>
            Password: <input type="password" name="pass"><br/>
            Branch: <input type="text" name="branch"><br/>
            Year of passing: <input type="text" name="year"><br/>
            <input type="submit" class="myButton" name="submit" value="Register">
        </form>
    </div>
</body>
</html>
