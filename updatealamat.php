<?php
session_start();
include($_SERVER['DOCUMENT_ROOT']."/rest/includes/lib.inc.php");
include(INCLUDES_DIR."/class.inc.php");
include(INCLUDES_DIR."/class.paging.php");
$jp = new jcore();
$jp = new jcore();

$result = $jp->sql("select a.* from transaksi a inner join barang b on a.kdbrg=b.kdbrg where a.sid='".$_SESSION['sid']."' and a.notransaksi='TEMP' and a.idplg='".$_SESSION[idplg]."'  ");

$n=0; $subtot = 0; $grandtot = 0;

while($row=$jp->fetch($result)){
	if ($_POST[$row[kdbrg]]=='') 
		{ 
		$alm = $row[alamat];
		$kota = $row[kota];
		}
		else 
		{
		$alm = $_POST[$row[kdbrg]];
		$kota = $_POST[kota];
		
		}
	
	
	
	$z="update transaksi set alamat='".$alm."',kota='".$kota."' where kdbrg='".$row[kdbrg]."' and sid='".$_SESSION['sid']."' "
	." and notransaksi='TEMP' and idplg='".$_SESSION[idplg]."' ";
	//echo $z;
	$jp->sql($z);
}

$jp->gotox("index.php?page=keranjangbelanja");


//$jp->sql("update transaksi set  alamat='".$_POST['alamat']."',kota='".$_POST['kota']."' where ='".$_REQUEST[no]."' ");	
//$jp->gotox("index.php?page=keranjangbelanja");
?>
