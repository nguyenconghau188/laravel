<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>iNote</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
	<?php 
		if ($user) {
			echo '
				<nav class="navbar navbar-default" role="navigation">
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-header">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-edit"></span> iNote</a>
						</div>

						<div class="collapse navbar-collapse" id="nav-header">
							<ul class="nav navbar-nav navbar-right">
								<li>
								    <a href="index.php?ac=create_note">
								        <span class="glyphicon glyphicon-plus"></span> Note mới
								    </a>
								</li>
								<li>
								    <a href="index.php?ac=change_password">
								        <span class="glyphicon glyphicon-lock"></span> Đổi mật khẩu
								    </a>
								</li>
								<li>
								    <a href="signout.php">
								        <span class="glyphicon glyphicon-off"></span> Thoát
								    </a>
								</li>
							</ul>
						</div>
					</div>
				</nav>
			';
		}
		else {
			echo '
				<nav class="navbar navbar-default" role="navigation">
					<div class="container-fluid">
						<div class="navber-header">
							<a class="navbar-brand" href="index.php">
							    <span class="glyphicon glyphicon-edit"></span> iNote
							</a>
						</div>
					</div>
				</nav>
			';
		}
	 ?>
