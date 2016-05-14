<?php
session_start();

if($_SESSION['staff_username'] == ""){
	echo "<META HTTP-EQUIV=Refresh content=0;URL=login.php>";
}

$Sup_Name=$_POST['name'];
$Weight=$_POST['weight'];
$Size=$_POST['size'];
$ProductType=$_POST['product_type'];
$TransportType=$_POST['tran'];
$Insurance=$_POST['insurance'];
$Product_price=$_POST['product_price'];
$Fstaff_ID=$_POST['fstaff'];

if($ProductType=='stock')
{
	if($Size<125000)
	{ $Shipping_cost= $Weight*100;}
	else if($Size<1000000)
	{ $Shipping_cost= $Weight*200;}
	else if($Size<14400000)
	{ $Shipping_cost= $Weight*300;}
}
else if($ProductType=='paper')
{
	$Shipping_cost= $Weight*500;
}

if($TransportType=='priority')
{
	$Day_Delivery=1;
	$Shipping_cost*=2;
}
else if($TransportType=='connect')
{
	$Day_Delivery=3;
}
else if($TransportType=='economy')
{
	$Day_Delivery=7;
	$Shipping_cost*=0.5;
}

$Send_date = date("Y-m-d");
$Receive_date = date("Y-m-d", strtotime("+$Day_Delivery day", strtotime($Send_date)));

include_once("connect.php")

// ค้นว่ามีข้อมูลอยู่ในระบบแล้วหรือยัง
$query = "SELECT Sen_ID FROM sender WHERE Sen_ID = '".$_POST['sen_id']."'";
$result = mysqli_query($conn,$query);
$row  = mysqli_fetch_array($result,MYSQLI_ASSOC);

// ถ้ามีจะใช้การอัพเดต
if(is_array($row)){
	echo "UPDATE Sender.";
	$query = "UPDATE sender SET Name = '".$_POST['sen_name']."', Email = '".$_POST['sen_mail']."', Tel = '".$_POST['sen_tel']."', Address = '".$_POST['sen_add']."', VisaNumber = '".$_POST['sen_visa']."'";
	$result = mysqli_query($conn,$query);
	$Fsen_ID = $_POST['sen_id'];
}
// แต่ถ้าไม่มีจะเพิ่มเข้าไปใหม่
else{
	echo "INSERT Sender.";
	$query = "INSERT INTO sender (Sen_ID, Name, Email, Tel, Address, VisaNumber) VALUES ('".$_POST['sen_id']."', '".$_POST['sen_name']."', '".$_POST['sen_mail']."', '".$_POST['sen_tel']."', '".$_POST['sen_add']."' ,'".$_POST['sen_visa']."')";
	$result = mysqli_query($conn,$query);
	$Fsen_ID = mysqli_insert_id($conn);
}

// ค้นว่ามีข้อมูลอยู่ในระบบแล้วหรือยัง
$query = "SELECT Rencip_ID FROM recipient WHERE Rencip_ID = '".$_POST['recip_id']."'";
$result = mysqli_query($conn,$query);
$row  = mysqli_fetch_array($result,MYSQLI_ASSOC);

// ถ้ามีจะใช้การอัพเดต
if(is_array($row)){
	echo "UPDATE Recipient.";
	$query = "UPDATE recipient SET Name = '".$_POST['recip_name']."', Email = '".$_POST['recip_mail']."', Tel = '".$_POST['recip_tel']."', Address = '".$_POST['recip_add']."'";
	$result = mysqli_query($conn,$query);
	$Frecip_ID = $_POST['recip_id'];
}
// แต่ถ้าไม่มีจะเพิ่มเข้าไปใหม่
else{
	echo "INSERT Recipient.";
	$query = "INSERT INTO recipient (Recip_ID, Name, Email, Tel, Address) VALUES ('".$_POST['recip_id']."', '".$_POST['recip_name']."', '".$_POST['recip_mail']."', '".$_POST['recip_tel']."', '".$_POST['recip_add']."')";
	$result = mysqli_query($conn,$query);
	$Frecip_ID = mysqli_insert_id($conn);
}

$query = "INSERT INTO supplies (Name,Weight,Size,ProductType,TransportType,Insurance,Shipping_cost,Product_price,Day_Delivery,Send_date,Receive_date,Fstaff_ID,Fsen_ID,Frecip_ID) VALUES ('$Sup_Name','$Weight','$Size','$ProductType','$TransportType','$Insurance','$Shipping_cost','$Product_price','$Day_Delivery','$Send_date','$Receive_date','$Fstaff_ID','$Fsen_ID','$Frecip_ID')";
$result = mysqli_query($conn,$query);
if($result)
{
?>
<br/><br/><br/><br/><br/><br/>
<body id="fullbgpass">
<h1 align="center">Add Supply successfully!</h1><br/><br/>
<center><font size="+6"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></font><br/><br/>
<button type="button" class="btn btn-default" onClick="window.location.href='staff_show.php'"> Continue </button></center>
<?php
}
else
{
?>
<body id="fullbgfail">
<br/><br/><br/><br/><br/><br/>
<h1 align="center">Add Supply Fail!</h1><br/>
<center><font color="white">Can not Add Supply with this Information.</font><br/><br/>
<font size="+6"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></font><br/><br/>
<button type="button" class="btn btn-default" onClick="window.location.href='staff_show.php'"> Register Again </button></center>
<?php
}
mysqli_close($conn);
?>
