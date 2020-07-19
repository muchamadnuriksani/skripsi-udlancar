<?php
//menuju shopping bag
session_start();
include($_SERVER['DOCUMENT_ROOT']."/rest/includes/lib.inc.php");
include(INCLUDES_DIR."/class.inc.php");
include(INCLUDES_DIR."/class.paging.php");
$jp 	= new jcore();
$_SESSION['sid'] 	= session_id();

$rd 	= $jp->sql("select * from barang where kdbrg='".$_REQUEST[kdbrg]."'");
$od 	= $jp->fetch($rd);

$result = $jp->sql("replace into transaksi set kdbrg='".$od[kdbrg]."',diskon='".$od[disk]."' "
.",jml=1,hrg=\"".doubleval($od[harga])."\",sid='".$_SESSION['sid']."', idplg='".$_SESSION['idplg']."',alamat='".$_SESSION['alamat']."',kota='".$_SESSION['kota']."' ");


$jp->gotox("index.php?page=keranjangbelanja");
?>
