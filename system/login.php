<?php
	session_start();
	if(isset($_SESSION["staff_username"])) {
		unset($_SESSION["staff_username"]);
	}
	if(isset($_SESSION["client_ID"])) {
		unset($_SESSION["client_ID"]);
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<meta charset="utf-8">
		<!-- Start Bootstrap -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../css/login.css">
		<script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/login.js"></script>
	</head>
	<body>
    
		<div class="login-body">
			<article class="container-login center-block">
				<section>
					<ul id="top-bar" class="nav nav-tabs nav-justified">
						<li class="active" id="cus-active"><a href="#login-access" id="customer-form-link">Customer</a></li>
						<li id="staff-active"><a href="#" id="staff-form-link">Staff</a></li>
					</ul>
					<div class="tab-content tabs-login col-lg-12 col-md-12 col-sm-12 cols-xs-12">
						<div id="login-access" class="tab-pane fade active in">
							<h2><i class="glyphicon glyphicon-log-in"></i> CS-EXPRESS</h2>						
							<form method="post" action="client.php" accept-charset="utf-8" autocomplete="off" role="form" class="form-horizontal active" id="customer-form">
								<div class="form-group ">
									<label for="login" class="sr-only">Sup_ID</label>
										<input type="text" class="form-control" name="Sup_ID" placeholder="Supplies ID" tabindex="1"/>
								</div>
								<br/>
								<div class="form-group ">				
										<button type="submit" name="log-me-in" id="submit" tabindex="3" class="btn btn-lg btn-primary">Enter</button>
								</div>
							</form>
							<form method="post" action="staff.php" accept-charset="utf-8" autocomplete="off" role="form" class="form-horizontal hide" id="staff-form">
								<div class="form-group ">
									<label for="login" class="sr-only">Username</label>
										<input type="text" class="form-control" name="staff_username" placeholder="Username" tabindex="1"/>
								</div>
								<div class="form-group ">
									<label for="password" class="sr-only">Password</label>
										<input type="password" class="form-control" name="staff_password" placeholder="Password" tabindex="2"/>
								</div>
								<br/>
								<div class="form-group ">				
										<button type="submit" name="log-me-in" id="submit" tabindex="3" class="btn btn-lg btn-primary">Enter</button>
								</div>
							</form>
						</div>
					</div>
				</section>
			</article>
		</div>
	</body>
</html>