<?php

$allPosts = $this->posts;?>

<div class="container">
	<div class="row mb-2">
		<?php while ($posts = $allPosts->fetch_assoc()) { ?>
        <div class="col-md-6">
	        <div class="card flex-md-row mb-4 shadow-sm h-md-250">
	            <div class="card-body d-flex flex-column align-items-start">
	              <strong class="d-inline-block mb-2 text-primary">Post</strong>
	              <h3 class="mb-0">
	                <a class="text-dark" href="/2LVL/2019.01.24/MVC/index.php/posts/show/<?php echo $posts['id']?>"><?php echo $posts['title']?></a>
	              </h3>
	              <p class="card-text mb-auto"><?php echo substr($posts['content'], -250)?></p>
	            </div>
            </div>
        </div>	
		<?php } ?>
    </div>
</div>

