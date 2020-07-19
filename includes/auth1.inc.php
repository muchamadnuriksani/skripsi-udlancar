<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT']."/rest/includes/class.inc.php";
$auth = new jcore();

if($_SESSION[awal]==''){
	header('location: /rest/awal.php');
	exit;
}
?>