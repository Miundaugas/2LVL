<?php

function drop(){
	$num = rand(1,6);
	return $num;
	if($num <= 5 || 6){
		echo drop();
	} else {
		echo drop();
	}
}


while (drop() <= 5) {
	echo drop();
}
