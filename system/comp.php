<?php
session_start();

if($_SESSION['staff_username'] == "")
	{
		echo "<META HTTP-EQUIV=Refresh content=0;URL=login.php>";
	}

include_once("connect.php");
$query="UPDATE supplies SET Status = '2' WHERE Sup_ID = '".$_GET['id']."'";
$result=mysqli_query($conn,$query);
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
<button type="button" class="btn btn-default" onClick="window.location.href='staff_show.php'"> Continue </button></center>
<?php
}
mysqli_close($conn);
?>
