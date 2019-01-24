<?php


$items = [
	1 => 'scissors',
	2 => 'paper',
	3 => 'rock'
];


if(isset($_POST['submit'])){
	
	$playerChoise = $_POST['options'];
	$oponentChoise = rand(1,3);

	if($oponentChoise == $playerChoise){
		echo '<b>It is draw. You both chosed:</b> ' . $items[$playerChoise];
	} elseif ($oponentChoise == 1 && $playerChoise == 2 || $oponentChoise == 2 && $playerChoise == 3 || $oponentChoise == 3 && $playerChoise == 1) {
		echo '<b>You lost with:</b> ' . $items[$playerChoise] . ' ' . '<b>against:</b> ' . $items[$oponentChoise];
	} elseif ($oponentChoise == 1 && $playerChoise == 3 || $oponentChoise == 2 && $playerChoise == 1 || $oponentChoise == 3 && $playerChoise == 2) {
		echo '<b>You won with:</b> ' . $items[$playerChoise] . ' ' . '<b>against:</b> ' . $items[$oponentChoise];
	}
}

?>

<form method="POST" action="form.php">
	<select name="options">
		<?php
			foreach ($items as $key => $value) { ?>
				<option value="<?php echo $key ?>"><?php echo $value?></option>
			<?php }
		?>
	</select>
	<input type="submit" name="submit">
</form>