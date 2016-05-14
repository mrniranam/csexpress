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
		<div class="container csslide thaisan">
			<div class="row">
				<div class="col-md-12">
					<div class="page-header">
						<h1>Info</h1>
					</div>
					<?php
						include_once("connect.php");
						$result = mysqli_query($conn,"SELECT * FROM supplies WHERE Sup_ID = '".$_GET["id"]."'");
						$row = $result->fetch_assoc();
						
						$Fsen_ID = $row['Fsen_ID'];
						$Frecip_ID = $row['Frecip_ID'];
					?>
					<div class="panel panel-danger">
						<div class="panel-heading"><h3>Supplies</h3></div>
							<div class="panel-body">
								<table class="table">
									<tr>
										<td>Supplies ID</td>
										<td><?=$row['Sup_ID'];?></td>
									</tr>
									<tr>
										<td>Name</td>
										<td><?=$row['Name'];?></td>
									</tr>
									<tr>
										<td>Status</td>
										<td><?php
										if($row['Status'] == 0)
											echo "none";
										else echo "active";
										?></td>
									</tr>
									<tr>
										<td>Weight</td>
										<td><?=$row['Weight'];?></td>
									</tr>
									<tr>
										<td>Size</td>
										<td><?=$row['Size'];?></td>
									</tr>
									<tr>
										<td>Product Type</td>
										<td><?=$row['ProductType'];?></td>
									</tr>
									<tr>
										<td>Transport Type</td>
										<td><?=$row['TransportType'];?></td>
									</tr>
									<tr>
										<td>Insurance</td>
										<td><?php
										if($row['Insurance'] == 0)
											echo "no";
										else echo "yes";
										?></td>
									</tr>
									<tr>
										<td>Shipping Cost</td>
										<td><?=$row['Shipping_cost'];?></td>
									</tr>
									<tr>
										<td>Product Price</td>
										<td><?=$row['Product_price'];?></td>
									</tr>
									<tr>
										<td>Day Delivery</td>
										<td><?=$row['Day_Delivery'];?></td>
									</tr>
									<tr>
										<td>Send Date</td>
										<td><?=$row['Send_date'];?></td>
									</tr>
									<tr>
										<td>Receive Date</td>
										<td><?=$row['Receive_date'];?></td>
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
										<td><?=$row['Sen_ID'];?></td>
									</tr>
									<tr>
										<td>Name</td>
										<td><?=$row['Name'];?></td>
									</tr>
									<tr>
										<td>E-mail</td>
										<td><?=$row['Email'];?></td>
									</tr>
									<tr>
										<td>Tel</td>
										<td><?=$row['Tel'];?></td>
									</tr>
									<tr>
										<td>Address</td>
										<td><?=$row['Address'];?></td>
									</tr>
									<tr>
										<td>VisaNumber</td>
										<td><?=$row['VisaNumber'];?></td>
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
										<td><?=$row['Recip_ID'];?></td>
									</tr>
									<tr>
										<td>Name</td>
										<td><?=$row['Name'];?></td>
									</tr>
									<tr>
										<td>E-mail</td>
										<td><?=$row['Email'];?></td>
									</tr>
									<tr>
										<td>Tel</td>
										<td><?=$row['Tel'];?></td>
									</tr>
									<tr>
										<td>Address</td>
										<td><?=$row['Address'];?></td>
									</tr>
								</table>
							</div>
					</div>
				</div>
			</div>
			<hr>
			<?php mysqli_close($conn); ?>
		</div>
	</body>
</html>