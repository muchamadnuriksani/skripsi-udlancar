<!DOCTYPE html>
<html>
<head>
<title>Proses</title>
<link rel="stylesheet" type="text/css" href="sweetalert/dist/sweetalert.css">
<script type="text/javascript" src="sweetalert/dist/sweetalert.min.js"></script> 
</head>
<body>
<?php
include_once ($_SERVER['DOCUMENT_ROOT']."/rest/includes/class.inc.php");
$jp = new jcore();
session_start();
$ok = $jp->cekidplg($_POST['namauser'],$_POST['passuser']);
if($ok>0)
{
	$jp->gotox("index.php");
}
else
{
	//$jp->gotox("index.php?page=login&errorAuth=1");
	echo '<script> 
			swal({
			  title: "Email atau Password Salah",
			  text: "",
			  type: "warning",
			  showCancelButton: false,
			  confirmButtonText: "OK "
			},
			function(isConfirm) {
			  if (isConfirm) {
				window.location="index.php?page=login";
			  } 
			});
			</script>';
}
?>
</body>