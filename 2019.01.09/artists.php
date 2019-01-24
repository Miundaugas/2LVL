<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// echo '<pre>';


$data = [];
$file = fopen('artist.csv', 'r');
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
		.wrapper {
			width: 80%;
			margin: 0 auto;
			background: #ccc;
			padding: 10px;
			overflow: hidden;
		}
		.box {
			width: 33%;
			float: left;
			margin-bottom: 30px;
			text-align: center;
		}
		.artist {
			font-size: 8px;
			color: #888;
		}
		.price {
			color: #ff0000;
		}
		.box img {
			max-width: 80%;
		}
	</style>
</head>
<body>
	<div class="wrapper">
		<?php
			foreach ($artistArray as $artist): ?>
				<div class="box">
					<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/ca/CD-ROM.png/220px-CD-ROM.png">
					<div class="album">
						<?php echo $artist['album_name']; ?>
					</div>
					<div class="artist">
						<?php echo $artist['artist'].'('.$artist['years'].')'; ?>
					</div>
					<div class="price">
						<?php echo $artist['price']; ?>
					</div>
				</div>
			<?php endforeach; ?>
	</div>
</body>
</html>