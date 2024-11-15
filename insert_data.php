<?php
session_start();
if ($_SESSION['authuser'] != 1) {
    echo "ACCESS DENIED";
    exit();
}
$connect = mysqli_connect("localhost", "root", "123456789") or die("check your server connection.");
mysqli_select_db($connect, "2008b4a5723p");

$name = $_POST['name'];
$pass = $_POST['pass'];
$branch = $_POST['branch'];
$year = $_POST['year'];

?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration Status</title>
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

        /* Success and error message styling */
        .message {
            font-size: 18px;
            margin-bottom: 20px;
            color: #333;
        }

        /* Submit button styling */
        .myButton {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            text-decoration: none;
        }

        .myButton:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="card">
        <?php
        if ($name == '' || $pass == '' || $branch == '' || $year == '') {
            echo "<p class='message'>ERROR IN REGISTRATION</p>";
        } else {
            $insert = "INSERT INTO members(username, password, branch, year) VALUES ('$name', '$pass', '$branch', '$year')";
            $results = mysqli_query($connect, $insert) or die(mysqli_error($connect));
            echo "<p class='message'>Successfully added information</p>";
        }
        ?>
        <form method="post" action="/project">
            <input type="submit" class="myButton" name="wel" value="Click here to go to login page">
        </form>
    </div>
</body>
</html>
