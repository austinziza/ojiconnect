<html>
<head>
<title> SEND YOUR STORY</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel= "stylesheet" type="text/css" href="/homepage.css" />

<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<meta charset=utf-8 />
<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</head>
<body>


<div class="banner">
<center><h1><a href="index.html" > <font color="#00008B">OJICONNECT.COM</font></a></h1></center>
<p align=right><font size="5">Bringing you the latest Gist</font></p>
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


<input type="file" name="image"   onchange="readURL(this);"  Required /><br><br>
<input type="submit" name="submit" value="SUBMIT" />
</form>
<?php
include 'connection.php';
if (isset($_REQUEST["submit"])) {
	
	$file_type = $_FILES['image']['type'];
	$allowed = array("image/jpeg", "image/gif", "image/png", "image/JPEG", "image/PNG", "image/GIF",  "image/jpg", "image/JPG");
	
	 $file_size = $_FILES['image']['size']; 
		$maxsize= 2097152;
		
	
	
	if (!in_array($file_type , $allowed)  || $file_size >= $maxsize   ) {
		$error_message = "upload a valid jpg/gif/png image NOT MORE THAN 2MB IN SIZE";
		echo $error_message;
		exit();
	}
	
	
	$var1 = rand(1111,9999);
	$var2 = rand(1111,9999);
	$var3 = $var1.$var2;
	$var3 = md5($var3);
	$fnm = $_FILES["image"]["name"];
	$dst = "./all_images/".$var3.$fnm;
	$dst_db = "all_images/".$var3.$fnm;
	
	
	
	 
		
	    
		
		
		$d= date("h:ia");
	
	move_uploaded_file($_FILES["image"]["tmp_name"],$dst);
	
	
	
	 $query = "
  INSERT INTO `article`.`story` (`id`, `name`,  
        `topic`, `the_article`, `images`) VALUES (NULL, '', '',
        '', '$dst_db');";

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
    <img id="blah" src="#" alt="your image" />
<table border="2">
<tr>


<td> image</td>
</tr>
<?php

$sql= "
SELECT * FROM `story` " ;
$result = mysqli_query($con, $sql);
while($data= mysqli_fetch_array($result))
{
	?>
	
<tr>

<td> <img src="<?php echo $data['images']; ?>" width="100" height="100"> </td>
</tr>
<?php
}
?>
</table>
<?php mysqli_close($con);
?>




<div class="copyright" align="center">
 &#169; Copyright Ojiconnect  <span id="year"></span>
</div>

<script>

var imgArray = [
'images/image1.jpg',
'images/image2.jpg',
'images/image3.jpg'],
 curIndex = 0;
 imgDuration = 5000;
 
 function slideShow(){
 document.getElementById('image1').src = imgArray[curIndex];
 curIndex++;
 if (curIndex == imgArray.length) {
 curIndex = 0;
 }
 setTimeout("slideShow()", imgDuration);
 }
slideShow();
</script>


<script>
	
	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
	
	</script>


<script>
if (window.history.replaceState){
	window.history.replaceState(null, null, window.location.href);
}
document.getElementById("year").innerHTML = new Date().getFullYear(); 
</script>
</body>
</html>