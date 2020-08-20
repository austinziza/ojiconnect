<html>
<head>
<title>page1</title>
<link rel= "stylesheet" type="text/css" href="form.css" />
</head>
<body bgcolor="#0099ff">

<h1>THIS IS PAGE 2 </h1>
<a href="page1.php?id=1">Click here to go go page 1</a>

<?php
include ("form.php");

include ("manage_comments.php");
include ("connection.php");


$sql= "
SELECT * FROM `comments` WHERE `articleid` = 3 ORDER BY `articleid` ASC  " ;
$result = mysqli_query($con, $sql);


include ("disp_comments.php");
?>

</body>
</html>