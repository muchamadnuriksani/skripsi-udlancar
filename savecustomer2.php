<?php
$hari = date("ym");
session_start();
include($_SERVER['DOCUMENT_ROOT']."/rest/includes/lib.inc.php");
include(INCLUDES_DIR."/class.inc.php");
include(INCLUDES_DIR."/class.paging.php");
$jp 	= new jcore();
$jp2 	= new jcore();
$jp3 	= new jcore();

$q1= "SELECT max(RIGHT(notransaksi,3))+1 as maks from transaksi WHERE LEFT(notransaksi,4)=(SELECT DATE_FORMAT(CURRENT_DATE,'%y%m'))";
	$r1 = $jp->sql($q1);
	$o1 = $jp->fetch($r1);
	
	if (strlen($o1[maks])<=0) {
	 $kode= $hari.'-RS-'.'001';
	 }
	else if (strlen($o1[maks])==1) {
	 $kode= $hari.'-RS-00'.$o1[maks];
	 }
	else if (strlen($o1[maks])==2) {
	 $kode= $hari.'-RS-0'.$o1[maks];
	 } 
	 else if (strlen($o1[maks])==3) {
	 $kode= $hari.'-RS-'.$o1[maks];
	 } 
	 

$_SESSION['kode']=$kode;
if($_SESSION['idplg']==''){
	$ok = $jp->cekidplg($_POST['namauser'],$_POST['passuser']);
	if($ok>0){
		$q2="select * from transaksi  where notransaksi='TEMP'";
		$result2=$jp2->sql($q2);
		while($hasil = $jp2->fetch($result2))
  		{ 
			$q3="update barang set stok = stok - ".$hasil[jml]." where kdbrg='".$hasil[kdbrg]."'";
			$jp3->sql($q3);
		}
		$q = "update transaksi set notransaksi='".$kode."'"
		." ,tgtransaksi=current_date() where notransaksi='TEMP' and sid='".$_SESSION['sid']."'";
		$jp->sql($q);
		$jp->gotox("index.php?page=orderinfo");
	}else{
		$jp->gotox("index.php?page=showcustomer&errAuth2=1");		
	}
}else{

		$q2="select * from transaksi  where notransaksi='TEMP'";
		$result2=$jp2->sql($q2);
		while($hasil = $jp2->fetch($result2))
  		{ 
			$q3="update barang set stok = stok - ".$hasil[jml]." where kdbrg='".$hasil[kdbrg]."'";
			$jp3->sql($q3);
		}
		$q = "update transaksi set notransaksi='".$kode."' "
		." ,tgtransaksi=current_date() where notransaksi='TEMP' and sid='".$_SESSION['sid']."'";
		$jp->sql($q);
		
		$jp->gotox("index.php?page=orderinfo");
}
?>
