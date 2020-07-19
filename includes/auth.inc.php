<?
include_once $_SERVER['DOCUMENT_ROOT']."/rest/includes/class.inc.php";
$auth = new jcore();
$ok = $auth->ceklogin();
if(!$ok){
	header('location: /rest/admin/login.php');
	exit;
}
?>