<!DOCTYPE html>
<html>
<head>
<title>Locations</title>
<link rel="stylesheet" type="text/css" href="pstein5.css">
</head>

<body>
<?php
include_once ("includes/header.php"); 

#check for loc_id existing in GET
if (isset($_GET["loc_id"]) && !empty($_GET["loc_id"]) ){
    #connect to db
    $conn = new mysqli($hn, $un, $pw, $db);
	if ($conn->connect_error) die($conn->connect_error);
    
    #sanitize data
    $loc_id = sanitizeMySQL($conn, $_GET["loc_id"]);
    
    #construct query
    $query = 'SELECT * FROM `borough` NATURAL JOIN `location` NATURAL JOIN `rooms` WHERE loc_id="'.$loc_id.'"';

    #send to db
    $result = $conn->query($query);
    if (!$result) die($conn->error);

    #output to user
    while ($row=$result->fetch_assoc()){
        print "<h1>" . $row["name"] . "</h1>";
        print "<p>Borough: " . $row["boro_name"] . "</p>";
        print "<p>Location: " . $row["location"] . "</p>";
        print "<p>Hours: " . $row["hours"] . "</p>";
        print "<p>Gender: " . $row["gender"] . "</p>";
        print "<p>Handicap Accessible: " . $row["handicap_access"] . "</p>";
        print "<p>Changing Tables: " . $row["change_table"] . "</p>";
        print "<p>Stalls: " . $row["stalls"] . "</p>";
    }

} else {
    print "No location found!";
}

#SANITIZE
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

print '<a href="index.php">Back to home</a>';

include_once ("includes/footer.php");
?>
</body>
</html>