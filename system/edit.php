<?php
	session_start();
	if($_SESSION['staff_username'] == "")
	{
		echo "<META HTTP-EQUIV=Refresh content=0;URL=login.php>";
	}
	
	include_once("connect.php");
	$result = mysqli_query($conn,"SELECT * FROM supplies WHERE Sup_ID = '".$_GET["id"]."'");
	$row = $result->fetch_assoc();
						
	$Fsen_ID = $row['Fsen_ID'];
	$Frecip_ID = $row['Frecip_ID'];
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
			<form action="update.php" method="POST">
			<div class="row">
				<div class="col-md-12">
					<div class="page-header">
						<h1>Edit</h1>
					</div>
					<div class="panel panel-danger">
						<div class="panel-heading"><h3>Supplies</h3></div>
							<div class="panel-body">
								<table class="table">
									<tr>
										<td>Supplies ID</td>
										<td>
											<div class="form-group">
												<input type="text" class="form-control" name="supplies" value="<?=$row['Sup_ID'];?>" disabled>
											</div>
										</td>
									</tr>
									<tr>
										<td>Name</td>
										<td>
											<div class="form-group">
												<input type="text" class="form-control" name="name" value="<?=$row['Name'];?>">
											</div>
										</td>
									</tr>
									<tr>
										<td>Status</td>
										<td>
											<div class="form-group">
												<input type="text" class="form-control" name="status" value="<?php
													if($row['Status'] == 0)
														echo "none";
													else echo "active";?>" disabled>
											</div>
										</td>
									</tr>
									<tr>
										<td>Weight</td>
										<td>
											<div class="form-group">
													<input type="text" class="form-control" name="weight" value="<?=$row['Weight'];?>">
											</div>
										</td>
									</tr>
									<tr>
										<td>Size</td>
										<td>
											<div class="form-group">
													<input type="text" class="form-control" name="size" value="<?=$row['Size'];?>">
											</div>
										</td>
									</tr>
									<tr>
										<td>Product Type</td>
										<td>
											<div class="form-group">
													<input type="text" class="form-control" name="product_type" value="<?=$row['ProductType'];?>">
											</div>
										</td>
									</tr>
									<tr>
										<td>Transport Type</td>
										<td>
											<div class="form-group">
													<input type="text" class="form-control" name="transport" value="<?=$row['TransportType'];?>">
											</div>
										</td>
									</tr>
									<tr>
										<td>Insurance</td>
										<td>
											<div class="form-group">
													<input type="text" class="form-control" name="insurance" value="<?php
										if($row['Insurance'] == 0)
											echo "no";
										else echo "yes";
										?>">
											</div>
										</td>
									</tr>
									<tr>
										<td>Shipping Cost</td>
										<td>
											<div class="form-group">
													<input type="text" class="form-control" name="shipping_cost" value="<?=$row['Shipping_cost'];?>">
											</div>
										</td>
									</tr>
									<tr>
										<td>Product Price</td>
										<td>
											<div class="form-group">
													<input type="text" class="form-control" name="product_price" value="<?=$row['Product_price'];?>">
											</div>
										</td>
									</tr>
									<tr>
										<td>Day Delivery</td>
										<td>
											<div class="form-group">
													<input type="text" class="form-control" name="day" value="<?=$row['Day_Delivery'];?>">
											</div>
										</td>
									</tr>
									<tr>
										<td>Send Date</td>
										<td>
											<div class="form-group">
													<input type="text" class="form-control" name="send" value="<?=$row['Send_date'];?>">
											</div>
										</td>
									</tr>
									<tr>
										<td>Receive Date</td>
										<td>
											<div class="form-group">
													<input type="text" class="form-control" name="receive" value="<?=$row['Receive_date'];?>">
											</div>
										</td>
									</tr>
								</table>
							</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
				<?php
					$result = mysqli_query($conn,"SELECT * FROM sender WHERE Sen_ID = '$Fsen_ID'");
					$row = $result->fetch_assoc();
				?>
					<div class="panel panel-primary">
						<div class="panel-heading"><h3>Sender</h3></div>
							<div class="panel-body">
								<table class="table">
									<tr>
										<td>Sender ID</td>
										<td>
											<div class="form-group">
													<input type="text" class="form-control" name="sen" value="<?=$row['Sen_ID'];?>" disabled>
											</div>
										</td>
									</tr>
									<tr>
										<td>Name</td>
										<td>
											<div class="form-group">
													<input type="text" class="form-control" name="senname" value="<?=$row['Name'];?>">
											</div>
										</td>
									</tr>
									<tr>
										<td>E-mail</td>
										<td>
											<div class="form-group">
													<input type="email" class="form-control" name="senmail" value="<?=$row['Email'];?>">
											</div>
										</td>
									</tr>
									<tr>
										<td>Tel</td>
										<td>
											<div class="form-group">
													<input type="text" class="form-control" name="sental" value="<?=$row['Tel'];?>">
											</div>
										</td>
									</tr>
									<tr>
										<td>Address</td>
										<td>
											<div class="form-group">
													<input type="text" class="form-control" name="senadd" value="<?=$row['Address'];?>">
											</div>
										</td>
									</tr>
									<tr>
										<td>VisaNumber</td>
										<td>
											<div class="form-group">
													<input type="text" class="form-control" name="senvisa" value="<?=$row['VisaNumber'];?>">
											</div>
										</td>
									</tr>
								</table>
							</div>
					</div>
				</div>
				<div class="col-md-6">
				<?php
					$result = mysqli_query($conn,"SELECT * FROM recipient WHERE Recip_ID = '$Frecip_ID'");
					$row = $result->fetch_assoc();
				?>
					<div class="panel panel-info">
						<div class="panel-heading"><h3>Recipient</h3></div>
							<div class="panel-body">
								<table class="table">
									<tr>
										<td>Recipient ID</td>
										<td>
											<div class="form-group">
													<input type="text" class="form-control" name="recip" value="<?=$row['Recip_ID'];?>" disabled>
											</div>
										</td>
									</tr>
									<tr>
										<td>Name</td>
										<td>
											<div class="form-group">
													<input type="text" class="form-control" name="recipname" value="<?=$row['Name'];?>">
											</div>
										</td>
									</tr>
									<tr>
										<td>E-mail</td>
										<td>
											<div class="form-group">
													<input type="email" class="form-control" name="recipmail" value="<?=$row['Email'];?>">
											</div>
										</td>
									</tr>
									<tr>
										<td>Tel</td>
										<td>
											<div class="form-group">
													<input type="text" class="form-control" name="reciptal" value="<?=$row['Tel'];?>">
											</div>
										</td>
									</tr>
									<tr>
										<td>Address</td>
										<td>
											<div class="form-group">
													<input type="text" class="form-control" name="recipadd" value="<?=$row['Address'];?>">
											</div>
										</td>
									</tr>
								</table>
							</div>
					</div>
				</div>
			</div>
			<center>
				<input class="btn btn-success" type="submit" style="font-size: 2em;" value="Submit">  <input class="btn btn-danger" type="reset" style="font-size: 2em;" value="Reset">
			</center>
			</form>
			<hr>
			<?php mysqli_close($conn); ?>
		</div>
	</body>
</html>