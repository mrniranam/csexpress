<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<title>STAFF</title>
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
session_start();

if($_SESSION['staff_username'] == ""){
		echo "<META HTTP-EQUIV=Refresh content=0;URL=login.php>";
}

if(count($_POST)>0) {
include_once("connect.php");
$result = mysqli_query($conn,"SELECT * FROM staff WHERE Username='" . $_POST["staff_username"] . "' and Password = '". $_POST["staff_password"]."'");
$row  = mysqli_fetch_array($result,MYSQLI_ASSOC);
if(is_array($row)) {
$_SESSION['staff_username'] = $row['Username'];
} else {
?>
<br/><br/><br/><br/><br/>
<h1 align="center" ><font color="white">Invalid Username or Password!</font></h1>
<center><img src="../pic/stop.png" height="280" width="280" ><br/><br/>
<button type="button" class="btn btn-default" onClick="window.location.href='login.php'"> Back </button></center>
<?php
}
}
if(isset($_SESSION['staff_username'])) {
header("Location:staff_show.php");
}
?>
</body>
</html>