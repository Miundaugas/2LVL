<?php

$currentPost = $this->posts;


?>

<div class="container">
	<div class="row"><?php
		while ($post = $currentPost->fetch_assoc()) { ?>		
			<div class="blog-post">
	        <h2 class="blog-post-title"><?php echo $post['title']?></h2>
	        <p class="blog-post-meta"><?php echo $post['create_time']?> by <?php echo $post['author']?></p>
	        <hr>
	        <p><?php echo $post['content']?></p>
	        <hr>
	        <strong>Komentarai:</strong> 
	        <br>
	       		<?php foreach($this->comments as $comment): ?>
	       				<?php echo $comment['comment'] ?><strong> By: <?php echo $comment['author']['name'];?></strong>
	       				<?php if (isset($_SESSION['id'])) {
	       						if ($_SESSION['id'] == $comment['author']['id']) { ?>
	       							<a href="/2LVL/2019.01.24/MVC/index.php/comments/deleteComment/<?php echo $comment['id']?>"><button class="delete-comment">Delete</button></a><br>
	       						<?php }
	       				} ?>	
	       		<?php endforeach; ?>
	        <br>
	        <a href="/2LVL/2019.01.24/MVC/index.php/posts/edit/<?php echo $post['id']?>"><button class="edit-post">Edit</button></a>
	        <a href="/2LVL/2019.01.24/MVC/index.php/posts/delete/<?php echo $post['id']?>"><button class="delete-post">Delete Post</button></a>
	        <?php if (isset($_SESSION['id'])) { ?>
	        	<a href="/2LVL/2019.01.24/MVC/index.php/comments/add/<?php echo $post['id']?>"><button class="comment-post">Add comment</button></a>
	        <?php } ?>
	    <?php }?>	    	 	
      		</div>
	</div>
</div>