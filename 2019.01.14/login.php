<?php
session_start();
$user = 'root';
$db   = 'antras_lygis';
$pass = '123456789';

$con = mysqli_connect('localhost', $user, $pass, $db);

if (!$con){
    echo 'error';
}

if(isset($_POST['submit'])){
	$email = $_POST['email'];
	$pullUsers = "SELECT * FROM users WHERE email = '$email'";

    $result = $con->query($pullUsers);
    $user = $result->fetch_assoc();

    $loginPass = md5(md5($_POST['pass'].'druska'));

    if($loginPass == $user['pass']){
    	$_SESSION['id'] = $user['id'];
    	echo 'Logged in successfully!' . '<br>' . 'Last time you logged in: ' . $user['last_login'];
    	$lastLogin = date("Y/m/d H:i:s");
    	$userId = $user['id'];
    	$updateLogin = "UPDATE users SET last_login='$lastLogin' WHERE id='$userId'";
    	mysqli_query($con, $updateLogin);
    } else {
    	echo 'Your pass dont match';
    }
}

?>

<form method="POST">
	<input type="email" name="email" placeholder="Enter your email">
	<br>
	<input type="password" name="pass" placeholder="Enter your password">
	<br>
	<input type="submit" name="submit">	
</form>