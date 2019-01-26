<?php

$currentUser = $this->users; ?>

<div class="container">
	<div class="row"><?php
		while ($user = $currentUser->fetch_assoc()) { ?>	
		
			<div class="blog-post">
	        <h2 class="blog-post-title"><?php echo $user['name']?></h2>
	        <p class="blog-post-meta"><?php echo $user['email'] . '<br>' ;?></p>
	        <hr>
	    <?php }?>
      		</div>
	</div>
</div>