<!DOCTYPE html>
<head>
    <title>Week 2 Page</title>
</head>
<body>
<?php
#Constant example
    define("MYWEATHER", "Terrible");
    print MYWEATHER;
    

    
# Example vars
    $temp = 32;
    $condition = "Flurries";
    $newscast_text = "They said \"it will snow\"";
    /*\ indicates to php to output that character, or escape character*/
    echo "<h1>Hello, world!</h1>";
    print "<p>Welcome to my Week 2 page.</p>";
    print "<p>The news today said - $newscast_text</p>";
    print "The train costs \$something";
?>
    <p>ONE</p>
    <p>TWO</p>
<?php
    $isitniceout = false;
    $hasvalue = NULL;
    $isitniceout = (int)2.5;
    $historic_temps = array(32,45,23,37.9);
    print $historic_temps[1];
?>    
    <p>THREE</p>
<?php
    $first = "Amanda";
    $middle = "Kate";
    $last = "Golds";
    $age = 35;
    print "$last, $first $middle ($age)";
    print "<ul>\n <li>$last, $first $middle ($age)</li>
    </ul>";
    $myname = array($first, $middle, $last);
    print (int) $first
    
?>    
  <p>FOUR</p>  
<?php
   #Arithmetic operators
    print 4/2;
    print 4%2;
    
    $mynum = 11;
    $mynum = $mynum + 1;
    ++$mynum;
    print $mynum;
    
    $year = 2019
    /*#$year = $year + 5; 
    #$year += 5;
    $issunny = true;
    
    if (($year == 2016) && ($issuny == true)) {
        print "<p>It's 2019!</p>";
    }
    */
    
?>
    <p>FIVE</p>
    
<?php
  
 $fullname = $first . " " . $middle . " " . $last;
    print $fullname;
    
    
print $age += 5;

    $difference = (2034-2019) +$age;
    print $difference;
       
    
?>    
    
</body>
</html>