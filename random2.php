<?php

$r=$_GET["role"];
$h=$_GET["healthboard"];

$contents = file('pool.txt');

if (count($contents)==0) {
   $contents[0] = "a";
   $contents[1] = "b";
   //echo ("Resetting pool<br/>");
}

$upperbound = count ($contents)-1;
$index = rand(0, $upperbound);
$treatement = $contents[$index];
unset($contents[$index]);
file_put_contents('pool.txt', $contents);

header("Location: http://optimalblooduse.eu/app/trial/treatment.html?r=".$r."&h=".$h."&t=".$treatment);

?>

