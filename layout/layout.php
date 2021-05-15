<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 4 Website Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  </style>
</head>
<body>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="collapsibleNavbar">
		<ul class="navbar-nav">
		  <li class="nav-item">
			<a class="nav-link" href="/index.php/user">Home</a>
		  </li>
		  <li class="nav-item">
			<?php if(isset($_SESSION['user']['type']) && $_SESSION['user']['type'] == 'admin'){ ?>
			<a class="nav-link" href="/index.php/user/logout">Logout</a>
			<?php } else { ?>
			<a class="nav-link" href="/index.php/user/login">Admin</a>
			<?php } ?>
		  </li> 
		</ul>
	  </div>  
	</nav>

	<div class="container" style="margin-top:30px">
	  <?php require_once(__DIR__. '/../view/' . $load_view.'.tpl'); ?>
	</div>
</body>
</html>
