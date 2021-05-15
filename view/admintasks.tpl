<div class="row">
    <div class="col-sm-12">
		<h2 style="display: inline-block">Task List</h2>	  
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th>Username</th>
					<th>Email</th>
					<th>Status</th>
					<th>Action</th>
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
					<th><a class="btn btn-primary" href="/index.php/user/editTask/<?=$task['task_id']?>">Edit</a></th>					
				</tr>
				<?php
						$i++;
					}
				} else {				
				?>
				<tr>
					<td colspan="5">No Tasks Found...</td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>		
    </div>
</div>