<?php
// The important information we need from this is the "id" that is set.
  // For example, to get the user's name, we can grab the 'name'. To
  // get their email address, we need to get the value of 'email'.
  //
  // Using the $_POST variable, we can get this data. This is what we're
  // doing below
  
  $con = mysqli_connect("localhost","root","", "ojiconnect");
    if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	die();
	}
	
	
	
 


$error="";
date_default_timezone_set("Africa/Lagos");
 if (isset($_REQUEST['name'])){
		
	    $name = stripslashes($_REQUEST['name']); // removes backslashes
		$name = mysqli_real_escape_string($con,$name); //escapes special characters in a string
		
		$comments = stripslashes($_REQUEST['comments']);
		$comments= mysqli_real_escape_string($con,$comments);
		$d= date("h:ia");
		
 
 


 // We now have all of the data that the user inputed. What you don't want
  // to do is trust the user's input. Savy users / hackers may attempt to use
  // an sql injection attack in order to run sql statements that you did not
  // intend to run. For example, the following is a basic query for checking
  // someone's username and password:
  //
  // SELECT * FROM users WHERE user='USERNAME' AND password='PASSWORD'
  //
  // In the above, we're assuming the user typed USERNAME as their username and
  // PASSWORD as their PASSWORD. But, what if the user typed the following as
  // their password?
  //
  // ' OR ''='
  //
  // The new query would then be the following:
  //
  // SELECT * FROM users WHERE user='USERNAME' AND password='' OR ''=''
  //
  // Running the above query would allow anyone to login as any user! We can use
  // the mysql_real_escape_string function to escape the user's input. If used in
  // the above example, the new query would read:
  //
  // SELECT * FROM users WHERE user='USERNAME' AND password='\' OR \'\'=\''
  //
  // Because the single quotes are "escaped" (i.e. appended with a backslash), the
  // hackers attempt would fail.
  
  
  // We also need to get the article id, so we know if the comment belongs
  // to page 1 or if it belongs to page 2. The article id is going to be
  // passed in the URL. For example, looking at this URL:
  //
  // http://phpandmysql.inmotiontesting.com/page1.php?id=1
  //
  // The article id is 1. To get data from the url, use the $_GET variable,
  // as in:
  

 

 // We also want to add a bit of security here as well. We assume that the $article_id
  // is a number, but if someone changes the URL, as in this manner:
  // http://phpandmysql.inmotiontesting.com/page2.php?id=malicious_code_goes_here
  // ... then they will have the potential to run any code they want in your
  // database. The following code will check to ensure that $article_id is a number.
  // If it is not a number (IE someone is trying to hack your website), it will tell
  // the script to stop executing the page
 

  // At this point, we've grabbed all of the data that we need. We now need
  // to update our SQL query. For example, instead of "John Smith", we'll
  // use $users_name. Below is our updated SQL command:
 


 $query = "
  INSERT INTO `ojiconnect`.`comments` (`id`, `name`,  
        `comment`, `timestamp`, `articleid`) VALUES (NULL, '$name', '$comments',
        '$d', '$article_id');";

  // Our SQL stated is stored in a variable called $query. To run the SQL command
  // we need to execute what is in the $query variable.
 

 $result = mysqli_query($con,$query);
        if($result){
			
            
        

  // We can inform the user to what's going on by printing a message to
  // the screen using php's echo function
  echo "Thank you for your post!";
 
  // At this point, we've added the user's comment to the database, and we can
  // now close our connection to the database:
  
		
		

 }
 }
 mysqli_close($con);
?>

		
		
		
			
		
	          

