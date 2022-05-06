<div class="row">
    <div class="col-sm-12">
		<h2 style="display: inline-block">Login</h2>
		<?php
			if(isset($view_data['loginerror'])) {
		?>
		<p class="text-center text-danger">Please enter the valid details.</p>
		<?php }?>
		<form action="/index.php/user/login" method="POST">
			  <div class="form-group">
				<label for="username">Username:</label>
				<input type="text" class="form-control" placeholder="Enter Username" id="username" name="username" value="<?=isset($view_data['username']) ? $view_data['username'] : ''?>" required>
			  </div>
			  <div class="form-group">
				<label for="password">Password:</label>
				<input type="password" class="form-control" placeholder="Enter password" id="password" name="password" required>
			  </div>
			  <button type="submit" name="submit_login" class="btn btn-primary">Submit Login</button>
		</form>
    </div>
</div>