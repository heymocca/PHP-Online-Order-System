<?php
require_once 'Entity.inc.php';
session_start();
function AdminCheck(){
	if(!isset($_SESSION["admin"])){
		echo"<script language='javascript'>";
		echo"alert('Permissions has been overdue, please login again !');";
		echo"window.top.location.href='Login.php';";
		echo"</script>";
		exit;
	}
}

function customerCheck(){
	if(!isset($_SESSION["customer"])){
		echo"<script language='javascript'>";
		echo"alert('Please login first and then try it again !');";
		echo"window.top.location.href='Login.php';";
		echo"</script>";
		exit;
	}
}
?>