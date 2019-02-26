<!DOCTYPE html>
<head>
    <title>Code Homework 3</title>

    <style>


h2 {
    font-family: helvetica; 
}

h3 {
    font-family: helvetica; 
}

p {
    font-family: helvetica;
}

table, th, td {
  border: 1px solid black;
}

table {
  border-collapse: collapse; width: 100%; font-family: helvetica; 
}

th {
    height: 30px; padding: 10px; text-align: left; background-color: #C64751; color: white;
}

td {
    height: 20px; padding: 10px; text-align: left;
}

tr:hover {
    background-color: #f5f5f5;
}

#total {
    text-align: center; background-color: #4CAF50; color: white; white-space: pre;
}

</style>
</head>
<body>

<h2>Code Homework 3</h2>

<?php
print "<h3>Challenge: Book List</h3>";

$bookdata = array (
    array ("PHP and MySQL Web Development", "Luke", "Welling", 144, "Paperback", 31.63),
    array ("Web Design with HTML, CSS, JavaScript and jQuery", "Jon", "Duckett", 135, "Paperback", 41.23),
    array ("PHP Cookbook: Solutions and Examples for PHP Programmers", "David", "Sklar", 14, "Paperback", 40.88),
    array ("JavaScript and jQuery: Interactive Front-End Web Development", "Jon", "Duckett", 251, "Paperback", 22.09),
    array ("Modern PHP: New Features and Good Practices", "Josh", "Lockhart", 7, "Paperback", 28.49),
    array ("Programming PHP", "Kevin", "Tatroe", 26, "Paperback", 28.96)
);

echo "<pre>";
echo "<table>";
echo "<th>Title</th>";
echo "<th>First Name</th>";
echo "<th>Last Name</th>";
echo "<th>Pages</th>";
echo "<th>Type</th>";
echo "<th>Price</th>";
foreach ($bookdata as $row) {
    echo "<tr>";
    echo "</tr>";
    foreach ($row as $info)
        echo "<td>" . $info . "</td>";
        echo "<br>";
    
}
echo "</table>";
echo "</pre>";

print "<div><p id=\"total\">"."Your total price is: <br>" . "$" . (($bookdata[0][5]) + ($bookdata[1][5]) + ($bookdata[2][5]) + ($bookdata[3][5]) + ($bookdata[4][5]) + ($bookdata[5][5]))."</p></div>";


#COIN TOSS, CONTINUED

print "<br><h3>Coin Toss, continued</h3>";

$numheads = 0;
$numtails = 0;
$numheadsinrow = 0;
$numheadswant = 5;

print "<br><br><p>Begin the coin flipping! Looking for " . $numheadswant . " heads in a row:</p>";

# <img src="https://webdevdbcourses.prattsi.org/~pstein5/pennyhead.jpg" width="80" height="80"/>
# <img src="https://webdevdbcourses.prattsi.org/~pstein5/pennytails.jpg" width="80" height="80"/>

while ($numheadsinrow < $numheadswant) {
    $result = mt_rand (0,1);
    if ($result == 1) {
        print '<img src="pennyhead.jpg" width="80" height="80"/>';
        ++$numheadsinrow;
        ++$numheads;
    } else {
        print '<img src="pennytails.jpg" width="80" height="80"/>';
        $numheadsinrow = 0;
        ++$numtails;
    
    }
}

print "<br><p>You flipped " . $numheadswant . " heads in " . ($numheads + $numtails) . " flips!</p>";


?>
</body>
</html>