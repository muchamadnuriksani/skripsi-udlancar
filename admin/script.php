<?php
session_start();

include_once ($_SERVER['DOCUMENT_ROOT']."/rest/includes/class.inc.php");
$jc = new jcore();
switch($_GET['page']){
case "login":
	switch($_GET['action']){
	case "submit":
		if($jc->cekUser($_POST['userpass'],$_POST['password'])>0){
			$jc->gotox("wait.php");
		}else{
		    $jc->alert('Username atau Password Salah');
			$jc->gotox("login.php");
		}
	break;
	}
break;
}

if (!isset($_SESSION["login"])) {
	session_destroy();
}
?>
