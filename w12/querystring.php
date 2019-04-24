<!DOCTYPE html>
<html>
<head>
<title>Query String Example</title>
</head>
<body>
<?php
if (isset($_GET['myname'])) { 
	echo "Hello ".$_GET['myname']."!";
} else {
	echo "No name in the query string!";
}
?>
</body>
</html>