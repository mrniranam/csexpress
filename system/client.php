<?php
	session_start();
	if($_SESSION['client_ID'] == "")
	{
		echo "<META HTTP-EQUIV=Refresh content=0;URL=login.php>";
	}
?>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<title>Client</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><style type="text/css">
<!--
body {
	background-color: #c0392b;
}
-->
</style>
</head>
<body>
<?php
if(count($_POST)>0) {
include_once("connect.php");
$result = mysqli_query($conn,"SELECT * FROM supplies WHERE Sup_ID='" . $_POST["Sup_ID"] . "'");
$row  = mysqli_fetch_array($result,MYSQLI_ASSOC);

if(is_array($row)) {
$_SESSION['client_ID'] = $row['Sup_ID'];
}
else {
?>
<br/><br/><br/><br/><br/>
<h1 align="center" ><font color="white">Invalid Username or Password!</font></h1>
<center><img src="../pic/stop.png" height="280" width="280" ><br/><br/>
<button type="button" class="btn btn-default" onClick="window.location.href='login.php'"> Back </button></center>
<?php
}

}
if(isset($_SESSION['client_ID'])) {
header("Location:client_show.php");
}
?>
</body>
</html>