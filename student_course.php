<?php
session_start();
if ($_SESSION['authuser'] != 1) {
    echo "ACCESS DENIED";
    exit();
}

// Database connection
$connect = mysqli_connect("localhost", "root", "123456789", "2008b4a5723p") or die("Check your server connection.");

// Get inputs and sanitize them
$cname = mysqli_real_escape_string($connect, $_POST['course']);
$name = mysqli_real_escape_string($connect, $_POST['name']);

// Check if student has registered for 4 courses
$q = "SELECT COUNT(cname) AS total_courses FROM regis WHERE uname='$name'";
$r = mysqli_query($connect, $q) or die(mysqli_error($connect));
$reg = mysqli_fetch_assoc($r);

if ($reg['total_courses'] >= 4) {
    echo "<a href='new_course_reg.php'>Back</a><br/>";
    echo "ERROR IN REGISTRATION (YOU HAVE ALREADY SELECTED 4 COURSES)";
    exit();
}

// Check if course has reached maximum student limit
$q1 = "SELECT COUNT(cname) AS course_count FROM regis WHERE cname='$cname'";
$r1 = mysqli_query($connect, $q1) or die(mysqli_error($connect));
$reg1 = mysqli_fetch_assoc($r1);

if ($reg1['course_count'] >= 15) {
    echo "ERROR IN REGISTRATION (MAXIMUM STUDENTS IN A COURSE REACHED)";
    exit();
}

// Check if the student is already registered for the course
$q2 = "SELECT cname FROM regis WHERE cname='$cname' AND uname='$name'";
$r2 = mysqli_query($connect, $q2) or die(mysqli_error($connect));

if (mysqli_num_rows($r2) > 0) {
    echo "<a href='new_course_reg.php'>Back</a><br/>COURSE ALREADY REGISTERED BY STUDENT $name";
    exit();
}

// Insert course registration
$query = "SELECT name FROM course WHERE name='$cname'";
$results = mysqli_query($connect, $query) or die(mysqli_error($connect));

if ($rows = mysqli_fetch_assoc($results)) {
    $course_name = $rows['name'];
    echo "Course '$course_name' has been added successfully.<br/>";
    echo "<a href='new_course_reg.php'>Back</a><br/>";
    
    $insert = "INSERT INTO regis(uname, cname) VALUES('$name', '$course_name')";
    mysqli_query($connect, $insert) or die(mysqli_error($connect));
} else {
    echo "Error in registration.";
    exit();
}

// Calculate total credit hours if student has registered for 4 courses
$q2 = "SELECT COUNT(cname) AS total_courses FROM regis WHERE uname='$name'";
$r2 = mysqli_query($connect, $q2) or die(mysqli_error($connect));
$reg2 = mysqli_fetch_assoc($r2);

if ($reg2['total_courses'] == 4) {
    $sum = 0;
    $q3 = "SELECT cname FROM regis WHERE uname='$name'";
    $r3 = mysqli_query($connect, $q3) or die(mysqli_error($connect));

    while ($reg3 = mysqli_fetch_assoc($r3)) {
        $course_name = $reg3['cname'];
        
        $q4 = "SELECT credit FROM course WHERE name='$course_name'";
        $r4 = mysqli_query($connect, $q4) or die(mysqli_error($connect));
        $reg4 = mysqli_fetch_assoc($r4);
        
        $sum += $reg4['credit'];
    }

    if ($sum < 9) {
        echo "REGISTRATION ERROR (TOTAL CREDIT IS LESS THAN 9)";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Course Registration</title>
    <link rel="stylesheet" type="text/css" href="text.css">
</head>
<body>
    <div id="div1"></div>
</body>
</html>
