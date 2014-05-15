<?php

$board=$_GET["b"];
$session=$_GET["s"];
$phase=$_GET["p"];
$grp=$_GET["g"];


switch ($phase) {

	case 2:


	switch ($grp) {

	case "a":
	if ($board == "g") {
	  header("Location: http://www.nhsggc.org.uk/content/");
	}
	else {
	  header("Location: http://onlinelibrary.wiley.com/doi/10.1111/j.1365-2141.2010.08444.x/full");
	}
	break;

	case "b":
	  header("Location: http://optimalblooduse.eu/app/");
	break;

	default:
	echo("Oops, invalid group");
	}

	break;

	default:

	$contents = file('randompool.txt');


	if (count($contents)==0) {
	   $contents[0] = "a";
	   $contents[1] = "b";
	   //echo ("Resetting pool<br/>");
	}

	$upperbound = count ($contents)-1;
	$index = rand(0, $upperbound);
	$group = $contents[$index];
	unset($contents[$index]);
	file_put_contents('randompool.txt', $contents);

	header("Location: http://survey.it4se.com/node/39?g=$group&s=$session&b=$board");

}

//echo ("Assigning you to group $group by random.");

?>

