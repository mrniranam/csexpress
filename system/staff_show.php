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
						<h1>สินค้าที่กำลังดำเนินการ</h1>
					</div>
					<?php
						include_once("connect.php");
						
						// แสดงสินค้าที่ กำลังเดินทาง และต้องเป็นของในการดูแลของ Staf คนที่ Login
						$result = mysqli_query($conn,"SELECT Sup_ID, Name, Send_date, Receive_date FROM supplies WHERE Status = 1 AND Fstaff_ID in (SELECT Staff_ID FROM staff WHERE Username = '".$_SESSION['staff_username']."')");
					?>
					<table class="table table-striped table-bordered" style="text-align: center;">
						<tr>
							<th>No</th>
							<th>Supplies ID</th>
							<th>Name</th>
							<th>Send Date</th>
							<th>Receive Date</th>
							<th>Info</th>
							<th>Complete</th>
						</tr>
					<?php
					$i = 1;
					
					while($row = $result->fetch_assoc()){
					?>
						<tr>
							<td><? echo $i;?></td>
							<td><?=$row['Sup_ID'];?></td>
							<td><?=$row['Name'];?></td>
							<td><?=$row['Send_date'];?></td>
							<td><?=$row['Receive_date'];?></td>
							<td><button type="button" class="btn btn-info csfrom" onclick="parent.location='info.php?id=<?php echo $row['Sup_ID']?>'">INFO</button></td>
							<td><?php
								$date = date("Y-m-d");
								
								if($row['Receive_date'] <= $date)
									echo "<button type=\"button\" class=\"btn btn-success csfrom\" onclick=\"parent.location='comp.php?id=".$row['Sup_ID']."'\">COMPLETE</button>";
								else echo "<button type=\"button\" class=\"btn btn-success csfrom\" onclick=\"parent.location='comp.php?id=".$row['Sup_ID']."'\" disabled=\"disabled\">COMPLETE</button>";
							?>
							</td>
						</tr>
					<?php
						$i = $i + 1;
					}
						mysqli_close($conn);
					?>
					</table>
					<hr>
				</div>
			</div>
		</div>
	</body>
</html>