<html>
<head>
<title> SEND YOUR STORY</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel= "stylesheet" type="text/css" href="css/homepage.css" />

</head>
<body>


<div class="advert">
<a href="advert.html"><img src="css/advert2.jpg" alt="PLACE YOUR ADVERT HERE" width="100%"></img></a>
</div>

<div >
<img  id="image1" width="100%" height="50%"  />
</div>

<div class="maincontent" align="center">

<p>
Welcome to ojiconnect.com,<br>
please fill out the form below with the neccessary details and also the article you wish to send to ojiconnect.com<br>
please  be assured that all copyright and credits will be acknowlegded to you at the end of the write up if successfully posted to the homepage by the admin
</p>

</div>
<center>
<form name="your-article" method="post" action="" enctype="multipart/form-data" >

<label>NAME:</label><input type="text" name="name" placeholder="Enter Your Name" size="200" required /><br><br>
<label>TITLE OF THE TOPIC:</label> <input type="text" name="topic" placeholder="Enter Title of the Topic" size="200" required /><br><br>

COMMENT:<BR><TEXTAREA name="article" rows="20" cols="130" placeholder="Enter Your Comment" required></TEXTAREA><BR><BR>
<input type="file" name="image"  Required /><br><br>
<input type="submit" name="submit" value="SUBMIT" />
</form>
<?php
include 'connection.php';
if (isset($_REQUEST["submit"])) {
	$var1 = rand(1111,9999);
	$var2 = rand(1111,9999);
	$var3 = $var1.$var2;
	$var3 = md5($var3);
	$fnm = $_FILES["image"]["name"];
	$dst = "./all_images/".$var3.$fnm;
	$dst_db = "all_images/".$var3.$fnm;
	
	
	
	 
		
	    $name = stripslashes($_REQUEST['name']); // removes backslashes
		$name = mysqli_real_escape_string($con,$name); //escapes special characters in a string
		
		$topic = stripslashes($_REQUEST['topic']);
		$topic= mysqli_real_escape_string($con,$topic);
		
		$article = stripslashes($_REQUEST['article']);
		$article= mysqli_real_escape_string($con,$article);
		$d= date("h:ia");
	
	move_uploaded_file($_FILES["image"]["tmp_name"],$dst);
	
	
	
	 $query = "
  INSERT INTO `id14369568_ojiconnect`.`story` (`id`, `name`,  
        `topic`, `the_article`, `images`) VALUES (NULL, '$name', '$topic',
        '$article', '$dst_db');";

  // Our SQL stated is stored in a variable called $query. To run the SQL command
  // we need to execute what is in the $query variable.
 

 $result = mysqli_query($con,$query);
        if($result){
			
	
	
		echo '<script type="text/javascript"> alert("Data inserted successfully!"); </script>';
	}
	else 
	{
	      echo '<script type="text/javascript"> alert("ERROR UPLOADING DATA!"); </script>';	
	}

	}

	
?>







<div class="copyright" align="center">
 &#169; Copyright Ojiconnect  <span id="year"></span>
</div>



<script>
if (window.history.replaceState){
	window.history.replaceState(null, null, window.location.href);
}
document.getElementById("year").innerHTML = new Date().getFullYear(); 
</script>
</body>
</html>