<?php

echo '<pre>';


$data = [];
$file = fopen('staff.csv', 'r');
while(($line = fgetcsv($file)) !== false){
	$data[] = $line;
}

fclose($file);

$keyArray = $data[0];
$staffArray = [];

$i = 0;

foreach ($data as $key => $element) {
	if ($i>0){
		foreach ($element as $index => $item){
			// print_r($staffArray[$i][$keyArray[$index]]);
			$staffArray[$i][$keyArray[$index]] = $item;
		}
	}
	$i++;
}

print_r($staffArray);