<?php
session_start();
if(isset($_SESSION["staff_username"])) {
unset($_SESSION["staff_username"]);
}
if(isset($_SESSION["client_ID"])) {
unset($_SESSION["client_ID"]);
}
header("Location:../index.php");
?>