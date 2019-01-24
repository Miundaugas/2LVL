<?php

$id = count(file("info.csv"));
echo $id;

if(isset($_POST['submit'])){
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];

	if(!empty($name && $email && $phone)){
	
		$id = count(file("info.csv"));
		echo $id;
	    if ($id > 1) {
	       $id = ($id - 1) + 1;
	    }

		$list = [
			'id' 	=> $id,
		    'name' 	=> $name,
		    'email' => $email,
		    'phone' => $phone
		];


		$fp = fopen('info.csv', 'a');
		// fputcsv($fp, $list);
		fputs($fp, '"' . implode('","', $list)  . '"' . "\n"); // Works fine.
		fclose($fp);

	} else {
		echo 'All fileds required!';
	}
}

// echo '<pre>';
// $data = [];

// $file = fopen('info.csv', 'r');
// while(($line = fgetcsv($file)) !== false){
// 	$data[] = $line;
// }

// $z = 0;

// $keyArray = $data[0];
// $usersAray = [];

// foreach ($data as $key => $value) {
// 	if ($z > 0) {
// 		foreach ($value as $key => $item) {
// 			$usersAray[$z][$keyArray[$key]] = $item;
// 		}
// 	}
// 	$z++;
// }

// print_r($usersAray);

?>

<form method="POST">
	<input type="text" name="name">
	<input type="email" name="email">
	<input type="number" name="phone">
	<input type="submit" name="submit" value="Subscribe">
</form>