<! DOCTYPE html>
<html>
<head>
<title>

</title>
<link rel="stylesheet" type="text/css" href="pstein5.css">
</head>
<body>
<?php
include_once ("includes/header.php"); 

#print_r($_GET);
/*Search for a name across borough, location, and rooms tables, then add check boxes to search if checked
check for submit in GET to tell if form was submitted by user and make sure they put in a search term */

if (isset($_GET["submit"]) && isset($_GET["name"]) && !empty($_GET["name"]) ) {
	# connect to db
	$conn = new mysqli("localhost", "root", "", "pstein5");
	if ($conn->connect_error) die($conn->connect_error);
    
    # sanitize data from form search box 
    $name = sanitizeMySQL($conn,$_GET["name"]);

	# construct query
    $query = 'SELECT * FROM `borough` NATURAL JOIN `location` RIGHT JOIN `rooms` ON location.loc_id=rooms.room_id WHERE (name LIKE \'%'.$name.'%\')'; 
   

    # if checkbox was "on" then append to our query 
    if (isset($_GET["borough"]) && !empty($_GET["borough"]) ) {
		$borough = $_GET["borough"];
		if ($borough=="on") {
            $boroarray= '("' . implode('","', $_GET["borough"]) . '")';
            $query .= " AND boro_name IN $boroarray";
		}
    }

	if (isset($_GET["gender"]) && !empty($_GET["gender"]) ) {
		$gender = $_GET["gender"];
		if ($gender=="on") {
            $genderarray= '("' . implode('","', $_GET["gender"]) . '")';
			$query .= " AND gender IN $genderarray";
		}
    }
    
    if (isset($_GET["handicap_access"]) && !empty($_GET["handicap_access"]) ) {
		$handicap_access = sanitizeMySQL($conn,$_GET["handicap_access"]);
		if ($handicap_access=="on") {
			$query .= " AND handicap_access=\"1\"";
		}
    }

    if (isset($_GET["change_table"]) && !empty($_GET["change_table"]) ) {
		$change_table = sanitizeMySQL($conn,$_GET["change_table"]);
		if ($change_table=="on") {
			$query .= " AND change_table=\"1\"";
		}
    }

	# send to db
	$result = $conn->query($query);
	if (!$result) die($conn->error);
	# output to user 
	print("<h1>Results:</h1>");
	while ($row=$result->fetch_assoc()) {
        print "<div class='record'><h3><a href='record.php?loc_id=" . $row["loc_id"] ."' class='name'>" . $row["name"] . "</a></h3>
    <p> Location: " . $row["location"] . "</p>
    <p> Hours: " . $row["hours"] . "</p></div>";
	}
	print("<h1><a href='index.php'>Search again</a></h1>");
}

# sanitizing functions 

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
</body>
</html>