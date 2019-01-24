<?php

$vartotojas = [
	'vardas'  => 'Tomas',
	'pavarde' => 'Bukauskas',
	'amzius'  => 'Pilnametis',
	'pastas'  => 'bruknius@gmail.com'
];

echo '<pre>';  // Tas '<pre>' graziau tekst sutvark. Pasibandyk uzkomentout anou ir print_r vein palekt i ontrep, tep gali mazdaug pasitikrynt ku gauni.
print_r($vartotojas);

function yraPilnametis($vartotojas){
	return $vartotojas['amzius'];
}

echo yraPilnametis($vartotojas);