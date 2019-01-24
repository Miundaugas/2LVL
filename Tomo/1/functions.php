<?php
 //_________1_____________
$numbersArray = [2,5,6,4,9,6];

function branch($numbersArray){

	$branch = $numbersArray[0] + end($numbersArray);

	$answer = sqrt($branch); // Skaičiuoja šaknį

	return $answer;
}

echo branch($numbersArray) . '<br>';

// _______________2___________

function average($numbersArray){
	$numbers = count($numbersArray);
	$sum = array_sum($numbersArray);
	$ats = $sum / $numbers;
	return $ats;
}

echo average($numbersArray) . '<br>';

//_______________3___________

$stringArray = ['name', 'lastname', 'phone', 'email'];

function strings($stringArray){
	$second = $stringArray[1];
	$notLast = $stringArray[count($stringArray)-2];
	return $second . ' ' . $notLast;
}

echo strings($stringArray) . '<br>';


//_________________4_________________

$strings = ['name', 'lastname', 'phone', 'email'];
var_dump($strings);
function stringSwap($strings){
	$lastValue = end($strings);
	$tmp = $strings[0]; //** Veituo $masyvas[0] gali nauduot reset($masyvas) - Gausi masyvaus perm reiksme.
	$strings[0] = $lastValue;
	$lastValue = $tmp;
	
	/**
		čia (jeigu nuori) galietum parasyt 'for' cikla, kuris skaicioutom KEIK yr elementu masyve
		tumet nerektom paciam rasyt kelynt masyvaus element paymt. Butom labiau advanced ir labiau dinamesk
		funkcej. Doutum masyv i vesks, funkcej automateska sukeistom ves laik perm ir paskutinius elementus,
		nors ir 100 ten tu elementu.
	*/
	return $strings;
}
echo '<br>';
var_dump(stringSwap($strings)); // echo negalem nauduot nes funkcej grazen masyv, ne string, del tuo error dout 'array to string conversion'. Tai paprasta var_dump (tikious kad diestituojs pasake var_dump nauduot :D) saunam pasitekrenemou i vesks.



//__________5________________
echo '<br><br>';
// $stringai = ["0" => "name", "1" => "lastname", "2" => "phone", "3" => "email"];
// var_dump($stringai);
// echo '<br>';

// function shuffleArray($stringai) { 

// } 
// echo '<br>';
// var_dump(shuffleArray($stringai));
