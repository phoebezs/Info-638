<!DOCTYPE html>
<html>
<head>
<title>Form Test 2</title>
</head>
<body>
<?php 
if (isset($_POST['name'])) {
	print "Your name is ".$_POST['name']."<br>";
}	
if (isset($_POST['age'])) {
	print "Your age is ".$_POST['age']."<br>";
}
if (isset($_POST['comments'])) {
	print "Your comment is ".$_POST['comments']."<br>";
}
?>
<form method="post" action="formtest2.php">
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
