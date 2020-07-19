<?php
session_start();
include($_SERVER['DOCUMENT_ROOT']."/rest/includes/lib.inc.php");
include(INCLUDES_DIR."/class.inc.php");
include(INCLUDES_DIR."/class.paging.php");
$jp = new jcore();
$jp->sql("delete from transaksi where kdbrg='".$_REQUEST[id]."' and sid='".$_SESSION['sid']."' "
." and notransaksi='TEMP'");	
$jp->gotox("index.php?page=keranjangbelanja");
?>
