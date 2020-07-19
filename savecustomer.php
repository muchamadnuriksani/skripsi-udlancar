<!DOCTYPE html>
<html>
<head>
<title>Proses</title>
<link rel="stylesheet" type="text/css" href="sweetalert/dist/sweetalert.css">
<script type="text/javascript" src="sweetalert/dist/sweetalert.min.js"></script> 
</head>
<body>
<?php
session_start();
include($_SERVER['DOCUMENT_ROOT']."/rest/includes/lib.inc.php");
include(INCLUDES_DIR."/class.inc.php");
$jp 	= new jcore();
$jp2 	= new jcore();
$jp3 	= new jcore();
$_SESSION['idplg']=$_POST[custlogin];
$_SESSION['nama']=$_POST[custnm];
$_SESSION['alamat']=$_POST[custalm];
$_SESSION['kota']=$_POST[custkota];


$q = "replace into pelanggan set nama='".$_POST[custnm]."'"
.",alamat='".$_POST[custalm]."',telepon='".$_POST[custhp]."'"
.",kota='".$_POST[custkota]."'" 
.",idplg='".$_POST[custlogin]."',pass='".$_POST[custpass]."'";
$jp->sql($q);

echo '<script> 
			swal({
			  title: "Registrasi Berhasil",
			  text: "",
			  type: "success",
			  showCancelButton: false,
			  confirmButtonText: "OK "
			},
			function(isConfirm) {
			  if (isConfirm) {
				window.location="index.php?page=sukses";
			  } 
			});
			</script>';
?>

</body>
