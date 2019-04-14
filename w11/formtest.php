<!DOCTYPE html>
<?php 
if (isset($_POST['name'])) { 
	$name = $_POST['name'];
} else { 
	$name = "(Not entered)";
}
?>
<html>
<head>
<title>Form Test</title>
</head>
<body>
Your name is: <?php echo $name ?><br>
<form method="post" action="formtest.php">
What is your name?
<input type="text" name="name">
<input type="submit">
</form>
</body>
</html>
