<?php
session_start();
if ($_SESSION['authuser'] != 1) {
    echo "ACCESS DENIED";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>New Course Registration</title>
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
            width: 350px;
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
        .card input[type="submit"] {
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
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        .card input[type="submit"]:hover {
            background-color: #45a049;
        }

        .login-button {
            margin-top: 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
            font-size: 16px;
            cursor: pointer;
        }

        .login-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="card">
        <form name="form1" action="default.php">
            <input type="submit" class="login-button" name="Submit" value="Login">
        </form>
        <h2>New Course Registration</h2>
        <form method="post" action="insert_course.php">
            Course ID: <input type="text" name="name"><br/>
            Credit: <input type="text" name="credit"><br/>
            Instructor: <input type="text" name="instructor"><br/>
            <input type="submit" class="myButton" name="submit" value="Register">
        </form>
    </div>
</body>
</html>
