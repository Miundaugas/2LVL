<?php

$currency = [

	1 => [
		'code' 	=> 'EUR',
        'value' => '1'
    ],

    2 => [
    	'code' 	=> 'USD',
    	'value' => '0.869451'
    ],

    3 => [
    	'code' 	=> 'GBP',
    	'value' => '1.10862'
    ],

    4 => [
    	'code' 	=> 'JPY',
    	'value' => '0.00802006'
    ],

    5 => [
    	'code' 	=> 'RUB',
    	'value' => '0.0129709'
    ]
];

// $_GET array
// $getValue = $_GET;
// var_dump($getValue);
// foreach ($getValue as $key => $value) {
// 	if(isset($_POST['submit'])){
// 		$currencyCode = $key;
// 		foreach ($currency as $key => $value) {
// 			if($currencyCode == $value['code']){
// 				$toEur = $_POST['number'] / $value['value'];
// 				$fromEur = $_POST['number'] * $value['value'];
// 				echo '<b>' . $_POST['number'] . ' Euros will be:</b> ' . round($toEur, 4) . ' ' . $value['code'] . '<br>';
// 				echo '<b>' . $_POST['number'] . ' ' . $value['code'] . ' will be:</b> ' . round($fromEur, 4) . ' Eur';
// 			}
// 		}
// 	}
// }


// $_GET STRING
$getValue = $_GET['code'];

if(isset($_POST['submit'])){
	if(is_numeric($_POST['number'])){
		foreach ($currency as $key => $value) {
			if($getValue == $value['code']){
				$toEur = $_POST['number'] / $value['value'];
				$fromEur = $_POST['number'] * $value['value'];
				echo $_POST['number'] . '<b>' . ' Euros will be:</b> ' . round($toEur, 3) . ' ' . '<b>' . $value['code'] . '</b>' . '<br>';
				echo $_POST['number'] . ' ' . '<b>' . $value['code'] . ' will be:</b> ' . round($fromEur, 3) . ' <b>Eur</b>';
			}
		}		
	}
}

// $json = file_get_contents("https://api.exchangeratesapi.io/latest");
// $currencyArray = json_decode($json);
// var_dump($currencyArray);
?>

<form method="POST" action="">
	<input type="number" name="number">
	<input type="submit" name="submit">
</form>