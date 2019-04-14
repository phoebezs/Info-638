<!DOCTYPE html>
<html>
<head>
<title>Play rock, paper, scissors!</title>
</head>
<body>
<h1>Rock, Paper, Scissors</h1>
<?php 
if (isset($_POST['choice'])) {
	$choices = array("rock","paper","scissors");
	$computerChoice = $choices[mt_rand(0,2)];
	$userChoice = $_POST['choice'];
	print "<p>Your choice is: ".$userChoice."<br>";
	print "The computer chose: ".$computerChoice;
	if ($computerChoice == $userChoice){ # user and computer are tied
		print "<br>It's a tie!</p>";
	} elseif ((($computerChoice=="rock")&&($userChoice=="scissors"))||(($computerChoice=="scissors")&&($userChoice=="paper"))||(($computerChoice=="paper")&&($userChoice=="rock"))) { # all conditions where computer wins
		print "<br>The computer won!</p>";		
	} else { # otherwise, the user has won
		print "<br>You won!</p>";		
	}
	print "<p>Play again:</p>";	
} else {
	print "<p>Please enter your choice below:</p>";
}
?>
<form method="post" action="">
<input type="radio" name="choice" value="rock">Rock
<input type="radio" name="choice" value="paper">Paper
<input type="radio" name="choice" value="scissors">Scissors
<input type="submit">
</form>
</body>
</html>