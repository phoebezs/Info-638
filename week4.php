<!DOCTYPE html>
<html>
<head>
    <title>Week 4</title>
</head>

<body>
<h2>Week 4</h2>

<?php
//COIN CHANGE
echo "COIN CHANGE";

$amtdue = 159;
$remainder = 0;
$dollars = 0;
#variables to hold the number of coins to return
$quarters = 0;
$dimes = 0;
$html_output = "";


# surround with check for number and >0

#dollars
if ($amtdue > 99) {
    $dollars = (int) ($amtdue / 100);
    $remainder = ($amtdue % 100);
    echo "<p>dollars $dollars remainder is $remainder</p>";
    $html_output = "<p>You are due back $dollars dollars</p>";

}

#quarters
if ($remainder > 24) {
    $quarters = (int) ($amtdue / 25);
    $remainder = ($amtdue % 25);
    $html_output .= "<p>You are due back $quarters quarters</p>";

}

#dimes

#pennies
if ($remainder > 0) {
    $pennies = $remainder;
    $html_output .= "you are due back $remainder pennies";

    if ($pennies > 1) {
        $html_output .= "pennies";
    } else {
        $html_output .= "penny";
    }
}


#output text to user
echo $html_output;



#SAMPLE STRING
echo "<p>SAMPLE STRING</p>";

$samplestring = "It is 4:06pm.";
echo  strrev ($samplestring);
echo str_repeat ("<div>Div</div>", 5);

$phonenum = "123-456-7890";
echo substr($phonenum, -3); //returns part of a string based on the values of the start and length parameters

print ("<h3>MY NAME</h3>");
$myname = "Amanda Kate Golds";
echo substr ($myname, 0, 6) . " " .
substr ($myname, 7, 5) . " " .
substr ($myname, -5);

echo strtoupper (substr ($myname, 7, 5));

echo str_shuffle ($myname);



#FUNCTIONS
print "<p>FUNCTIONS</p>";

$myname = "Amanda Kate Golds";
$first = substr ($myname, 0, 6);
$middle = substr ($myname, 7, 5);
$last = substr ($myname, -5);

function name_formatter ($first, $middle, $last) {
    echo "The names you gave are:";
    echo $first.$middle.$last;
    #lastname, first initial. middle initial.
    #Golds, A. K.
    $finalname = "$last, " .substr($first, 0, 1).". ".substr($middle, 0, 1).". ";
    return $finalname;

}

echo $finalname;  //anything defined inside a function is only known by the function: echos as unedfined variable

$user_display_name = name_formatter($first, $middle, $last);

echo "<h1>Welcome $user_display_name</h1>";
echo "<p>There are 2 messages for $user_display_name</p>";
echo "You got a message from ".name_formatter ("Bo", "Bob", "Bobson");


#TIPS
print "<p>TIPS</p>";

function tip_calculator ($mp, $tp) {
    #arguments of meal price, $12.20 and tip of 20%
    $tip = $mp * ($tp/100);
    return $tip;

}
 
echo "tip to leave: \$";
echo tip_calculator(12.20, 20);


?>

</body>

</html>