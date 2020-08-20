<?php

$sql= "
SELECT * FROM `story` " ;
$result = mysqli_query($con, $sql);


if (mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_assoc($result)) {
	


mysqli_close($con);
?>
 
