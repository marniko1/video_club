<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="collapse navbar-collapse">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="<?php echo INCL_PATH; ?>">Video Club App</a>
	    </div>
	    <ul class="nav navbar-nav ml-5">
	      <li class="nav-item"><a href="<?php echo INCL_PATH; ?>"  class="nav-link">Home</a></li>
	      <li class="nav-item"><a href="<?php echo INCL_PATH.'Rentals/index'; ?>"  class="nav-link">Rentals</a></li>
	      <li class="nav-item"><a href="<?php echo INCL_PATH.'Films/index'; ?>" class="nav-link">Films</a></li>
	      <li class="nav-item"><a href="<?php echo INCL_PATH.'Clients/index'; ?>" class="nav-link">Clients</a></li>
	    </ul>
  	</div>
  	<form method="post" action="<?php echo INCL_PATH.'Login/logoutUser'; ?>">
		<div class="form-group">
   			<button class="btn btn-danger navbar-btn float-right">Logout</button>
   		</div>
	</form>
</nav>