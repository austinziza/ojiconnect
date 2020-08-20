
<?php

if (mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_assoc($result)) {
	echo "<center>";
	
	echo "<table cellspacing=0 cellspacing=0 border=0 width=80%>";
	echo "<tr>";
	echo "<th>".   "<font color=#0099ff;>"  .  "<p>"."&nbsp;&nbsp;&nbsp;&nbsp;" .$row['name']."</p>". "at&nbsp;&nbsp;". $row['timestamp']. "</font>" . "</th>";   
	echo "</tr>";
	echo "<tr>";
	echo "<td>". "<center>". "<p>" ."<font size=3px; color=#000000; >"  . $row['comment']. "</font>". "</p>". "</center>". "</td>" ;
	echo "</tr>";
	echo "</table>" . "<br>";
	
	echo "</center>";
}	
} 
else {
	echo "NO COMMENT YET. PLEASE ADD A COMMENT";
}




mysqli_close($con);
?>