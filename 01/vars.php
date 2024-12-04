<?php


$a = 2;
$b = 2;

$resString = "$a,$b \n";
// JS => $resString = `{a}, {b} \n`;
echo $resString;

$resString = $a . "," . "$b" . "\n";
echo $resString;

//
//$ab = $a + $b;
//
//echo $ab;
//echo "\n\n";
//
//$strAB = $a . $b;
//echo $strAB;
//echo "\n\n";


