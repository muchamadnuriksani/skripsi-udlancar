<?php
session_start();
include($_SERVER['DOCUMENT_ROOT']."/rest/includes/lib.inc.php");
include(INCLUDES_DIR."/class.inc.php");


$jp = new jcore();

    $q = "select count(*) as j from pelanggan WHERE idplg='".$_POST['custlogin']."' ";
	
	$r = $jp->sql($q);
	$o = $jp->fetch($r);
	if ( !eregi( "^[0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-.]?[0-9a-z])*\\.[a-z]{2,3}$", $_POST['custlogin'] ) ) {
	echo "<blink>"."Email Tidak Valid"."</blink>" ;
	}
	
	else if($o['j']<=0){
	 echo "<blink>"."Email Bisa Digunakan"."</blink>" ;
	 }
	 else {
	 echo "<blink>"."Email Sudah Ada, Ganti Dengan Email Yang Lain"."</blink>";
	 }
?>