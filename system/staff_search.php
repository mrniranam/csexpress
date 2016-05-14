<?php
	session_start();
	if($_SESSION['staff_username'] == "")
	{
		echo "<META HTTP-EQUIV=Refresh content=0;URL=login.php>";
	}
?>
<html>
	<head>
		<title>STAFF ONLY</title>
		<meta charset="utf-8">
		<!-- Start Bootstrap -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../css/cs.css">
		<script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.min.js"></script>
	</head>
	<body>
		<?php include_once("nav-staff.php");?>
		<div class="container-fluid csslide thaisan">
			<div class="row">
				<div class="col-md-12">
					<div class="page-header">
						<h1>ค้นหาสินค้า <small>ทั้งหมดจากระบบ</small></h1>
					</div>
					<div class="container">
					<form class="form-horizontal" method="POST" action="search.php">
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label" for="formGroupInputLarge"><b>Supplies ID :</b></label>
							<div class="col-sm-7">
								<input class="form-control searchfrom" type="text" placeholder="ค้นอะไรดี" name="data">
							</div>
							<div class="col-sm-3">
								<input class="btn btn-success" type="submit" style="font-size: 2em;" value="search">
							</div>
						</div>
					</form>
					</div>
					<hr>
				</div>
			</div>
		</div>
	</body>
</html>