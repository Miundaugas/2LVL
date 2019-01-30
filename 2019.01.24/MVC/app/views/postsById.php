<div class="container">
	<div class="row"><?php
		foreach ($this->posts as $post) { ?>
			<div class="blog-post">
	        <h2 class="blog-post-title"><?php echo $post['title']; ?></h2>
	        <p class="blog-post-meta">By: <?php echo $post['author']['name']; ?></p>
	        <hr>
	        <p><?php echo $post['content']; ?></p>
	        <hr>
	        <strong>Komentarai:</strong> 
	        <br>
       		<?php foreach($this->comments as $comment): ?>
   				<?php echo $comment['comment'] ?><strong> By: <?php echo $comment['author']['name'];?></strong><br>
   				<?php if (isset($_SESSION['id'])) {
   						if ($_SESSION['id'] == $comment['author']['id']) { ?>
   							<a href="/2LVL/2019.01.24/MVC/app/index.php/comments/deleteComment/<?php echo $comment['id']?>"><button class="delete-comment">Delete</button></a><br>
   						<?php }
       				} ?>	
       		<?php endforeach; ?>
	        <br>
	        <a href="/2LVL/2019.01.24/MVC/index.php/posts/edit/<?php echo $post['id']?>"><button class="edit-post">Edit</button></a>
	        <button class="delete-post" id="<?php echo $post['id']?>">Delete Post</button>
	    	 	<?php 
	    	 		if (isset($_SESSION['id'])) {
	    	 			echo $this->form;
    	 			}
	 			?>
      		</div>
      	<?php }?>
	</div>
</div>