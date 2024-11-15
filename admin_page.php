<?php
session_start();
$_SESSION['authuser'] = 1;
?>

<html>
<head>
    <title>Admin Login</title>
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
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #ADD8E6;
        }
        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px 30px;
            width: 350px;
        }
        .card h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input[type="text"], .form-group input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
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
        .alternate-login {
            text-align: center;
            margin-top: 15px;
        }
        .alternate-login form input[type="submit"] {
            background-color: #28a745;
        }
        .alternate-login form input[type="submit"]:hover {
            background-color: #1c7430;
        }
    </style>
    <script type="text/javascript">
        function validate(form) {
            var userName = form.myusername.value.trim();
            var password = form.mypassword.value.trim();

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
</head>
<body>
    <div class="container">
        <div class="card">
            <h2>Admin Login</h2>
            <form name="form1" method="post" action="result1.php" onsubmit="return validate(this);">
                <div class="form-group">
                    <label for="myusername">Admin ID:</label>
                    <input name="myusername" type="text" id="myusername" required>
                </div>
                <div class="form-group">
                    <label for="mypassword">Password:</label>
                    <input name="mypassword" type="password" id="mypassword" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="myButton" name="Submit" value="LOGIN">
                </div>
            </form>
            <div class="alternate-login">
                <form name="form1" method="post" action="default.php">
                    <input type="submit" class="myButton" name="Submit" value="Student Login">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
