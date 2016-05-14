<?php
	session_start();
	if($_SESSION['staff_username'] == "")
	{
		echo "<META HTTP-EQUIV=Refresh content=0;URL=login.php>";
	}

	include_once("connect.php");
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
		<div class="container csslide thaisan">
			<form action="add.php" method="POST">
			<div class="row">
				<div class="col-md-12">
					<div class="page-header">
						<h1>Add Supplies</h1>
					</div>
					<p style="color: red;">*กรุณากรอกข้อมูลให้ครบทุกช่อง</p>
					<div class="panel panel-danger">
						<div class="panel-heading"><h3>Supplies</h3></div>
							<div class="panel-body">
								<table class="table">
									<tr>
										<td>Name</td>
										<td>
											<div class="form-group">
												<input type="text" class="form-control" name="name">
											</div>
										</td>
									</tr>
									<tr>
										<td>Weight (kg)</td>
										<td>
											<div class="form-group">
													<input type="text" class="form-control" name="weight">
											</div>
										</td>
									</tr>
									<tr>
										<td>Size (cc)</td>
										<td>
											<div class="form-group">
													<input type="text" class="form-control" name="size">
											</div>
										</td>
									</tr>
									<tr>
										<td>Product Type</td>
										<td><select class="form-control" name="product_type">
												<option value="stock">Stock</option>
												<option value="paper">Paper</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>Transport Type</td>
										<td>
											<select class="form-control" name="tran">
												<option value="economy">Economy</option>
												<option value="connect">Connect</option>
												<option value="priority">Priority</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>Insurance</td>
										<td><select class="form-control" name="insurance">
												<option value="1">Yes</option>
												<option value="0">No</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>Product Price</td>
										<td>
											<div class="form-group">
													<input type="text" class="form-control" name="product_price">
											</div>
										</td>
									</tr>
									<tr>
										<td>Fstaff_ID</td>
										<td>
											<div class="form-group">
												<input type="text" class="form-control" name="fstaff">
											</div>
										</td>
									</tr>
								</table>
							</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="panel panel-primary">
							<div class="panel-heading"><h3>Sender</h3></div>
								<div class="panel-body">
									<table class="table">
										<tr>
											<td>Sender ID</td>
											<td>
												<div class="form-group">
														<input type="text" class="form-control" name="sen_id">
												</div>
											</td>
										</tr>
										<tr>
											<td>Name</td>
											<td>
												<div class="form-group">
														<input type="text" class="form-control" name="sen_name">
												</div>
											</td>
										</tr>
										<tr>
											<td>E-mail</td>
											<td>
												<div class="form-group">
														<input type="text" class="form-control" name="sen_mail">
												</div>
											</td>
										</tr>
										<tr>
											<td>Tel</td>
											<td>
												<div class="form-group">
														<input type="text" class="form-control" name="sen_tel">
												</div>
											</td>
										</tr>
										<tr>
											<td>Address</td>
											<td>
												<div class="form-group">
														<input type="text" class="form-control" name="sen_add">
												</div>
											</td>
										</tr>
										<tr>
											<td>VisaNumber</td>
											<td>
												<div class="form-group">
														<input type="text" class="form-control" name="sen_visa">
												</div>
											</td>
										</tr>
									</table>
								</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="panel panel-info">
							<div class="panel-heading"><h3>Recipient</h3></div>
								<div class="panel-body">
									<table class="table">
										<tr>
											<td>Recipient ID</td>
											<td>
												<div class="form-group">
														<input type="text" class="form-control" name="recip_id">
												</div>
											</td>
										</tr>
										<tr>
											<td>Name</td>
											<td>
												<div class="form-group">
														<input type="text" class="form-control" name="recip_name">
												</div>
											</td>
										</tr>
										<tr>
											<td>E-mail</td>
											<td>
												<div class="form-group">
														<input type="text" class="form-control" name="recip_mail">
												</div>
											</td>
										</tr>
										<tr>
											<td>Tel</td>
											<td>
												<div class="form-group">
														<input type="text" class="form-control" name="recip_tel">
												</div>
											</td>
										</tr>
										<tr>
											<td>Address</td>
											<td>
												<div class="form-group">
														<input type="text" class="form-control" name="recip_add">
												</div>
											</td>
										</tr>
									</table>
								</div>
						</div>
					</div>
				</div>
			</div>
				<center><input class="btn btn-success" type="submit" style="font-size: 2em;" value="Submit">  <input class="btn btn-danger" type="reset" style="font-size: 2em;" value="Reset"></center>
			</form>
			<hr>
			<?php mysqli_close($conn); ?>
		</div>
	</body>
</html>