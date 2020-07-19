<?php
session_start();
include($_SERVER['DOCUMENT_ROOT']."/rest/includes/lib.inc.php");
include(INCLUDES_DIR."/class.inc.php");


$jp = new jcore();

    
	if($_POST['custpass']!=$_POST['custpass2']){
	 echo "<blink>"."Password Tidak Sama"."</blink>" ;
	 }
	
?>