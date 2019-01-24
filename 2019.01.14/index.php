<?php

$x=10;
$sum=0;
for ($i=1; $i <= 120; $i++) { 
	$sum +=$x + $sum*(125/(10000));
	
	echo '<br>';
	echo round($sum,2);
}	