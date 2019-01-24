<?php
$user = 'root';
$db   = 'antras_lygis';
$pass = '123456789';

$con = mysqli_connect('localhost', $user, $pass, $db);

if (!$con){
    echo 'error';
}

?>

<form method="POST">
	<input type="text" name="name" placeholder="Enter your name">
	<br>
	<input type="email" name="email" placeholder="Enter your email">
	<br>
	<input type="password" name="pass" placeholder="Enter your password">
	<br>
	<input type="password" name="pass2" placeholder="Confirm your password">
	<br>
	<select name="option">
		<?php
			$pullQuery = "SELECT * FROM kebabines";
			$info = mysqli_query($con, $pullQuery);
			while ($row = mysqli_fetch_assoc($info)) { ?>
				<option value="<?php echo $row['id']?>"><?php echo $row['name'];?></option><?php
			}			
		?>
	</select>
	<input type="submit" name="submit" value="Register">
	<button type="button" onclick="location.href='login.php'">Log in</button>
</form>

<?php


;
if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$pass1 = $_POST['pass'];
	$pass2 = $_POST['pass2'];
	$work = $_POST['option'];
	$lastLogin = date("Y/m/d h:i:s");
	$pullUsers = "SELECT * FROM users WHERE email = '$email'";
	
	$userInfo = $con->query($pullUsers);
	$userEmail = $userInfo->fetch_assoc();	
		
	if($email != $userEmail['email']){
		if($pass1 == $pass2){
			$pass1 = md5(md5($pass1.'druska'));
			$insert = "INSERT INTO users (name, email, pass, restoranas, last_login) VALUES ('$name','$email','$pass1','$work', '$lastLogin')";
			if(!mysqli_query($con, $insert)){
				echo 'Failed to register ' . mysqli_error($con);
			} else {
				echo 'Registration successful';
			}
		} else {
			echo 'Slaptazodziai nesutampa';
		}
	} else {
		echo 'Vartotojas su tokiu El.pastu jau registruotas';
	}
}

?>