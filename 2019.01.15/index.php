<?php

include ('Class/Simple_Product.php');

$product = new Simple_Product();
$product->setName('Naujas Name');
$product->setQty(3);


$product2 = new Simple_Product();
$product2->setName('Obuolys');
$product2->setQty(6);


echo '<pre>';
print_r($product);
print_r($product2);