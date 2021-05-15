<div class="row">
    <div class="col-sm-12">
		<h2 style="display: inline-block">Task List</h2>
		<div class="col-auto float-right ml-auto">
		<a href="/index.php/user/addTask" class="btn btn-info"><i class="fa fa-plus"></i> Add Task</a></div>	
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th>Username</th>
					<th>Email</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if(count($view_data['result']) > 0) {
					$i = 1;
					foreach ($view_data['result'] as $task) {
				?>			
				<tr>
					<td><?=$i?></td>
					<td><?=$task['username']?></td>
					<td><?=$task['email']?></td>
					<td><?=($task['status'] != 'completed') ? 'Pending' : 'edited by the administrator'?></td>
				</tr>
				<?php
					}
				} else {				
				?>
				<tr>
					<td colspan="4">No Tasks Found...</td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
    </div>
</div>