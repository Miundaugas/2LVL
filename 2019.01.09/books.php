<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// echo '<pre>';


$data = [];
$file = fopen('books.csv', 'r');
while(($line = fgetcsv($file)) !== false){
	$data[] = $line;
}

fclose($file);


$keyArray = $data[0];
$artistArray = [];

$i = 0;

foreach ($data as $key => $element) {
	if ($i>0){
		foreach ($element as $index => $item){
			$artistArray[$i][$keyArray[$index]] = $item;
		}
	}
	$i++;
}

// print_r($artistArray);

?>

<!DOCTYPE html>
<html>
<head>
	<style>
		.shelf {
			width: 80%;
		    height: 373px;
		    margin: 0 auto;
		    background: #af6000;
		    padding: 10px;
		    overflow: hidden;
		    display: flex;
		}
		.box {
		    /*width: 50px;*/
			margin-right: 8px;
		    float: left;
		    text-align: center;
		    border: solid;
		}
		.author {
			margin-top: 145px;
			transform: rotate(-90deg);
		}
		.years {
			transform: rotate(0deg);
		}
		.price {
			color: #ff0000;
		}
		.box:nth-child(1) {
			background-color: brown;
		}
	</style>
</head>
<body>
	<div class="shelf">
		<?php
			foreach ($artistArray as $artist): ?>
				<div class="box">
					<div class="author">
						<?php echo $artist['author'] . $artist['book_name'] . '<div class="years">' . $artist['years'] . '</div>'; ?>
					</div>
				</div>
			<?php endforeach; ?>
	</div>
</body>
</html>