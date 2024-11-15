<?php
session_start();
session_destroy();
session_start();
$_SESSION['authuser'] = 1;

if (isset($_POST['save_btn'])) {
    $connect = mysqli_connect("localhost", "root", "123456789") or die("Check your server connection");
    $uname = $_GET['myusername'];
    $upass = $_GET['mypassword'];

    $_SESSION['username'] = $uname;
    $_SESSION['pass'] = $upass;

    mysqli_select_db($connect, database: "2008b4a5723p");
    $query = "SELECT * FROM members WHERE username='$uname' and password='$upass'";

    $results = mysqli_query($connect, $query) or die(mysqli_error($connect));

    if ($row = mysqli_fetch_array($results)) {
        echo '<script> window.location="SchoolDB/result.php"; </script>';
    } else {
        echo "LOGIN FAILED (INVALID USERNAME OR PASSWORD)";
        exit();
    }
}
?>

<html>
<head>
    <title>Student Login</title>
    <script type="text/javascript">
        function validate(form) {
            var userName = form.myusername.value;
            var password = form.mypassword.value;

            if (userName.length === 0) {
                alert("You must enter a username.");
                return false;
            }

            if (password.length === 0) {
                alert("You must enter a password.");
                return false;
            }

            return true;
        }
    </script>
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
            width: 350px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }
        .card h2 {
            margin-bottom: 20px;
            color: #333333;
        }
        .card input[type="text"],
        .card input[type="password"] {
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
        .additional-links {
            margin-top: 15px;
        }
        .additional-links form {
            display: inline-block;
            margin: 5px;
        }
        .additional-links input[type="submit"] {
            background-color: #6c757d;
            border: none;
            color: white;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
        }
        .additional-links input[type="submit"]:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Student Login</h2>
        <form name="form1" method="get" action="result.php" onsubmit="return validate(this);">
            <input name="myusername" placeholder="USERNAME" type="text" id="myusername">
            <input name="mypassword" placeholder="PASSWORD" type="password" id="mypassword">
            <input type="submit" class="myButton" name="Submit" value="LOGIN">
        </form>
        <div class="additional-links">
            <form name="form2" method="post" action="newreg.php">
                <input type="submit" value="SIGN UP">
            </form>
            <form name="form1" method="post" action="admin_page.php">
                <input type="submit" value="Admin Login">
            </form>
        </div>
    </div>
</body>
</html>
