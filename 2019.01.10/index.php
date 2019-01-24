<?php

$a = 3;
$b = 6;
$c = 9;

$max = 0;

if($a > $b){
	if($a > $c){
		$max = $a;
	} else {
		$max = $c;
	}
} else {
	if($b > $c){
		$max = $b;
	} else {
		$max = $c;
	}
}

echo $max;