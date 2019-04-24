<?php
setcookie('username', 'Sam', time() + 60 * 60 * 24 * 7, '/');
?>
<!DOCTYPE html>
<html>
<head>
<title>Cookies Example</title>
</head>
<body>
<?php 
if (isset($_COOKIE['username'])) {
	echo $_COOKIE['username']; 
}
?>
</body>
</html>