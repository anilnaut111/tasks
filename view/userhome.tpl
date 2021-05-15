<div class="row">
    <div class="col-sm-12">
		<h2 style="display: inline-block">Task List</h2>
		<div class="col-auto float-right ml-auto">
		<a href="/index.php/user/addTask" class="btn btn-info"><i class="fa fa-plus"></i> Add Task</a></div>	
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th><a href="/index.php/user/user?orderby=username&sort=<?=$view_data['sort']?>" class="btn btn-link">Username</a></th>
					<th><a href="/index.php/user/user?orderby=email&sort=<?=$view_data['sort']?>" class="btn btn-link">Email</a></th>
					<th><a href="/index.php/user/user?orderby=status&sort=<?=$view_data['sort']?>" class="btn btn-link">Status</a></th>
				</tr>
			</thead>
			<tbody>
				<?php
				if(count($view_data['result']) > 0) {
					$i = $view_data['start'] + 1;
					foreach ($view_data['result'] as $task) {
				?>			
				<tr>
					<td><?=$i?></td>
					<td><?=$task['username']?></td>
					<td><?=$task['email']?></td>
					<td><?=($task['status'] != 'completed') ? 'Pending' : 'edited by the administrator'?></td>
				</tr>
				<?php
					$i++;
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
	
	<?php require_once(__DIR__. '/../view/pagination.tpl'); ?>
	<div class="col-sm-12">
		<?php
		if(count($view_data['result']) > 0) {
			echo number_pageing($view_data['resultall'],$view_data['controller'],$view_data['function'],$view_data['start'],$view_data['order'],$view_data['sort']);
		}
		?>
	</div>
</div>