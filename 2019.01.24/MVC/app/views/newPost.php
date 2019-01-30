
<div class="container">
	<?php 
		if(isset($_SESSION['id'])){
			echo $this->form;
		} else {
			echo 'You need to login to create new post';
		}		
	?>
</div>