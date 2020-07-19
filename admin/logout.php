<?
session_start();
session_destroy();
header('location: /rest/admin/index.php');
?>