<?php
session_start();
include($_SERVER['DOCUMENT_ROOT']."/rest/includes/lib.inc.php");
include(INCLUDES_DIR."/class.inc.php");
include(INCLUDES_DIR."/class.paging.php");

$jp = new jcore();

$result = $jp->sql("select a.*,b.nmbrg,b.stok from transaksi a inner join barang b on a.kdbrg=b.kdbrg "
." where a.sid='".$_SESSION['sid']."' and notransaksi='TEMP' and idplg='".$_SESSION[idplg]."'");

$n=0; $subtot = 0; $grandtot = 0;

while($row=$jp->fetch($result)){
	if ($_POST[$row[kdbrg]]=='') 
		{ 
		$jml = $row[jml];
		$alm = $row[alamat];
		$kota = $row[kota];
		$paket = $row[paket];
		
		}
		else 
		{
		$jml = $_POST[$row[kdbrg]];
		$alm = $_POST[alamat];
		$kota = $_POST[kota];
		$paket = $_POST[paket];
		
		}
	
	
if (($row[stok]) >= ($_POST[$row[kdbrg]])){
	$jp->sql("update transaksi set alamat='".$alm."',kota='".$kota."', jml='".$jml."',paket='".$paket."' where kdbrg='".$row[kdbrg]."' and sid='".$_SESSION['sid']."' "
	." and notransaksi='TEMP' and idplg='".$_SESSION[idplg]."' ");
	}
}
$jp->gotox("index.php?page=keranjangbelanja");
?>
