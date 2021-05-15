<?php $task = $view_data['result'];?>
<div class="row">
    <div class="col-sm-12">
		<h2 style="display: inline-block">Edit Task</h2>
		<form action="/index.php/user/editTask/<?=$task['task_id']?>" method="POST">
			<div class="form-group">
				<label for="username">Username:</label>
				<input type="text" class="form-control" placeholder="Enter Username" id="username" name="username" maxlength="20" value="<?=$task['username']?>" readonly>
			</div>
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" class="form-control" placeholder="Enter Email" id="email" name="email" value="<?=$task['email']?>" readonly>
			</div>
			<div class="form-group text-dark">
				<label for="description">Description:</label>
				<textarea name="description" id="description" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 82px;" class="form-control" required><?=$task['description']?></textarea>
			</div>	
			<div class="form-check mb-4">
			  <label class="form-check-label">
				<input type="checkbox" class="form-check-input" value="" id="status" name="status" <?=($task['status'] == 'completed') ? 'checked' : ''?>> Completed
			  </label>
			</div>
			<input type="hidden" value="<?=$task['task_id']?>" name="task_id">
			<button type="submit" name="submit_login" class="btn btn-primary">Submit</button>
		</form>
    </div>
</div>