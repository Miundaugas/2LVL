<?php

$currentPost = $this->posts; ?>

<div class="container">
	<div class="row"><?php
		while ($post = $currentPost->fetch_assoc()) { ?>	
		
			<div class="blog-post">
	        <h2 class="blog-post-title"><?php echo $post['title']?></h2>
	        <p class="blog-post-meta"><?php echo $post['create_time']?> by <?php echo $post['author']?></p>
	        <hr>
	        <p><?php echo $post['content']?></p>
	        <a href="/2LVL/2019.01.21/MVC/index.php/posts/edit/<?php echo $post['id']?>"><button>Edit</button></a>
	        <a href="/2LVL/2019.01.21/MVC/index.php/posts/delete/<?php echo $post['id']?>"><button>Delete Post</button></a>
	    <?php }?>	    	 	
      		</div>
	</div>
</div>