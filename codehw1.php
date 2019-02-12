<!DOCTYPE html>
<head>
<title>
    Code Homework 1
</title>

<style>
h2 {
    font-family: helvetica; 
}

p {
    font-family: helvetica; color: green;
}
</style>
</head>

<body>
<h2>Challenge: Correct Change</h2>
<?php
$mychange=159;


$dollars = (int) ($mychange/100); // 1 dollar
$remainder1 = $mychange%100; // 59 cents left over

$quarters = (int) ($remainder1/25); // 2 quarters
$remainder2  = $remainder1%25; // 9 cents left over

$dimes = (int) ($remainder2/10); // 0 dimes

$nickels = (int) ($remainder2/5); // 1 nickel
$remainder3 = $remainder2%5; // 4 cents left over

$pennies = $remainder3;


echo "<p>You are due $mychange cents back in total.</p>";
print "<p>You are due back $dollars dollar, $quarters quarters, $dimes dimes, $nickels nickel, and $pennies pennies.</p><br>";

?>


<h2>Challenge: 5 Bottles of Beer</h2>

<?php
$beer=5;

#Subtracts 1 from $beer at the end of each loop
do 
{
    echo "<p>$beer bottles of beer on the wall, $beer bottles of beer! Take one down, pass it around, " . --$beer . " bottles of beer on the wall!</p>"; 
} while ($beer >=1);

?>
</body>
</html>