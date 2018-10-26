

<?php
  session_start();  
?>



<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="mystyle.css">
    <title>Secret Page</title>
</head>
<body>
<h1>Here it is!</h1>
<p>Post up.</p>
<form action="blogosphericles.php"  method="POST" >
<textarea  id = "comment" name="comment" rows="35" cols="80">Say something</textarea>
			 <br>
        Share<br></label>
        <input type="submit" value="->">
</form>
</body>
</html>