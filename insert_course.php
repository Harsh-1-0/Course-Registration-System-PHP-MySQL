<?php
session_start();
if($_SESSION['authuser']!=1)
{
echo"ACCESS DENIED";
exit();
}
$connect = mysqli_connect("localhost", "root", "123456789") or die ("check your server connection.");

mysqli_select_db($connect,"2008b4a5723p");

$name = $_POST['name'];
$credit = $_POST['credit'];
$instructor = $_POST['instructor'];

if($name=='' or $credit=='' or $instructor=='')
echo"ERROR IN REGISTRATION";

else{
$insert = "INSERT INTO course(name,credit,instructor)
values('$name','$credit','$instructor')";

$results=mysqli_query($connect,$insert) or die(mysqli_error($connect));

echo " SUCESSFULLY ADDED INFORMATION<br/><a href='add_course.php'>Back</a>";
}
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" /> 
</head>
<body>
<div id="div1"></div>
<footer>
            <a href="default.aspx" style="color: white;">Back to home</a>
            © 2013 Gaikwad Company, Inc. Course Registration System 
        </footer>
</body>
</html>	