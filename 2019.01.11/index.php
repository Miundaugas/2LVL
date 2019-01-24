<?php

$products = [
	1 => [
		'name' 				=> 'Product1',
		'short-description' => 'Short info',
		'price' 			=> '10.50',
		'special-price' 	=> '9.99'
	],
	2 => [
		'name' 				=> 'Product2',
		'short-description' => 'Short info',
		'price' 			=> '11.29'
	],
	3 => [
		'name' 				=> 'Product3',
		'short-description' => 'Short info',
		'price' 			=> '12',
		'special-price' 	=> '12.99'
	]
];

$rates = [

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

function getRightPrice($product, $rates){
	$priceBlock = '';
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		if(isset($product['special-price'])){
			// OLD PRICE
			$priceBlock .= '<span class="old-price"><strike>'.convert($product['price'], $rates[$id]['value'], $rates[$id]['code']).'</strike></span>';
			// SPECIAL PRICE
			$priceBlock .= '<span class="special-price">'.convert($product['special-price'], $rates[$id]['value'], $rates[$id]['code']).'</span>';
		} else {
			$priceBlock .= '<span class="regular-price">'.convert($product['price'], $rates[$id]['value'], $rates[$id]['code']).'</span>';
		}		
		return $priceBlock;
	} else {
		return '0';
	}
}


function convert($price, $rate, $code){
	return $price * $rate . ' '  .  $code;
}

?>

<div class="products">
	<?php
	foreach ($products as $product): ?>
		<div class="product">
			<div class="name"><?php echo $product['name'] ?></div>
			<div class="short-description"><?php echo $product['short-description'] ?></div>
			<div class="price"><?php echo 'Price:' . getRightPrice($product, $rates) ?></div>			
		</div>
	<?php endforeach; ?>
</div>