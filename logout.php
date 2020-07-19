<?
session_start();
include_once ($_SERVER['DOCUMENT_ROOT']."/rest/includes/class.inc.php");
$jp = new jcore();
//$jp->sql("update transaksi set idplg='".$_SESSION['idplg']."' where notransaksi='".$_SESSION['idtrans']."'");
session_unregister('idplg');
$jp->gotox("index.php");
?>