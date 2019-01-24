<?php

for ($i=0; $i < 10 ; $i++) { 
	echo 'Labas' . '<br>';
}
//__________________________
for ($i=1; $i <= 10 ; $i++) { 
	echo $i . '<br>';
}
//__________________________
for ($i=10; $i >= 1 ; $i--) { 
	echo $i . '<br>';
}
//__________________________
for ($i=0; $i <= 100 ; $i+=2) { 
	echo $i .'<br>';
}
//__________________________
$numbersArray = [1,2,3,4,5,6];
foreach ($numbersArray as $key => $value) {
	echo $value;
}
//__________________________
echo array_sum($numbersArray);
//__________________________
