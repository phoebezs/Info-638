<!DOCTYPE html>
<html>
<head>
    <title>Code Homework 2</title>

    <style>
h2 {
    font-family: helvetica; 
}

h3 {
    font-family: helvetica; 
}

p {
    font-family: helvetica; color: blue;
}
</style>
</head>

<body>
    <h2>Code Homework 2</h2>

<?php

print "<h3>Challenge: ISBN Validation</h3>";

#0892075430 ISBN For Hilma af Klint: Paintings for the Future
#1524763136 ISBN for Becoming by Michelle Obama
#156881111X ISBN for Erdos on Graphs

/*
Obtain the sum of 10 times the first digit, 9 times the second digit, 8 times the third digit...until 1 times the last digit.
Divide the sum by 11, if the sum leaves no remainder when divided by 11 the code is a valid ISBN.
*/

$isbn = "156881111X";
#$html_output = "";

function ISBN_validator ($isbn) {
    echo "<p>Checking ISBN $isbn for validity...</p>";
    $first = substr ($isbn,0,1);
    $second = substr ($isbn,1,1);
    $third = substr ($isbn,2,1);
    $fourth = substr ($isbn,3,1);
    $fifth = substr ($isbn,4,1);
    $sixth = substr ($isbn,5,1);
    $seventh = substr ($isbn,6,1);
    $eighth = substr ($isbn,7,1);
    $ninth = substr ($isbn,8,1);
    $tenth = substr ($isbn,-1);

    if ($tenth == "X") {
        $tenth = 10;
    }

    $verifyisbn = (($first*10) + ($second*9) + ($third*8) + ($fourth*7) + ($fifth*6) + ($sixth*5) + ($seventh*4) + ($eighth*3) + ($ninth*2) + ($tenth*1))%11;


    if ($verifyisbn == 0) {
        $verifyisbn = True;
        echo "<p>This is a valid ISBN!</p>";
    } else {
        $verifyisbn = False;
        echo "<p>This is NOT a valid ISBN!</p><br>";
    }
    return $verifyisbn;
}

$validisbn = ISBN_validator ($isbn);


print "<h3>Challenge: Coin Toss</h3>";

/*
a.  The mt_rand() function returns a random value; optionally you may enter a min and max number to be returned. 
Documentation is available at http://www.w3schools.com/php/func_math_mt_rand.asp 

Create a PHP page that simulates a series of random coin tosses for 1, 3, 5, 7, and 9 flips. 
You should make your page visually interesting by using images to represent a toss of heads or tails

b.  Create a loop that will toss the coin repeatedly until you have flipped exactly two heads in a row. 
Stop the loop and print out to the page the number of tosses this took
*/

$cointoss = mt_rand(0,1);

function cointoss () {
    $cointoss = mt_rand(0,1);
    $headsimg = '<img src="https://webdevdbcourses.prattsi.org/~pstein5/pennyhead.jpg" width="80" height="80"/>';
    $tailsimg = '<img src="https://webdevdbcourses.prattsi.org/~pstein5/pennytails.jpg" width="80" height="80"/>';
    if ($cointoss == 1){
        print $headsimg;
    } else {
        print $tailsimg;
    } 
    return $cointoss;
}

$coinflip = 1;
echo "<p>Flipping a coin once...<br></p>";
while($coinflip <= 1) {
    cointoss ();
    $coinflip++;
}

$threeflip = 1;
echo "<p>Flipping a coin three times...<br></p>";
while($threeflip <= 3) {
    cointoss ();
    $threeflip++;
}

$fiveflip = 1;
echo "<p>Flipping a coin five times...<br></p>";
while($fiveflip <= 5) {
    cointoss ();
    $fiveflip++;
}

$sevenflip = 1;
echo "<p>Flipping a coin seven times...<br></p>";
while($sevenflip <= 7) {
    cointoss ();
    $sevenflip++;
}

$nineflip = 1;
echo "<p>Flipping a coin nine times...<br></p>";
while($nineflip <= 9) {
    cointoss ();
    $nineflip++;
}


print "<p><br>Begin the coin flipping...</p>";
/*$twoheads = 0;
for ($twoheads = 1 ; $twoheads <= 20; $twoheads++) {
    $cointoss = mt_rand(0,1);
    cointoss ();
    if ($cointoss == 1) { 
        do {
        cointoss ();
    } while ($cointoss == 1);

    }
}

(do {
    cointoss ();
} while ($cointoss == 1);*/

########################## NOT MY CODE BELOW ##########################

/*function cointoss () {
    return mt_rand(0,1);  // return zero or one
}

$previous_toss = null;
$toss = null;
do {
    if ($toss !== null) {  // only store a new "previous_toss" if not the first iteration
        $previous_toss = $toss;  // store last ieration's value
    }
    $toss = cointoss();  // get current iteration's value
    echo ($toss ? '<img src="heads.jpg"/>' : '<img src="tails.jpg"/>') , "\n";
    //    ^^^^^- if a non-zero/non-falsey value, it is heads, else tails
} while ($previous_toss + $toss != 2);
//       ^^^^^^^^^^^^^^^^^^^^^^- if 1 + 1 then 2 breaks the loop*/


########### Professor's solution #############
$numheads = 0;
$numtails = 0;
$numheadswant = 2;

while ($numheadsinrow < $numheadswant) {
    $result = mt_rand (0,1);
    if ($result == 1) {
        #head stuff img
        ++$numheadsinrow;
    } else {
        #tails stuff
        $numheadsinrow = 0;
    
    }
}

?>
</body>
</html>