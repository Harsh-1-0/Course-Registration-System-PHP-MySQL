<?php
session_start();
if($_SESSION['authuser']!=1)
{
echo"ACCESS DENIED";
exit();
}

$connect = mysqli_connect("localhost", "root", "123456789") or die ("check your server connection");
$uname= $_GET['myusername'];
$upass= $_GET['mypassword'];

$_SESSION['username']=$uname;
$_SESSION['pass']=$upass;

mysqli_select_db ($connect,"2008b4a5723p");
$query="SELECT * FROM members WHERE username='$uname' and password='$upass'";

$results=mysqli_query($connect,$query) or die(mysqli_error($connect));

if($row = mysqli_fetch_array($results))
  { echo"Welcome ". $row['username'] ."!!<br/>";
  echo "<table  style='width:50%' class='CSSTableGenerator'>
USER INFORMATION<tr>

<th>USERNAME</th>

<th>BRANCH</th>
<th>YEAR OF PASSING</th>
</tr>";
  
  echo "<tr>";

  echo "<td>" . $row['username'] . "</td>";
  
  echo "<td>" . $row['branch'] . "</td>";
  echo "<td>" . $row['year'] . "</td>";
  echo "</tr>";
  }
  else{
  echo"LOGIN FAILED(INVALID USERNAME OR PASSWORD)";
  exit();
  }
echo "</table>";

?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" /> 
</head>
<body>
<div id="div1"></div>
</body>
</html>	
<br/><br/>
<form method="post" action="default.php" style="float:right;">
<input type="submit" class="myButton" name="add" value="LOGOUT">
</form>

<form method="post" action="add.php" style="float:right;">
<input type="submit" class="myButton" name="add" value="ADD USER INFROMATION">
</form>

<form method="post" action="new_course_reg.php" >
<input type="submit" class="myButton" name="add" value="COURSE REGISTRATION">
</form>


<?php
echo"<center><h2>REGISTERED COURSES</h2></center>";
$query="Select regis.cname, course.credit, course.instructor 
FROM course 
INNER JOIN regis 
ON course.name=regis.cname 
AND regis.uname= '$uname';";

$results=mysqli_query($connect,$query) or die(mysqli_error($connect));

echo "<center><table style='width:50%' class='CSSTableGenerator'><tr><td></td><td><b>Course ID</b></td><td><b>Credits</b></td><td><b>Instructor</b></td></tr>\n";
while ($rows=mysqli_fetch_assoc($results)) {
echo "<tr><td><a href='Remove_Course.php?cname=$rows[cname]&uuname=$uname'>Remove</a></td>\n"; 
foreach($rows as $value) 
{
echo "<td>\n";  
echo $value; 
echo "</td>\n"; 
}
echo "</tr><br>\n"; 
}
echo "</table></center>\n"; 
?>
<br/>

<form method="get" action="edit_course.php" style="float:right">
<input type="submit" class="myButton" name="add" value="Edit Course(s)">
</form>

<footer>
            <a href="default.aspx" style="color: white;">Back to home</a>
            � 2013 Gaikwad Company, Inc. Course Registration System 
        </footer>
		
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" /> 
</head>
<body>
<div id="div1"></div>
</body>
</html>	

















