<?php
#always set cookies at the top of page before html
$date = date("Y-m-d");
setcookie("date", $date);
setcookie("name", "Phoebe");
?>

<!DOCTYPE html>
<html>
<head>
<title>NYC Public Toilets</title>
<link rel="stylesheet" type="text/css" href="includes/pstein5.css">
</head>

<body>
<?php
include_once ("includes/header.php"); 

#if we have cookie info, show a greeting
if (isset($_COOKIE["name"])){
    print "<p>"."Welcome, ".$_COOKIE["name"]."!</p>";
}


#connect to db
$conn = new mysqli("localhost", "root", "", "pstein5");
if ($conn->connect_error) die($conn->connect_error);
    
#construct query
$query = 'SELECT * FROM `location` ORDER BY RAND() LIMIT 1';

#send to db
$result = $conn->query($query);
if (!$result) die($conn->error);

#output to user
while ($row=$result->fetch_assoc()){
    print "<h2>Random Public Toilet Generator</h2>";
    print "<h3><a href='record.php?loc_id=" . $row["loc_id"] ."'>" . $row["name"] . "</a></h3>";
    print "<p> Location: " . $row["location"] . "</p>";
    print "<p> Hours: " . $row["hours"] . "</p><br>";
}

print "<h2>Search for a Toilet</h2>"
?>

<form method="GET" action="results.php">
	Borough 
	<select name="borough">
		<option value="Bronx">Bronx</option>
		<option value="Brooklyn">Brooklyn</option>
        <option value="Manhattan">Manhattan</option>
        <option value="Queens">Queens</option>
        <option value="Staten Island">Staten Island</option>
    </select>
    <div>Name <input type="text" name="name"></div>
    <div>Location <input type="text" name="location"></div>
    Gender<br>
    <input type="checkbox" name="male" value="male">Male<br>
    <input type="checkbox" name="female" value="female">Female<br>
    <input type="checkbox" name="neutral" value="neutral">Neutral<br>
	Handicap Accessible
    <input type="checkbox" name="handicap_access" value="handicap accessible"><br>
    Changing Tables
    <input type="checkbox" name="change_table" value="changing tables"><br>
	<input type="submit" value="Search">
</form>


</body>
</html>

<?php
function sanitizeString($var)
{
	$var = stripslashes($var);
	$var = strip_tags($var);
	$var = htmlentities($var);
	return $var;
}
function sanitizeMySQL($connection, $var)
{
	$var = sanitizeString($var);
	$var = $connection->real_escape_string($var);
	return $var;
}
?>

<?php
include_once ("includes/footer.php");
?>