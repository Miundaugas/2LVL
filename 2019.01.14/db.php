<?php

$user = 'root';
$db   = 'antras_lygis';
$pass = '123456789';

$con = mysqli_connect('localhost', $user, $pass, $db);

if (!$con){
    echo 'error';
}


if(isset($_POST['submit'])){
	$task = $_POST['task'];
	if(!empty($task)){
		$insertQuery = "INSERT INTO tasks (task) VALUES ('$task')";
        if(!mysqli_query($con, $insertQuery)){
            echo 'not inserted' . mysqli_error($con);
        } else {
            echo 'inserted';
        }
	}
}



?>


<form method="POST" action="">
	<input type="text" name="task">
	<input type="submit" name="submit">
</form>

<div class="tasks">
	<?php
		$pullQuery = "SELECT * FROM tasks";
		$info = mysqli_query($con, $pullQuery);
		foreach ($info as $key => $value) {
			var_dump($value);
		}
	?>
</div>