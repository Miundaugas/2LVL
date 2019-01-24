<?php

$numbersArray = [1,2,3,4,5];

foreach ($numbersArray as $key => $value) {
	echo $value . '<br>';
}
//_____________________
$counted = count($numbersArray);
$sum = array_sum($numbersArray);
$answer = $sum / $counted;
echo $answer;
//_____________________
foreach ($numbersArray as $key => $value) {
	$newValue = $value + 1 ;
	echo $newValue;
}
//_____________________
$movies = [
	1 => [
		"title" => "Rear Window",
		"director" => "Alfred Hitchcock",
		"year" => 1954
	],
	2 => [
		"title" => "Full Metal Jacket",
		"director" => "Stanley Kubrick",
		"year" => 1987
	],
	3 => [
		"title" => "Mean Streets",
		"director" => "Martin Scorsese",
		"year" => 1973
	]
];
// Sokam do foreach'us nes cia yr masyvs masyve. Tou $movies pasikeisi pagal uzduoti.
foreach ($movies as $key => $value) {
	foreach ($value as $key => $value2) {
		echo $key . '-' . $value2 . '<br>';
	}
}