<html>
<head>
<title>SEND US A MAIL</title>
<link rel= "stylesheet" type="text/css" href="css/homepage.css" />
</head>
<body>
<center>
<div class="banner">
<center><h1><a href="index.html" > <font color="#00008B">OJICONNECT.COM</font></a></h1></center>
<p align=right><font size="5">Bringing you the latest Gist</font></p>
</div>

<h1>  SEND US A MAIL</h1>

<form name="mail_us" action="" method="post" >
EMAIL ADDRESS:<input type="email" name="email" placeholder="Enter your Email Address" size="70" required /><BR/><BR>
SUBJECT:<input type="text" name="subject" placeholder="main point of the mail" size="60" required /><BR/><BR>


MESSAGE:<BR><TEXTAREA name="message" rows="10" cols="50" placeholder="Enter Your Mail Message" required></TEXTAREA><BR><BR>
<b><input type="submit" name="submit" value="Submit" /></b>
</form>


<?php

if (isset($_REQUEST['submit'])){
	$to = "augustineeze2019@gmail.com";
	$subject = $_REQUEST['subject'];
	strip_tags($subject);
	stripslashes($subject);
	$message = $_REQUEST['message'];
	strip_tags($message);
	stripslashes($message);
	$from = $_REQUEST['email'];
	strip_tags($from);
	stripslashes($from);
	$headers = "From:" . $from;
	$result = mail($to, $subject, $message, $headers );
	if ($result == true ){
		echo "mail sent successfully" ; 
	}
	else 
	{
		echo " ERROR TRYING TO SEND MAIL";
	}
}


?>



<script>
if (window.history.replaceState){
	window.history.replaceState(null, null, window.location.href);
}
document.getElementById("year").innerHTML = new Date().getFullYear(); 
</script>

</body>
</html>