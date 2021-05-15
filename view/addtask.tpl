<div class="row">
    <div class="col-sm-12">
		<h2 style="display: inline-block">Add Task</h2>
		<form action="/index.php/user/addTask" method="POST">
			<div class="form-group">
				<label for="username">Username:</label>
				<input type="text" class="form-control" placeholder="Enter Username" id="username" name="username" required  maxlength="20">
			</div>
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" class="form-control" placeholder="Enter Email" id="email" name="email" required>
			</div>
			<div class="form-group text-dark">
				<label for="description">Description:</label>
				<textarea name="description" id="description" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 82px;" class="form-control" required></textarea>
			</div>			  
		  <button type="submit" name="submit_login" class="btn btn-primary">Submit</button>
		</form>
    </div>
</div>