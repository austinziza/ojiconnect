<html>
<head>
<title>page1</title>

</head>
<body bgcolor="#f0ffff">
<link rel= "stylesheet" type="text/css" href="form.css" />
<h1>THIS IS PAGE 1 </h1>
<a href="page2.php?id=3">Click here to go to page 2</a>
<center>

<?php
date_default_timezone_set("Africa/Lagos");
include ("form.php");

include ("manage_comments.php");
include ("connection.php");


$sql= "
SELECT * FROM `comments` WHERE `articleid` = 1 ORDER BY `articleid` ASC  " ;
$result = mysqli_query($con, $sql);


include ("disp_comments.php");


?>
</center>
<script>
if (window.history.replaceState) {
	window.history.replaceState(null, null, window.location.href);
}

</script>

</body>
</html>