<?php

$r=$_GET["role"];
$h=$_GET["healthboard"];

if ($r == "" || $h == "") {
   echo '<html><body style="padding: 10px; background: #FFE; font-size: 1.8em; font-family: arial, sans-serif"><h1>Incomplete information</h1><p>Please make sure you select your role and health board.</p><br/> <p><a href="index.html" style="padding: 10px; background: #4C4; color: black; border-radius: 5px; text-decoration: none; font-size: 1.3em; border: 1px #000 solid;">Go back and try again</a></p>';
}

else {
$contents = file('pool.txt');

if (count($contents)==0) {
   $contents[0] = "a";
   $contents[1] = "b";
   //echo ("Resetting pool<br/>");
}

$upperbound = count ($contents)-1;
$index = rand(0, $upperbound);
$treatment = $contents[$index];
unset($contents[$index]);
file_put_contents('pool.txt', $contents);

header("Location: http://optimalblooduse.eu/app/trial/treatment.html?r=".$r."&h=".$h."&t=".$treatment);
}

?>

