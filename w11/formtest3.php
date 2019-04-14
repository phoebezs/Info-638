<!DOCTYPE html>
<html>
<head>
<title>Form Test 3</title>
</head>
<body>
<?php 
// sanitizing our form values before printing out 
if (isset($_POST['name'])) {
	print "Your name is ".sanitizeString($_POST['name'])."<br>";
}	
if (isset($_POST['age'])) {
	print "Your age is ".sanitizeString($_POST['age'])."<br>";
}
if (isset($_POST['comments'])) {
	print "Your comment is ".sanitizeString($_POST['comments'])."<br>";
}
function sanitizeString($var)
{
	$var = stripslashes($var);
	$var = strip_tags($var);
	$var = htmlentities($var);
	return $var;
}
?>
<form method="post" action="formtest3.php">
What is your name?
<input type="text" name="name"><br> 
What is your age?
<input type="radio" name="age" value="under18">Under 18 <input type="radio" name="age" value="over18">Over 18<br>
Any comments?<br>
<textarea rows="4" cols="50" name="comments"></textarea>
<input type="submit">
</form>
</body>
</html>
