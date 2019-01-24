<?php

$allUsers = $this->users;?>
	<div class="container">
		<div class="row mb-2">
			<?php while ($user = $allUsers->fetch_assoc()) { ?>
	        <div class="col-md-6">
		        <div class="card flex-md-row mb-4 shadow-sm h-md-250">
		            <div class="card-body d-flex flex-column align-items-start">
		              <strong class="d-inline-block mb-2 text-primary">User</strong>
		              <h3 class="mb-0">
		                <a class="text-dark" href="/2LVL/2019.01.21/MVC/index.php/users/show/<?php echo $user['id']?>"><?php echo $user['name']?></a>
		              </h3>
		              <p class="card-text mb-auto"><?php echo $user['email']?></p>
		            </div>
		            <svg class="bd-placeholder-img card-img-right flex-auto d-none d-lg-block" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect fill="#55595c" width="100%" height="100%"></rect><text fill="#eceeef" dy=".3em" x="50%" y="50%">User Picture</text></svg>
	            </div>
	        </div>	
<?php } ?>
	    </div>
	</div>