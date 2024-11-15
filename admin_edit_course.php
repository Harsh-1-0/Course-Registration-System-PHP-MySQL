<!DOCTYPE html>
<html>
<head>
    <title>Course Change Form</title>
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
        .card input[type="text"] {
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
        <h2>Course Change Form</h2>
        <form method="post" action="admin_course_edited.php">
            Student Name: <input type="text" name="name"><br/>
            Course to Change: <input type="text" name="course"><br/>
            New Course: <input type="text" name="new"><br/>
            <input type="submit" class="myButton" name="submit" value="Submit">
        </form>
    </div>
</body>
</html>
